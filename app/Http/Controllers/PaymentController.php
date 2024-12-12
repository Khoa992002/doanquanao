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
 public function generateQrPayment(Request $request)
{
$data = $request->all();

    // Thông tin cơ bản của thanh toán
    $partnerCode = 'MOMOBKUN20180529';
    $accessKey = 'klm05TvNBzhg7h7j';
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

    $orderInfo = "Thanh toán qua MoMo";
    $amount = $request->input('total_amount', ); // Lấy số tiền, mặc định 10,000 VND
    $orderId = time(); // Mã đơn hàng duy nhất
    $redirectUrl = route('payment.success'); // URL trả về sau khi thanh toán thành công
    $ipnUrl = route('payment.ipn'); // URL nhận thông báo từ MoMo
    $extraData = "";

    // Tạo chữ ký (signature)
    $rawHash = "accessKey=$accessKey&amount=$amount&extraData=$extraData&ipnUrl=$ipnUrl&orderId=$orderId&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=$orderId&requestType=captureWallet";
    $signature = hash_hmac("sha256", $rawHash, $secretKey);

    // Dữ liệu gửi đến API MoMo
    $data = [
        'partnerCode' => $partnerCode,
        'accessKey' => $accessKey,
        'requestId' => $orderId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'extraData' => $extraData,
        'requestType' => 'captureWallet',
        'signature' => $signature
    ];

    // Gửi yêu cầu đến MoMo
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $result = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($result, true);

    // Kiểm tra phản hồi từ MoMo
    if (isset($response['payUrl'])) {
        // Trả về view hiển thị mã QR
        return view('frontend.thanhtoan.qr', [
            'payUrl' => $response['payUrl'],
            'amount' => $amount,
            'orderId' => $orderId
        ]);
    }

    return back()->with('error', 'Không thể tạo thanh toán. Vui lòng thử lại sau.');
}


}
