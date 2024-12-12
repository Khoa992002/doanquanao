@extends('frontend.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Thông tin cá nhân -->
<div class="col-md-4">
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Thông tin cá nhân
        </div>
        <div class="card-body">
            <!-- Bọc toàn bộ nội dung vào form -->
            <form action="{{ route('suathongtincanhan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Hiển thị ảnh đại diện -->
                <div class="text-center">
                    <img src="{{$user->image ? asset('storage/upload/admin/avatar/' . $user->image)  : asset('default-avatar.png') }}"
                         class="img-thumbnail rounded-circle mb-3" 
                         alt="Avatar" 
                         width="150" 
                         height="150">
                    <div class="form-group">
                        <label for="avatar">Cập nhật ảnh đại diện:</label>
                        <input type="file" name="avatar" id="avatar" class="form-control-file">
                    </div>
                </div>

                <!-- Hiển thị thông tin cá nhân -->
                <div class="form-group">
                    <label for="name"><strong>Tên:</strong></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="phone"><strong>Số điện thoại:</strong></label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone_number }}">
                </div>
                <div class="form-group">
                    <label for="address"><strong>Địa chỉ:</strong></label>
                    <textarea name="address" id="address" class="form-control">{{ $user->address }}</textarea>
                </div>

                <!-- Nút lưu thay đổi -->
                <button type="submit" class="btn btn-success btn-block">Lưu thay đổi</button>
            </form>
        </div>
    </div>
</div>



        <!-- Danh sách đơn hàng -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    Đơn hàng gần đây
                </div>
                <div class="card-body">
                    @if ($orders->isEmpty())
                        <p>Bạn chưa có đơn hàng nào.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>{{ number_format($order->total_amount) }} VND</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <a href="{{ route('giohangcuaban', $order->id) }}" class="btn btn-info btn-sm">Xem</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            <!-- Danh sách đánh giá -->
            <div class="card">
    <div class="card-header bg-secondary text-white">
        Đánh giá của bạn
    </div>
    <div class="card-body">
        @if ($comments->isEmpty())
            <p>Bạn chưa đánh giá sản phẩm nào.</p>
        @else
            @foreach ($comments as $comment)
            <div class="mb-3">
                <!-- Hiển thị sản phẩm được đánh giá -->
                <strong>Sản phẩm: {{ $comment->product->name}}</strong>
                
                <!-- Hiển thị số sao -->
                <p>
                    <div class="rate">
                        <div class="vote">
                             @for ($i = 1; $i <= 5; $i++)
                            @if ($comment->rating >= $i)
                               <div class="star_{{ $i }} ratings_stars ratings_hover"><input value="{{ $i }}" type="hidden"></div>
                            @else
                                 <div class="star_{{ $i }} ratings_stars"><input value="{{ $i }}" type="hidden"></div>
                            @endif
                        @endfor
                        </div>
                       
                    </div>
                </p>

                <!-- Nội dung đánh giá -->
                <p>{{ $comment->content }}</p>
                <small class="text-muted">Ngày đánh giá: {{ $comment->created_at->format('d/m/Y') }}</small>
            </div>
            @endforeach
        @endif
    </div>
</div>

        </div>
    </div>
</div>

@endsection