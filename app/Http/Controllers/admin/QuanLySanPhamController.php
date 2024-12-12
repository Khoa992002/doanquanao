<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\ProductSize;
use App\Models\Brand;
use App\Models\Category;
use Image;
use Illuminate\Support\Facades\DB;


class QuanLySanPhamController extends Controller
{
    public function giaodiensanpham()
    {
        $products = Product::all();
        return view('admin.quanlisanpham.sanpham', compact('products'));
    }

    public function themsanpham()
    {
        $category = Category::all(); 
        $brands = Brand::all(); 
        return view('admin.quanlisanpham.themsanpham',compact('brands','category'));
    }

    public function addnewsp(Request $request)
    {
        $data = $request->all();
     
       
        // Validate the incoming request
        $request->validate([
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif|max:1024', // Max 1MB for each image
        ]);

        $data = []; // Initialize array $data

        if ($request->hasFile('avatar')) {
            foreach ($request->file('avatar') as $image) {
                $name = $image->getClientOriginalName();
                $name_2 = "hinh85_" . $name;
                $name_3 = "hinh200_" . $name;

                $path = public_path('upload/admin/product/' . $name);
                $path2 = public_path('upload/admin/product/' . $name_2);
                $path3 = public_path('upload/admin/product/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->save($path2);
                Image::make($image->getRealPath())->save($path3);

                $data[] = $name;
            }

            // Add product information to the database
            $product = new Product();
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->category_id = $request->input('category_id');
            $product->description = $request->input('description');
            $product->brand_id = $request->input('brand_id');
            $product->INTRODUCE = $request->input('gioithieu');
             $product->stock = 0;
            $product->main_image_url = json_encode($data); // Save image names or full paths as needed

            $product->save(); // Don't forget to save the product

            return redirect()->back()->with('success', 'Nhập sản phẩm thành công');
        } else {
            return redirect()->back()->withErrors('sai');
        }
    }
   public function updateImage(Request $request, $id, $index)
{
    // Tìm sản phẩm
    $product = Product::findOrFail($id);

    // Validate hình ảnh
    $request->validate([
        'image' => 'required|image|max:2048', // Tối đa 2MB, định dạng là hình ảnh
    ]);

    // Lấy danh sách hình ảnh hiện tại
    $images = json_decode($product->main_image_url, true);

    // Kiểm tra nếu hình ảnh tại index tồn tại
    if (isset($images[$index])) {
        // Lưu hình ảnh mới
        $newImageName = time() . '_' . $request->file('image')->getClientOriginalName(); // Đặt tên mới với timestamp
        $newImagePath = public_path('upload/admin/product/' . $newImageName);

        // Lưu hình ảnh mới vào thư mục
        Image::make($request->file('image')->getRealPath())->save($newImagePath);

        // Chỉ thay thế hình ảnh gốc trong danh sách
        $images[$index] = $newImageName;

        // Lưu danh sách hình ảnh mới vào cơ sở dữ liệu
        $product->main_image_url = json_encode($images);
        $product->save();

        return redirect()->back()->with('success', 'Hình ảnh đã được cập nhật!');
    }

    return redirect()->back()->withErrors(['error' => 'Hình ảnh không tồn tại!']);
}
    public function xoasp($id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);
        
        // Xóa sản phẩm
        $product->delete();

        // Redirect với thông báo thành công
        return redirect()->route('admin/quanlisanpham')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
     public function thongtinchitietsp($id)
     {
         $product = Product::find($id);  
         $sizes = Size::all();  
         $productSizes = $product->sizes()->withPivot('stock_quantity', 'price')->get();
         return view('admin.quanlisanpham.thongtinchitietsp',compact('product','productSizes','sizes'));
     }

      public function addSize(Request $request, $id)
{
    // Tìm sản phẩm theo ID
    $product = Product::find($id);

    // Nếu sản phẩm không tồn tại
    if (!$product) {
        return redirect()->back()->withErrors('Sản phẩm không tồn tại.');
    }

    // Kiểm tra kích thước
    if (!$request->size || empty(trim($request->size))) {
        return redirect()->back()->withErrors('Vui lòng nhập kích thước hợp lệ.');
    }

    // Thêm kích thước vào bảng sizes nếu chưa tồn tại
    $size = Size::firstOrCreate(['size' => $request->size]);

    // Kiểm tra kích thước đã tồn tại trong sản phẩm chưa
    $existingSize = ProductSize::where('product_id', $product->id)
        ->where('size_id', $size->id)
        ->first();

    if ($existingSize) {
        return redirect()->back()->withErrors('Kích thước này đã tồn tại cho sản phẩm: ' . $product->name);
    }

    // Thêm kích thước mới vào bảng product_sizes
    ProductSize::create([
        'product_id' => $product->id,
        'size_id' => $size->id,
        'stock_quantity' => $request->stock_quantity,
        'price' => $request->price,
    ]);

    // Cập nhật tổng tồn kho
    $totalStock = ProductSize::where('product_id', $product->id)->sum('stock_quantity');
    $product->stock = $totalStock;
    $product->save();

    // Chuyển hướng và thông báo thành công
    return redirect()->route('thongtinchitietsp', ['id' => $product->id])
        ->with('success', 'Kích thước đã được thêm thành công và tổng tồn kho đã được cập nhật.');
}



       public function giaodiannhanhang()
       {
        $brands = Brand::all();
        return view('admin.quanlinhanhang.nhanhang', compact('brands'));
       }
       public function themnhanhang(Request $request)
       {
        $data = $request->all();
         // Lưu thông tin vào DB
     // Kiểm tra xem tên nhãn hàng đã tồn tại chưa
    $existingBrand = Brand::where('name', $request->name)->first();

    if ($existingBrand) {
        // Nếu tên nhãn hàng đã tồn tại, trả về thông báo lỗi
        return redirect()->back()->withErrors('Nhãn hàng "' . $request->name . '" đã tồn tại trong danh sách các nhãn hàng đã hợp tác!');
    }    
    $brand = new Brand();
    $brand->name = $request->input('name');
    $brand->description = $request->input('description');
    $brand->website = $request->input('website');

    // Xử lý file logo nếu có
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('upload/admin/brand', 'public');  // Lưu vào thư mục public/upload/admin/brand
        $brand->logo = $logoPath; // lưu đường dẫn logo vào CSDL
    }

    // Lưu nhãn hàng vào CSDL
    $brand->save();

    // Quay lại trang và thông báo thành công
    return redirect()->back()->with('success', 'Nhãn hàng đã được thêm thành công!');
       }
    public function toggleProducts($id)
{
    // Tìm nhãn hàng theo ID
    $brand = Brand::findOrFail($id);

    // Kiểm tra trạng thái hiện tại của các sản phẩm
    $allHidden = $brand->products()->where('status', 1)->count() === 0;

    if ($allHidden) {
        // Hiển thị lại tất cả sản phẩm
        $brand->products()->update(['status' => 1]);
        $message = 'Tất cả sản phẩm của nhãn hàng đã được hiển thị lại.';
    } else {
        // Ẩn tất cả sản phẩm
        $brand->products()->update(['status' => 0]);
        $message = 'Tất cả sản phẩm của nhãn hàng đã được ẩn.';
    }

    // Trả về thông báo thành công
    return redirect()->back()->with('success', $message);
}
public function edit($id)
{
    $product = Product::findOrFail($id);
    $brand = Brand::all();   
     // Lấy thông tin thương hiệu liên quan đến sản phẩm
    $brandht = Brand::find($product->brand_id);

     
    // Trả về view chỉnh sửa và truyền thông tin sản phẩm
    return view('admin.quanlisanpham.suasanpham', compact('product','brand','brandht'));
}
public function update(Request $request, $id)
{
    // Tìm sản phẩm theo ID
    $product = Product::findOrFail($id);
   
    // Validate dữ liệu
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'brand_id' => 'required|exists:brands,id',
        'main_image_url' => 'nullable|file|image|max:2048',
    ]);

    // Cập nhật thông tin
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->INTRODUCE = $request->input('INTRODUCE');
    $product->brand_id = $request->input('brand_id'); // Cập nhật nhãn hàng

    // Nếu có hình ảnh mới, lưu hình ảnh và cập nhật URL
    if ($request->hasFile('main_image_url')) {
        $image = $request->file('main_image_url');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('upload/admin/product'), $imageName);
        $product->main_image_url = json_encode([$imageName]);
    }

    $product->save();

    // Trả về thông báo thành công
   return redirect()->back()->with('success',);
}

