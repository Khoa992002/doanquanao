<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Size;
use App\Models\ProductSize;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
   public function donhang()
    {
        // Lấy tất cả đơn hàng
        $orders = Order::all();
        return view('admin.quanlidonhang.donhang', compact('orders'));
    }
    public function show(Order $order)
    {
        // Lấy chi tiết đơn hàng và các sản phẩm liên quan
        $orderItems = $order->items; // Giả sử bạn có quan hệ 'items' với bảng 'order_items'
        return view('admin.quanlidonhang.show', compact('order', 'orderItems'));
    }
    public function approveOrder($id)
{
      // Lấy đơn hàng theo ID
    $order = Order::findOrFail($id);

    // Lấy tất cả sản phẩm trong bảng order_items của đơn hàng này
    $orderItems = OrderItem::where('order_id', $id)->get();

    foreach ($orderItems as $item) {
        // Lấy thông tin tồn kho của sản phẩm theo size
        $productSize = ProductSize::where('product_id', $item->product_id)
                                  ->where('size_id', $item->size) // Sử dụng size ID
                                  ->first();

        if ($productSize) {
            // Trừ số lượng tồn kho
            $productSize->stock_quantity -= $item->quantity;

            // Kiểm tra nếu tồn kho âm
            if ($productSize->stock_quantity < 0) {
                return redirect()->back()->with('error', "Không đủ hàng trong kho cho sản phẩm ID {$item->product_id} (Size {$item->name_size}).");
            }

            // Lưu thay đổi
            $productSize->save();
        } else {
            return redirect()->back()->with('error', "Không tìm thấy thông tin tồn kho cho sản phẩm ID {$item->product_id} (Size {$item->name_size}).");
        }
    }

    // Cập nhật trạng thái đơn hàng
    $order->status = 'đã duyệt';
    $order->save();
    
    // Chuyển hướng về trang danh sách đơn hàng với thông báo thành công
    return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được duyệt.');
}
public function getRevenueByDate()
{
    $revenueData = DB::table('orders')
        ->selectRaw('DATE(created_at) as date, SUM(total_amount) as total_revenue')
        ->where('status', 'đã duyệt')
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();

    return response()->json($revenueData);
}
public function giohangcuaban(Order $order)
{
   $orderItems = $order->items; // Giả sử bạn có quan hệ 'items' với bảng 'order_items'

    return view('frontend.trangcanhan.donhangcanhan', compact('order'));
}


}
