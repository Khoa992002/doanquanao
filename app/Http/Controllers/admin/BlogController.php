<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CategoryBlog;
use App\Models\Blog;
use Illuminate\Http\Request;
use Auth;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogview()
    {
        $categoryblog = CategoryBlog::all();
        $blog = Blog::all();

         return view('admin.blog.blog',compact('categoryblog','blog'));
    }

   
    public function addblog(Request $request)
    {
       

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->category_id = $request->input('category_id');
        $blog->summary = $request->input('summary');
        $blog->user_id = Auth::id();

        // Kiểm tra và xử lý tệp ảnh
         if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Lưu vào thư mục "blogs" trong storage/app/public
        $imagePath = $image->store('blogs', 'public');

        // Lưu đường dẫn vào database
        $blog->image = $imagePath;
    }

        $blog->save();

        return redirect()->back()->with('success', 'Blog đã được thêm thành công!');
    }
     public function xoablog($id)
    {
        // Tìm sản phẩm theo ID
        $blog = Blog::findOrFail($id);
        
        // Xóa sản phẩm
        $blog->delete();

        // Redirect với thông báo thành công
        return redirect()->route('admin.blog.blog')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
    public function edit($id)
{
     $blog = Blog::find($id);
    if ($blog) {
        return response()->json(['blog' => $blog]);
    }
    return response()->json(['error' => 'Blog not found'], 404);
}
public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);

    // Kiểm tra nếu người dùng không tải lên ảnh mới
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Lưu vào thư mục "blogs" trong storage/app/public
        $imagePath = $image->store('blogs', 'public');

        // Lưu đường dẫn vào database
        $blog->image = $imagePath;
    } else {
        $blog->image = $request->input('old_image'); // Sử dụng ảnh cũ
    }

    $blog->title = $request->input('title');
    $blog->content = $request->input('content');
    $blog->summary = $request->input('summary');
    $blog->category_id = $request->input('category_id');
    $blog->save();

    return redirect()->route('admin.blog.blog')->with('success', 'Blog updated successfully!');
}
  public function chitietblog($id)
     {
         $blog = Blog::findOrFail($id);         
         return view('admin.blog.chitietblog',compact('blog'));
     }
    
}
