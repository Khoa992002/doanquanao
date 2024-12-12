<?php

use Illuminate\Support\Facades\Route;
//
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\QuanLySanPhamController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\PaymentController;

//
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\NhatKyController;
use App\Http\Controllers\ChatController;
//
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//frontend
Route::get('home',[HomeController::class, 'index']);

Route::get('shop',[HomeController::class, 'shop']);
Route::get('about',[HomeController::class, 'about']);

Route::get('dangnhap',[LoginController::class, 'dangnhap']);
Route::get('dangxuat',[LoginController::class, 'dangxuat']);
Route::post('nhaptaikhoa',[LoginController::class, 'nhaptaikhoan']);
Route::get('dangkytaikhoan',[LoginController::class, 'dangkytaikhoamoi']);
Route::post('dangky',[LoginController::class, 'dangky']);

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('home/chitietsanpham/{id}', [ProductController::class, 'thongtinsanpham'])->name('chitietsanpham');
Route::get('products/{productId}/sizes/{sizeId}/stock', [ProductController::class, 'getStockBySize']);
//thanh toán momo
Route::post('/momo/qr-payment', [PaymentController::class, 'generateQrPayment'])->name('momo.qr.payment');
Route::get('/payment-success', function () {
    return view('frontend.thanhtoan.thanhtoanmomo');
})->name('payment.success');

Route::post('/payment-ipn', function (Request $request) {
    // Xử lý thông báo từ MoMo (IPN - Instant Payment Notification)
    // Log dữ liệu để kiểm tra
    \Log::info('IPN data received:', $request->all());

    return response()->json(['message' => 'IPN received']);
})->name('payment.ipn');



//xu ly danh gia
Route::post('cmt', [ProductController::class, 'nhapcmt']);

Route::post('add-to-cart', [CartController::class, 'themgiohang']);
Route::get('/cart', [CartController::class, 'giaodiengiohang']);
// xử lý +.-.xóa sản pharmam trong giỏ hàng
Route::post('/update-cart', [CartController::class, 'updateCart'])->middleware('web');
Route::post('/update-cartu', [CartController::class, 'updateCartu']);
//xử lý lọc
Route::get('/products/filter', [ProductController::class, 'filterProducts'])->name('products.filter');
Route::get('products/brand', [ProductController::class, 'filterByBrand'])->name('products.brand.filter');



//xử lý thanh toán 
Route::post('thanhtoan', [PaymentController::class, 'processPayment']);
Route::get('/giaodienthanhtoan/{order}', [PaymentController::class, 'showPaymentPage'])->name('giaodienthanhtoan');
// xử lý tìm kiếm sản phẩm
Route::get('timkiem', [ProductController::class, 'search']);
//xếp theo giá
Route::get('/products/sort/price', [ProductController::class, 'sortByPrice'])->name('products.sort.price');



//view phần blog

Route::get('blog', [NhatKyController::class, 'blog']);
Route::get('blog-detail/{id}', [NhatKyController::class, 'ctblog']);
//view phần thông tin cá nhân

Route::get('thongtincanhan', [UserController::class, 'thongtincanhan']);
Route::post('suathongtincanhan', [UserController::class, 'update'])->name('suathongtincanhan');
Route::get('giohangcuaban/{order}', [OrderController::class, 'giohangcuaban'])->name('giohangcuaban');




//admin
Route::get('admin/dashboard',[UserController::class, 'index'])->name('admin.dashboard');
Route::get('admin/profile',[UserController::class, 'giaodienadmin']);
Route::post('edit/member',[UserController::class, 'capnhatthongtin']);

Route::get('admin/quanlisanpham',[QuanLySanPhamController::class, 'giaodiensanpham'])->name('admin/quanlisanpham');
Route::get('admin/themsanpham',[QuanLySanPhamController::class, 'themsanpham']);
Route::post('add/sanpham',[QuanLySanPhamController::class, 'addnewsp']);
Route::delete('product.delete/{id}',[QuanLySanPhamController::class, 'xoasp'])->name('product.delete');
Route::get('admin/sanpham/edit/{id}', [QuanLySanPhamController::class, 'edit'])->name('product.edit');
Route::put('admin/sanpham/update/{id}', [QuanLySanPhamController::class, 'update'])->name('product.update');


Route::post('updateSize/{product_id}/{size_id}', [QuanLySanPhamController::class, 'updateSize'])->name('updateSize');




//nhập size cho sản phẩm
Route::get('admin/thongtinchitietsp/{id}',[QuanLySanPhamController::class, 'thongtinchitietsp'])->name('thongtinchitietsp');
Route::post('product.addSize/{id}',[QuanLySanPhamController::class, 'addSize'])->name('product.addSize');
//sữa hình ảnh sp
Route::post('product/{id}/image/{index}/update', [QuanLySanPhamController::class, 'updateImage'])->name('product.updateImage');



//xóa san pham


//quảm lí nhãn hàng
Route::get('admin/quanlinhanhang',[QuanLySanPhamController::class, 'giaodiannhanhang'])->name('admin/quanlinhanhang');;
Route::post('brands.store',[QuanLySanPhamController::class, 'themnhanhang'])->name('brands.store');
Route::post('/brands/{id}/toggle-products', [QuanLySanPhamController::class, 'toggleProducts'])->name('brands.toggleProducts');


//nhập size cho sản phẩm
// quản lí đơn hàng
Route::get('/admin/quanlidonhang', [OrderController::class, 'donhang'])->name('admin.orders.index');
Route::get('/admin/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::patch('admin/orders/{id}/approve', [OrderController::class, 'approveOrder'])->name('admin.orders.approve');
// xử lý phần blog
Route::get('admin/blog', [BlogController::class, 'blogview'])->name('admin.blog.blog');
//thêm blog
Route::post('/add/blog',[BlogController::class, 'addblog']);
Route::put('/admin/blog/{id}', [BlogController::class, 'update'])->name('admin.blog.update');

Route::delete('blog.delete/{id}', [BlogController::class, 'xoablog'])->name('blog.delete');
Route::get('admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
Route::get('admin/xemchitietblog/{id}',[BlogController::class, 'chitietblog']);

Route::get('/revenue-by-date', [OrderController::class, 'getRevenueByDate']);

//quản lí người dùng
Route::get('/admin/quanlinguoidung', [UserController::class, 'listUsers'])->name('admin.users');
Route::patch('/admin/users/{id}/promote', [UserController::class, 'promoteUser'])->name('admin.promoteUser');
Route::patch('/admin/users/{id}/demote', [UserController::class, 'demoteUser'])->name('admin.demoteUser');
Route::delete('/admin/users/{id}', [UserController::class, 'deleteUser'])->name('admin.deleteUser');

Route::post('/chat', [ChatController::class, 'handleChat']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
