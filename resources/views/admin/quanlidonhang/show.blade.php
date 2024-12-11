@extends('admin.layouts.app')

@section('content')
<h1 class="mb-4 text-center text-primary">Chi Tiết Đơn Hàng #{{ $order->id }}</h1>

<!-- Thông tin đơn hàng -->
<div class="mb-4 card p-4 shadow-sm">
    <h4 class="mb-3">Thông Tin Đơn Hàng</h4>
    <p><strong>Tên khách hàng:</strong> {{ $order->full_name }}</p>
    <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
    <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
    <p><strong>Tổng tiền đơn hàng:</strong> {{ number_format($order->total_amount) }} VND</p>
    <p><strong>Trạng thái:</strong> 
        <span class="badge {{ $order->status == 'chờ duyệt' ? 'bg-warning' : 'bg-success' }}">
            {{ ucfirst($order->status) }}
        </span>
    </p>
</div>

<!-- Sản phẩm trong đơn hàng -->
<h2 class="mb-3 text-success">Sản phẩm trong đơn hàng</h2>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Hình ảnh</th>
                <th>Sản phẩm</th>
                <th>Size</th>
                <th>Màu</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $item)
         <?php
    // Giải mã thuộc tính 'main_image' từ bảng 'products'
    $hinhAnhArray = json_decode($item->product->main_image_url, true);

    
    ?>
                <tr>
                    <td>
                        <img src="{{ asset('upload/admin/product/' . $hinhAnhArray[0] ) }}" 
           
             style="max-width: 50px; height: auto;">
                    </td>
                    <td>{{ $item->product->name }}</td> <!-- Giả sử bạn có quan hệ 'product' -->
                    <td>{{ $item->name_size }}</td>
                    <td>{{ $item->color }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price) }} VND</td>
                    <td>{{ number_format($item->quantity * $item->price) }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Form duyệt đơn hàng -->
@if($order->status == 'chờ duyệt')
    <div class="mt-4 d-flex justify-content-between">
        <form action="{{ route('admin.orders.approve', $order->id) }}" method="POST" class="d-inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success btn-lg">Duyệt Đơn Hàng</button>
        </form>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary btn-lg">Quay lại</a>
    </div>
@endif
@endsection
