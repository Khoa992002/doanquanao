<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
      public function showPaymentPage(Order $order)
    {
        // Truyền đơn hàng vào view
        return view('frontend.thanhtoan.thanhtoan', compact('order'));
    }
  public function processPayment(Request $request)  
{

 
 // Lấy thông tin từ form
    $fullName = $request->full_name;
    $shippingAddress = $request->shipping_address;
    $phone = $request->phone;
    $email = $request->email;
    $quantity = $request->quantity; // Dữ liệu số lượng sản phẩm từ form

    // Lấy thông tin sản phẩm từ giỏ hàng (session hoặc từ request)
    $cart = session('cart');  // Giả sử bạn lưu giỏ hàng trong session
    $totalAmount = 0;

    // Tính tổng tiền đơn hàng
    foreach ($cart as $item) {
        $totalAmount += $item['price'] * $item['qty'];
    }

    // Tạo đơn hàng trong bảng 'orders'
    $order = Order::create([
        'user_id' => auth()->id() ?? null, // Lấy ID người dùng hoặc null nếu không có
        'total_amount' => $totalAmount,
        'status' => 'chờ duyệt',  // Mặc định là pending
        'shipping_address' => $shippingAddress,
        'payment_method' => 'COD',  // Giả sử thanh toán khi nhận hàng
        'tracking_number' => null,  // Bạn có thể cập nhật sau
        'full_name' => $fullName,
        'phone' => $phone,
    ]);

     // Lưu các sản phẩm vào bảng 'order_items'
    foreach ($cart as $key => $product) {
        // Nếu sản phẩm có nhiều hình ảnh, bạn cần mã hóa mảng thành chuỗi JSON
       

        // Tạo bản ghi cho từng sản phẩm trong bảng 'order_items'
        $order->items()->create([
            'product_id' => $product['id'],  // ID sản phẩm
            'size' => $product['size_id'],
            'quantity' => $product['qty'],
            'price' => $product['price'],
            'name_size' => $product['size'],  
        ]);
    }


    // Hoàn tất và chuyển hướng đến trang xác nhận hoặc hiển thị thông báo
    return redirect()->route('giaodienthanhtoan', ['order' => $order->id]);

}

}
