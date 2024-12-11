@extends('admin.layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
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
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Thông báo!</strong> {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-4">Thông tin sản phẩm: {{ $product->name }}</h1>

    <!-- Bảng 1: Danh sách hình ảnh sản phẩm -->
    <div class="mb-5">
        <h3>Hình ảnh sản phẩm</h3>
       <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach (json_decode($product->main_image_url, true) as $index => $image)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ asset('upload/admin/product/' . $image) }}" alt="Hình ảnh sản phẩm" class="img-fluid" style="max-width: 50px;">
                    </td>
                    <td>
                        <!-- Nút sửa -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editImageModal{{ $index }}">Sửa</button>

                        <!-- Modal sửa hình ảnh -->
                        <!-- Modal sửa hình ảnh -->
<div class="modal fade" id="editImageModal{{ $index }}" tabindex="-1" aria-labelledby="editImageModalLabel{{ $index }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editImageModalLabel{{ $index }}">Chỉnh sửa hình ảnh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Hiển thị hình ảnh hiện tại -->
                <div class="mb-3 text-center">
                    <label class="form-label">Hình ảnh hiện tại:</label>
                    <div>
                        <img src="{{ asset('upload/admin/product/' . $image) }}" alt="Hình ảnh hiện tại" class="img-fluid" style="max-width: 150px; border: 1px solid #ddd; padding: 5px;">
                    </div>
                </div>
                
                <!-- Form cập nhật hình ảnh -->
                <form action="{{ route('product.updateImage', ['id' => $product->id, 'index' => $index]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="image" class="form-label">Chọn hình ảnh mới</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

                        <!-- Form xóa -->
                        <form action="" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addImageModal">Thêm hình ảnh</button>
</div>
    
    <!-- Modal thêm hình ảnh -->
    <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addImageModalLabel">Thêm hình ảnh sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">Chọn hình ảnh</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-success">Tải lên</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng 2: Danh sách kích thước sản phẩm -->
    <div>
        <h3>Kích thước và số lượng</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kích thước</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productSizes as $productSize)
                    <tr>
                        <td>{{ $productSize->id }}</td>
                        <td>{{ $productSize->size }}</td>
                        <td>{{ $productSize->pivot->stock_quantity }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editSizeModal{{ $productSize->id }}">Sửa</button>
                            <form action="" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSizeModal">Thêm kích thước</button>
    </div>

    <!-- Modal thêm kích thước -->
    <div class="modal fade" id="addSizeModal" tabindex="-1" aria-labelledby="addSizeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSizeModalLabel">Thêm kích thước sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product.addSize', ['id' => $product->id]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="size" class="form-label">Kích thước</label>
                            <input type="text" class="form-control" id="size" name="size" placeholder="S, M, L, XL" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock_quantity" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" min="0" required>
                        </div>
                        <button type="submit" class="btn btn-success">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal chỉnh sửa kích thước -->
    @foreach ($productSizes as $productSize)
        <div class="modal fade" id="editSizeModal{{ $productSize->id }}" tabindex="-1" aria-labelledby="editSizeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSizeModalLabel">Chỉnh sửa kích thước</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateSize', ['product_id' => $product->id, 'size_id' => $productSize->id]) }}" method="POST">
                            @csrf
                            
                                              
                                                
                            <div class="mb-3">
                                <label for="size" class="form-label">Kích thước</label>
                                <input type="text" class="form-control" id="size" name="size" value="{{ $productSize->size }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="stock_quantity" class="form-label">Số lượng</label>
                                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ $productSize->pivot->stock_quantity }}" required>
                            </div>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


@endsection