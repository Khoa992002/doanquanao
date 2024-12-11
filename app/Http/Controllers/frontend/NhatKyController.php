<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\CategoryBlog;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;


class NhatKyController extends Controller
{
     public function blog()
    {
    $categoryblog = CategoryBlog::all();
    $blogs = Blog::paginate(2);

    return view('frontend.blog.blog', compact('categoryblog', 'blogs'));
    }
    public function ctblog($id)
    {
    $categoryblog = CategoryBlog::all();
    $latestProducts = Product::orderBy('created_at', 'desc')->take(3)->get();
    $blog = Blog::findOrFail($id);;

    return view('frontend.blog.blogdetail', compact('categoryblog', 'blog','latestProducts'));
    }

}
