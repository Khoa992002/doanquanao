@extends('frontend.layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">Chi tiết đơn hàng</h1>

    <!-- Thông tin đơn hàng -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Thông tin đơn hàng
        </div>
        <div class="card-body">
            <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
            <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
            <p><strong>Trạng thái:</strong> 
                @if ($order->status == 'pending')
                    <span class="badge bg-warning">Chờ xử lý</span>
                @elseif ($order->status == 'completed')
                    <span class="badge bg-success">Hoàn thành</span>
                @elseif ($order->status == 'canceled')
                    <span class="badge bg-danger">Đã hủy</span>
                @endif
            </p>
            <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }} VND</p>
        </div>
    </div>

    <!-- Danh sách sản phẩm -->
    <h3>Sản phẩm trong đơn hàng</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                    <td>{{ number_format($item->quantity * $item->price, 0, ',', '.') }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tổng kết -->
    <div class="text-end mt-3">
        <h4><strong>Tổng tiền:</strong> {{ number_format($item->quantity * $item->price) }}VND</h4>
    </div>

    <!-- Nút quay lại -->
    <div class="mt-4">
        
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


@endsection