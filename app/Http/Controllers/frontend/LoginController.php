<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function dangnhap()
    {
        return view('frontend.login.login');
    }
     public function nhaptaikhoan(Request $request)
    {
   
     
     $login = [
            'email' => $request->email,
            'password' => $request->password,
            
        ];

        if (Auth::attempt($login)) {
             return redirect('/home');
              return redirect()->back()->with('success', __('thành công'));
        } else {
            return redirect()->back()->with('success', __('email hoặc password không chính xác'));
        }  
    }
    public function dangxuat()
    {
    // Xóa toàn bộ session
    session()->flush();    
    Auth::logout();
    return redirect()->back()->with('success', __('đăng xuất thành công'));
    }
    public function dangkytaikhoamoi()
    {
        return view('frontend.login.dangkytaikhoan');
    }
    public function dangky(Request $request)
    {
       $data=$request->all();

         $user = new User();
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password= bcrypt($request->password);
         $user->phone_number = $request->phone;
         $user->address= $request->address;
         $user->level = 0;

        if ($request->hasFile('avatar')) {
          $image = $request->file('avatar');
        $imageName = $image->getClientOriginalName(); // Đổi $avatar thành $image
        $image->move('frontend/avatar', $imageName); // Đổi $avatar thành $image
        $user->image = $imageName;
    }

         

        $user->save();

        return redirect()->back()->with('success', __('đăng ký thành công.'));
    }
}
