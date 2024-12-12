@extends('admin.layouts.app')

@section('content')

<div class="col-sm-6 offset-sm-3"><!-- Adjusted column width and added offset -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
            {{ session('success') }}
        </div>
    @endif

   <div class="signup-form">
    <h2 class="text-center mb-4">New User Signup!</h2>
    
    <form method="post" action="{{ url('/add/sanpham') }}" enctype="multipart/form-data">
        @csrf

        <!-- Tên sản phẩm -->
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Name" required />
        </div>

        <!-- Giá sản phẩm -->
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="price" placeholder="Price" required />
        </div>

        <!-- Loại hàng -->
        <div class="form-group mb-3">
            <select class="form-control" name="category_id" required>
                <option value="" disabled selected>Nhập loại hàng</option>
                 @foreach($category as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                
                @endforeach
            </select>
        </div>

        <!-- Chọn nhãn hàng -->
        <div class="form-group mb-3">
            <label for="brand_id" class="form-label">Chọn Nhãn Hàng</label>
            <select name="brand_id" id="brand_id" class="form-select" required>
                <option value="">Chọn nhãn hàng</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <button href="">Them san phan</button>
        <!-- Hình ảnh sản phẩm -->
        <div class="form-group mb-3">
            <input class="form-control" type="file" multiple name="avatar[]" required>
        </div>
         <div class="form-group mb-3">
            <input type="text" class="form-control" name="gioithieu" placeholder="gioithieu" required />
        </div>
        <!-- Mô tả sản phẩm -->
        <div class="form-group mb-3">
            <textarea class="form-control" name="description" placeholder="Detail" required></textarea>
        </div>

        <!-- Nút gửi -->
        <div class="form-group mb-3 text-center">
            <button type="submit" class="btn btn-primary">SEND</button>
        </div>
    </form>

    <!-- Hiển thị lỗi nếu có -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible mt-3">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>




@endsection