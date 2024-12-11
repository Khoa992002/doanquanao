@extends('admin.layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản Lý Nhãn Hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	 @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
            {{ session('success') }}
        </div>
    @endif
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Danh sách nhãn hàng đang hợp tác với</h1>
        <!-- Nút mở modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBrandModal">
            Thêm Nhãn Hàng
        </button>
    </div>

    <!-- Bảng danh sách nhãn hàng -->
    <table class="table table-bordered">
        <thead class="thead-dark">
        	
            <tr>
                <th>#</th>
                <th>Tên Nhãn Hàng</th>
                <th>Hình Ảnh</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
        	 @foreach($brands as $brand)
            <!-- Ví dụ dữ liệu -->
            <tr>
                <td></td>
                <td>{{ $brand->name }}</td>
                <td>
                   <img src="{{ asset('storage/' . $brand->logo) }}" alt="Logo" class="img-thumbnail" width="50">
                </td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                   
                   
                  
    
   
    <form action="{{ route('brands.toggleProducts', $brand->id) }}" method="POST" style="display:inline;">
    @csrf
    @if($brand->products()->where('status', 1)->count() > 0)
        <button type="submit" class="btn btn-danger btn-sm">Ẩn sản phẩm của nhãn hàng này đi</button>
    @else
        <button type="submit" class="btn btn-success btn-sm">Hiển thị lại tất cả sản phẩm của nhãn hàng này</button>
    @endif
</form>

                </td>
            </tr>
             @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Thêm Nhãn Hàng -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandModalLabel">Thêm Nhãn Hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
            	  @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên Nhãn Hàng</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Hình Ảnh Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" name="website" id="website" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu Nhãn Hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS và Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>




@endsection