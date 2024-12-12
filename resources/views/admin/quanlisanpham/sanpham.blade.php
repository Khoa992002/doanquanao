@extends('admin.layouts.app')

@section('content')


 <div class="container">
    
        <h1 class="my-4">Danh sách sản phẩm</h1>

        <!-- Nút tạo sản phẩm mới -->
        <a href="{{url('admin/themsanpham')}}" class="btn btn-primary mb-4">Thêm sản phẩm mới</a>

        <!-- Bảng hiển thị sản phẩm -->
        <div class="row">
             @foreach($products as $product)
                             <?php 
                              //giải mã thuộc tính hình ảnh thành mảng
                              $hinhAnhArray = json_decode($product->main_image_url, true);
                             ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <!-- Hình ảnh sản phẩm -->
                        <img src="{{ asset('upload/admin/product/' . $hinhAnhArray[0] ) }}" class="card-img-top" alt="" style="height: 200px; object-fit: cover;">
                        
                        <div class="card-body">
                            <!-- Thông tin sản phẩm -->
                            <h5 class="card-title"></h5>
                            <p class="card-text">
                                <strong>{{$product->price}}</strong> VND<br>
                              
                                <strong>{{$product->brand}}</strong> <br>
                                <strong>{{$product->name}}</strong> <br>
                                <strong>Số lượng</strong>{{$product->stock}} <br>
                                
                            </p>
                        </div>

                        <div class="card-footer">
                            <!-- Thao tác chỉnh sửa và xóa sản phẩm -->
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                            <a href="{{ url('admin/thongtinchitietsp', ['id' => $product->id]) }}" class="btn btn-dark">Chi tiết sản phẩm</a>

                            <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
           @endforeach
        </div>
    </div>


@endsection