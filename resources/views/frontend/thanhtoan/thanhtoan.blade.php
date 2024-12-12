@extends('frontend.layouts.app')

@section('content')
	
<div class="container mt-5">

    <!-- Thông báo gửi đơn hàng thành công -->
    <div class="alert alert-success text-center">
        <h3>Gửi đơn hàng thành công!</h3>
        <p>Cảm ơn quý khách đã mua hàng tại <strong>Aobongda.net</strong></p>
        <p>Chúng tôi sẽ liên hệ với bạn trong vòng 24h. Nếu bạn có bất kỳ thắc mắc hay câu hỏi nào vui lòng gọi điện để được tư vấn: <strong>0385331914</strong></p>
    </div>

    <!-- Thông tin đơn hàng -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Thông tin đơn hàng</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <label for="order_id" class="form-label">Mã đơn hàng:</label>
                        <input type="text" id="order_id" value="{{ $order->id }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="full_name" class="form-label">Họ tên:</label>
                        <input type="text" id="full_name" value="{{ $order->full_name }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                        <input type="text" id="phone" value="{{ $order->phone }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="shipping_address" class="form-label">Địa chỉ:</label>
                        <input type="text" id="shipping_address" value="{{ $order->shipping_address }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="payment_method" class="form-label">Hình thức thanh toán:</label>
                        <input type="text" id="payment_method" value="{{ $order->payment_method }}" class="form-control" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Chi tiết đơn hàng -->
    <div class="card">
        <div class="card-header">
            <h5>Chi tiết đơn hàng</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Size</th>
                        <th>Màu sắc</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->name_size }}</td>
                            <td>{{ $item->color }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }} VND</td>
                            <td>{{ number_format($item->price * $item->quantity, 2) }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h5>Tổng tiền: <span class="text-success">{{ number_format($order->total_amount, 2) }} VND</span></h5>
        </div>
    </div>

</div>
@endsection

@section('styles')
<style>
    /* Tùy chỉnh giao diện */
    .card-header {
        background-color: #f8f9fa;
        font-size: 1.2rem;
    }
    .card-body {
        background-color: #ffffff;
    }
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }
    .table th {
        background-color: #f8f9fa;
    }
</style>


@endsection
