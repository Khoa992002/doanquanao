@extends('admin.layouts.app')
 <!-- Layout của bạn -->

@section('content')
  <h1 class="mb-4">Danh sách Đơn Hàng</h1>
    
    <!-- Table wrapper -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Ngày Tạo</th>
                    <th>Tên Khách Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id  }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>{{ $order->full_name }}</td>
                        <td>{{ number_format($order->total_amount) }} VND</td>
                        <td>
                            <span class="badge {{ $order->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">Xem Chi Tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
