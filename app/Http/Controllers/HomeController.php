<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
class HomeController extends Controller
{
    
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Product::where('status', 1)->orderBy('created_at', 'desc')->get();

        $category = Category::all(); 
        return view('frontend.home',compact('data','category'));
    }
     public function shop()
     {
        $data = Product::orderBy('created_at', 'desc')->get();
        $category = Category::all(); 
        return view('frontend.shop.shop',compact('data','category'));
     }
     public function about()
     {
        
        return view('frontend.about.about');
     }
}
