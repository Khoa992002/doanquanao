<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Size;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
public function themgiohang(Request $request)  
{
    
    // Lấy thông tin sản phẩm từ request
    $id = $request->id;
    $size = $request->size; // ID của size
    $quantity = $request->quantity ?? 1; // Số lượng mặc định là 1
    $color = $request->color;

    // Lấy thông tin sản phẩm từ CSDL
    $productData = Product::find($id);
    if (!$productData) {
        return response()->json(['message' => 'Sản phẩm không tồn tại.'], 404);
    }

    // Lấy tên size từ size_id
    $sizeName = Size::where('id', $size)->value('size');
    if (!$sizeName) {
        return response()->json(['message' => 'Size không tồn tại.'], 404);
    }

    // Lấy thông tin tồn kho theo size
    $productSize = ProductSize::where('product_id', $id)->where('size_id', $size)->first();
    if (!$productSize) {
        return response()->json(['message' => 'Size này không tồn tại trong sản phẩm.'], 404);
    }

    // Kiểm tra tồn kho
    if ($quantity > $productSize->stock_quantity) {
        return response()->json(['message' => 'Không đủ số lượng trong kho cho size này.'], 400);
    }

    // Cập nhật thông tin sản phẩm vào mảng giỏ hàng
    $array = [
        'id' => $id,
        'qty' => $quantity,
        'size' => $sizeName,
        'size_id' => $size, // Tên size thay vì ID
        'color' => $color,
        '_token' => $request->_token,
        'name' => $productData->name,
        'price' => $productData->price,
        'image' => $productData->main_image_url,
    ];
   
    // Kiểm tra và cập nhật giỏ hàng trong session
    $cart = session()->get('cart', []);
    $flag = true;

    foreach ($cart as $key => $value) {
    // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng với cùng size
    if ($id == $value['id'] && isset($value['size_id']) && $value['size_id'] == $size) {
        // Tăng số lượng sản phẩm
        $cart[$key]['qty'] += $quantity;

        // Kiểm tra tồn kho trước khi tăng
        if ($cart[$key]['qty'] > $productSize->stock_quantity) {
            return response()->json(['message' => 'Không đủ số lượng trong kho cho size này.'], 400);
        }

        // Lưu lại giỏ hàng sau khi cập nhật
        session()->put('cart', $cart);
        $flag = false;
        // dd($cart);
        break;
    }
}

    // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
    if ($flag) {

        session()->push('cart', $array);
    }

    // Trừ số lượng tồn kho trong CSDL

    // Tính tổng số lượng sản phẩm trong giỏ hàng
    $totalQty = array_sum(array_column(session('cart', []), 'qty'));

    // Cập nhật tổng số lượng vào session
    session()->put('total_qty', $totalQty);

    // Trả về JSON response
    return response()->json([
        'success' => 'Sản phẩm đã được thêm vào giỏ hàng',
        'cart' => session('cart'),
        'total_qty' => $totalQty,
    ]);
}




public function giaodiengiohang() 
{
    if (session()->has('cart')) { 
        // Kiểm tra xem session có chứa giỏ hàng ('cart') hay không
        $idProduct = session()->get('cart'); 
        // Lấy dữ liệu giỏ hàng từ session

        $products = []; // Khởi tạo mảng để lưu sản phẩm
        $sum = 0; // Khởi tạo biến tổng giá trị giỏ hàng

        foreach ($idProduct as $item) { 
            // Duyệt qua từng sản phẩm trong giỏ hàng
            $productData = Product::find($item['id']); // Tìm sản phẩm theo ID
            
            if ($productData) { // Kiểm tra nếu sản phẩm tồn tại trong ss
                $productArray = $productData->toArray(); // Chuyển dữ liệu sản phẩm thành mảng
                $productArray['qty'] = $item['qty']; // Gán số lượng từ giỏ hàng vào mảng sản phẩm
                $productArray['size'] = $item['size'] ?? ''; // Gán size (nếu có)
              
                $products[] = $productArray; // Thêm sản phẩm vào mảng sản phẩm
                $sum += $productArray['price'] * $item['qty']; // Tính tổng giá trị giỏ hàng
            }
        }

        return view('frontend.cart.cart', compact('products','sum')); 
        // Trả về view với biến $products (danh sách sản phẩm) và $sum (tổng giá trị giỏ hàng)
        
    } else {
        // Nếu không có giỏ hàng trong session, trả về view giỏ hàng trống
        return view('frontend.cart.cart', ['products' => [], 'sum' > 0]);
    }
}
public function updateCart(Request $request)
{
    $productId = $request->input('id');  
    $quantity = $request->input('quantity');  
    $size = $request->input('size'); 

    // Lấy giỏ hàng hiện tại từ session  
    $cart = session()->get('cart', []);  

    // Kiểm tra xem sản phẩm có trong giỏ không  
    foreach ($cart as $key => $item) {  
        if ($item['id'] == $productId && $item['size'] == $size) {  
            // Nếu số lượng là 0, có thể xóa sản phẩm khỏi giỏ  
            if ($quantity == 0) {  
                unset($cart[$key]);  
            } else {  
                // Cập nhật số lượng sản phẩm  
                $cart[$key]['qty'] = $quantity; // Cập nhật số lượng  
            }  
            break; // Dừng vòng lặp nếu tìm thấy sản phẩm  
        }  
    }  

   // Tính toán tổng giá trị giỏ hàng và tổng số lượng sản phẩm  
    $total = 0;  
    $totalQty = 0; // Biến để lưu tổng số lượng sản phẩm

    foreach ($cart as $item) {  
        $total += $item['price'] * $item['qty'];  
        $totalQty += $item['qty']; // Cộng dồn số lượng sản phẩm
    }  

    // Lưu giỏ hàng updated và tổng giá trị vào session 
    session()->put('cart', $cart);  
    session()->put('cart', $cart);  
    session()->put('cart_total', $total);  
    // Cập nhật tổng số lượng vào session để tiện lấy từ nhiều nơi
   

    return response()->json([
        'success' => true, 
        'message' => 'Giỏ hàng đã được cập nhật', 
        'total' => $total,
        'total_qty' => $totalQty, // Trả về tổng số lượng sản phẩm
       'cart' => $cart ?? []  // Trả về mảng rỗng nếu $cart không tồn tại
    ]);  
}



}
