@extends('frontend.layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Thanh toán MoMo</title>
</head>
<body>
    <h2>Thanh toán bằng mã QR</h2>
    <p>Vui lòng quét mã QR dưới đây để thanh toán:</p>
    <div>
        <img style="height: 500px" src="{{ asset('frontend/images/momo.png') }}" alt="QR Code">
    </div>
    <p>Số tiền: <strong>{{ number_format($amount, 0, ',', '.') }} VND</strong></p>
    <p>Mã đơn hàng: <strong>{{ $orderId }}</strong></p>
    <a href="{{ url('/') }}">Quay lại trang chủ</a>
</body>
</html
@endsection
	