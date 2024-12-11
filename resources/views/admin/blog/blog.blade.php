@extends('admin.layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Blog</title>
    <!-- Thêm CSS Framework như Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Quản lý Blog</h1>
@if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
            {{ session('success') }}
        </div>
    @endif
        <!-- Nút Thêm Blog -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBlogModal">Thêm Blog</button>

        <!-- Bảng hiển thị danh sách Blog -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Thể loại</th>
                    <th>Ngày tạo</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
              
                   
                
                <tr>
                     @foreach($blog as $blog)
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category ? $blog->category->name : 'Không có thể loại' }}</td>
                    <td>
                   <img src="{{ asset('storage/' . $blog->image) }}" alt="Logo" class="img-thumbnail" width="50">
                </td>
                    <td>{{ $blog->created_at->format('d/m/Y')}}</td>
                   
                    <td>
                        <!-- Nút Sửa -->
                      <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editBlogModal" data-id="{{ $blog->id }}">Sửa</button>
                        <!-- Nút Xóa -->
                        <form action="{{ route('blog.delete', $blog->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                       <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa blog này?')">Xóa</button>
                       </form>
                        <!-- nút xem chi tiết -->
                        <a href="{{ url('admin/xemchitietblog', ['id' => $blog->id]) }}" style="text-decoration: none;">
                               <button style="display: flex; align-items: center; padding: 3px 8px; background-color: #2196F3; color: white; border: none; border-radius: 3px; font-size: 10px; cursor: pointer;">
                           <i class="mdi mdi-eye" style="margin-right: 3px; font-size: 14px;"></i> Xem chi tiết
                              </button>
                        </a>

                    </td>
                </tr>
@endforeach
                <!-- Modal Sửa Blog -->
                <div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editBlogForm" action="{{ url('/chisua/blog') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editBlogModalLabel">Sửa Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                    </div>
                     <div class="mb-3">
                            <label for="title" class="form-label">sumary</label>
                            <input type="text" class="form-control" id="summary" name="summary" required>
                        </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Thể loại</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach($categoryblog as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                     <!-- Hiển thị hình ảnh hiện tại -->
                    <div class="mb-3">
                        <label for="current_image" class="form-label">Hình ảnh hiện tại</label>
                        <img id="current_image" src="" alt="Hình ảnh hiện tại" class="img-thumbnail" width="100">
                    </div>
                    <input type="hidden" id="old_image" name="old_image">

                     <div class="mb-3">
                        <label for="image" class="form-label">Thay đổi hình ảnh (Nếu cần)</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
            </tbody>
        </table>
    </div>

    <!-- Modal Thêm Blog -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add/blog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBlogModalLabel">Thêm Blog Mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">sumary</label>
                            <input type="text" class="form-control" id="summary" name="summary" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Thể loại</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Chọn thể loại</option>
                               
                                 @foreach($categoryblog as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                             @endforeach
                            
                            </select>
                        </div>
                      <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>


    <!-- Thêm JavaScript Bootstrap -->
    <!-- Thêm jQuery từ CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
   <script>
    $(document).ready(function() {
        // Khi người dùng nhấn nút sửa
        $('#editBlogModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút "Sửa"
            var blogId = button.data('id'); // Lấy ID từ data-id

            // Gửi yêu cầu AJAX để lấy thông tin blog
            $.ajax({
                url: '/admin/blog/' + blogId + '/edit', // Đường dẫn lấy thông tin blog
                method: 'GET',
                success: function(response) {
                    // Điền thông tin vào modal
                    $('#title').val(response.blog.title);
                    $('#content').val(response.blog.content);
                    $('#summary').val(response.blog.summary);
                    $('#category_id').val(response.blog.category_id);
                    $('#editBlogForm').attr('action', '/admin/blog/' + blogId); // Cập nhật đường dẫn form
                      $('#current_image').attr('src', '/storage/' + response.blog.image);
                       $('#image').attr('src', '/storage/' + response.blog.image);
                        $('#old_image').val(response.blog.image);

                }
            });
        });
    });
</script>

    
@endsection