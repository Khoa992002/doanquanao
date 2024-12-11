<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Comment;
use App\Models\Category;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
   public function thongtinsanpham($id)
{
    
    // Tìm sản phẩm theo ID
    $product = Product::find($id);
     
    // Kiểm tra xem sản phẩm có tồn tại hay không
    if (!$product) {  
        return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại.');  
    }

    // Lấy danh sách sizes và bình luận
    $productSizes = $product->sizes()->withPivot('stock_quantity', 'price')->get();
    $comments = Comment::with('user') // Quan hệ với User
        ->where('product_id', $id)
        ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian mới nhất
        ->get();

    // Tính trung bình rating
    $averageRating = DB::table('comments')
        ->where('product_id', $id)
        ->avg('rating');

    // Làm tròn đến 1 chữ số thập phân
    $averageRating = round($averageRating, 1);

    // Trả về view với dữ liệu
    return view('frontend.thongtinsanpham.thongtinsanpham', compact('product', 'comments', 'productSizes', 'averageRating'));
}
    public function nhapcmt(Request $request)
    {
         $data = $request->all();
         
          // Create a new Comment instance
          $comment = new Comment();

        // Assign values to the comment object
        $comment->content = $request->input('review');
        $comment->product_id = $request->input('id_product');
        $comment->avatar = Auth()->user()->image;
        $comment->name = Auth()->user()->name;
        $comment->user_id = Auth::id();
        $comment->level =$request->input('level');
        $comment->rating =$request->input('rating');
        //khai báo product_id
        $product_id = $request->input('id_product');
        $averageRating = DB::table('comments')
        ->where('product_id', $product_id)
        ->avg('rating'); // Tính trung bình

    // Làm tròn đến 1 chữ số thập phân
       $averageRating = round($averageRating, 1);
        // Save the comment to the database
        $comment->save();
         return redirect()->back()->with('success', __('cmt thanh cong.'));
    }
     public function filterProducts(Request $request)
    {
        $products = Product::query();

        if ($request->has('category') && $request->category != '') {
            // Lọc sản phẩm theo danh mục
            $products->where('category_id', $request->category);
        }

        // Trả về kết quả dưới dạng JSON
        return response()->json(['data' => $products->get()->toArray()]);
    }
    public function filterByBrand(Request $request)
{

     // Tạo truy vấn sản phẩm
    $products = Product::query();

    // Kiểm tra nếu có tham số 'brand' trong request và lọc theo brand
    if ($request->has('brand') && $request->brand != '') {
        // Lọc sản phẩm theo thương hiệu (brand)
        $products->where('brand_id', $request->brand); // Đảm bảo 'brand_id' là cột trong database
    }

    // Kiểm tra nếu là yêu cầu AJAX, trả về JSON
    return response()->json([
        'data' => $products->get() // Trả về dữ liệu sản phẩm đã lọc
    ]);
}
 public function search(Request $request)
 {


    // Lấy từ tham số search-product trong request
    $searchTerm = $request->get('search-product');
     $category = Category::all(); 
    // Tìm sản phẩm theo tên (có thể tìm theo các cột khác nếu cần)
    $sanphamtimduoc = Product::query()
        ->where('name', 'like', '%' . $searchTerm . '%') // Tìm kiếm tên sản phẩm
        ->get(); // Lấy tất cả sản phẩm phù hợp
  return view('frontend.timkiem.timkiem', compact('sanphamtimduoc','searchTerm','category'));
    // Trả về view với kết quả tìm kiếm
   
 }
 public function show($id)
{
    $product = Product::findOrFail($id);
    return response()->json([
        'product' => $product
    ]);
}
 public function getStockBySize($productId, $sizeId)
    {
        // Truy vấn cơ sở dữ liệu
        $productSize = ProductSize::where('product_id', $productId)
                                  ->where('size_id', $sizeId)
                                  ->first();

        if (!$productSize) {
            return response()->json(['message' => 'Không tìm thấy kích thước cho sản phẩm này.'], 404);
        }

        // Trả về thông tin tồn kho và giá
        return response()->json([
            'stock_quantity' => $productSize->stock_quantity,
            'price' => $productSize->price,
        ]);
    }
    public function sortByPrice(Request $request)
{
    $order = $request->input('order', 'asc'); // Mặc định sắp xếp tăng dần nếu không có giá trị order

    // Lấy danh sách sản phẩm và sắp xếp theo giá
    $products = Product::orderBy('price', $order)->get();

    return response()->json(['data' => $products], 200);
}

 }


