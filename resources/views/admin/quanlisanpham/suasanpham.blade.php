@extends('admin.layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Chỉnh sửa sản phẩm</h1>
   
    <!-- Hiển thị thông báo lỗi -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Tên sản phẩm -->
    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
    </div>

    <!-- Giá -->
    <div class="mb-3">
        <label for="price" class="form-label">Giá</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
    </div>
     <div class=" mb-3">
            <input type="text" class="form-control" name="INTRODUCE" value="{{$product->INTRODUCE}}" placeholder="gioithieu" required />
        </div>
        <!-- Mô tả sản phẩm -->
        
    <!-- Nhãn hiệu -->
    <div class="mb-3">
        <label for="brand_id" class="form-label">Chọn Nhãn Hàng</label>
        <select name="brand_id" id="brand_id" class="form-select" required>
            <!-- Hiển thị nhãn hàng hiện tại -->
            <option value="{{ $brandht->id }}" selected>{{ $brandht->name }}</option>
            <!-- Hiển thị các nhãn hàng khác -->
            @foreach($brands as $brand)
                @if($brand->id != $brandht->id)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endif
            @endforeach
        </select>
    </div>

   
    <!-- Nút lưu -->
    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


@endsection