public function updateSize(Request $request, $product_id, $size_id)
{
    // Validate dữ liệu đầu vào
    $validated = $request->validate([
        'size' => 'required|string|max:5',  // Kích thước (chuỗi như S, M, L)
        'stock_quantity' => 'required|integer|min:0',  // Số lượng >= 0
    ]);

    // Tra cứu `size_id` từ bảng sizes
    $size = DB::table('sizes')->where('size', $request->size)->first();

    // Nếu không tìm thấy kích thước, trả về lỗi
    if (!$size) {
        return redirect()->back()->withErrors(['error' => 'Kích thước không tồn tại.']);
    }

    // Cập nhật bảng product_sizes
    $updated = DB::table('product_sizes')
        ->where('product_id', $product_id)
        ->where('size_id', $size_id)
        ->update([
            'size_id' => $size->id, // ID hợp lệ thay vì chuỗi
            'stock_quantity' => $request->stock_quantity,
            'updated_at' => now(), // Định dạng thời gian chính xác
        ]);

        // Tính lại tổng số lượng của sản phẩm
    $totalQuantity = DB::table('product_sizes')
        ->where('product_id', $product_id)
        ->sum('stock_quantity');

    // Cập nhật tổng số lượng trong bảng products
    DB::table('products')
        ->where('id', $product_id)
        ->update(['stock' => $totalQuantity, 'updated_at' => now()]);   

    if ($updated) {
        return redirect()->back()->with('success', 'Cập nhật kích thước thành công!');
    }

    return redirect()->back()->withErrors(['error' => 'Không thể cập nhật kích thước.']);
}


}




