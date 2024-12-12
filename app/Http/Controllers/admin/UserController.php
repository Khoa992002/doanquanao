<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import Storage
use App\Models\User;
use App\Models\Order;
use App\Models\Comment;
use Auth;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $total = Order::sum('total_amount');
        $latestComments = Comment::orderBy('created_at', 'desc')->limit(3)->get();
        return view('admin.dashboard',compact('total'));
    }
    public function giaodienadmin(Request $request)
    {
        $user = Auth::user();
        $member=User::where('id',$user->id)->first();
        
        return view('admin.profile.thongtinadmin',compact('member'));


    }
    public function capnhatthongtin(Request $request)
    {
       $userId = Auth::id();
      $user = User::findOrFail($userId);

        $data = $request->all();
        // Lấy tất cả dữ liệu từ yêu cầu
        $file = $request->image;
        // Kiểm tra xem có tệp avatar được tải lên không
        if(!empty($file)){
            $data['image'] = $file->getClientOriginalName();
        }

        
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }
       
        if ($user->update($data)) {
            if(!empty($file)){
                $file->move('upload/admin/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
        }


    }
     public function thongtincanhan()
    {
        $user = auth()->user();

        // Lấy thông tin đơn hàng của người dùng
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        // Lấy các đánh giá sản phẩm của người dùng
        $comments = Comment::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('frontend.trangcanhan.thongtincanhan', compact('user', 'orders', 'comments'));
    }
    public function update(Request $request)
{
    // Lấy ID người dùng hiện tại
    $userId = Auth::id();
$data=$request->all();

    // Tìm người dùng từ cơ sở dữ liệu
    $user = User::findOrFail($userId);

    // Xác thực dữ liệu đầu vào
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $userId,
        'phone' => 'nullable|string|max:10',
        'address' => 'nullable|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Cập nhật thông tin cá nhân
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone_number = $request->input('phone');
  
    $user->address = $request->input('address');

    // Kiểm tra và xử lý ảnh đại diện
    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar'); // Lấy tệp được tải lên

        // Lưu tệp mới vào thư mục upload/admin/avatar
        $avatarPath = $file->storeAs('upload/admin/avatar', $file->getClientOriginalName(), 'public');

        // Xóa ảnh cũ nếu có
        if ($user->image) {
            \Storage::disk('public')->delete('upload/admin/avatar/' . $user->image);
        }

        // Lưu tên tệp ảnh mới vào cơ sở dữ liệu
        $user->image = $file->getClientOriginalName();
    }

    // Lưu thông tin người dùng
    $user->save();

    // Trả về với thông báo thành công
    return redirect()->back()->with('success', 'Thông tin cá nhân đã được cập nhật thành công!');
}
 public function listUsers()
    {
        $users = User::all();
        return view('admin.quanlinguoidung.nguoidung', compact('users'));
    }
     public function promoteUser($id)
    {
        $user = User::findOrFail($id);
        $user->level = 1; // Cấp quản trị viên
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Người dùng đã được thăng cấp thành quản trị viên.');
    }

    public function demoteUser($id)
    {
        $user = User::findOrFail($id);
        $user->level = 0; // Cấp người dùng
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Quản trị viên đã bị hạ cấp thành người dùng.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Người dùng đã bị xóa thành công.');
    }

}

