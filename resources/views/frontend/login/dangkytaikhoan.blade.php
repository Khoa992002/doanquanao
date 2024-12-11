@extends('frontend.layouts.app')

@section('content')

<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					  @if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                {{session('success')}}
                            </div>
                        @endif
    <form action="{{ url('dangky') }}" method="post" enctype="multipart/form-data">
        @csrf

        <h4 class="mtext-105 cl2 txt-center p-b-30">
            Đăng Ký Tài Khoản Mới
        </h4>

        <!-- Email -->
        <div class="bor8 m-b-20 how-pos4-parent">
            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" id="email" name="email" placeholder="Nhập email" required>
            <img class="how-pos4 pointer-none" src="frontend/images/icons/icon-email.png" alt="ICON">
        </div>
         <div class="bor8 m-b-20 how-pos4-parent">
            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="name" id="name" name="name" placeholder="Nhập tên" required>
        </div>

        <!-- Mật khẩu -->
        <div class="bor8 m-b-30">
            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>

        <!-- Địa chỉ -->
        <div class="bor8 m-b-30">
            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="address" name="address" placeholder="Nhập địa chỉ giao của bạn" required>
        </div>

        <!-- Số điện thoại -->
        <div class="bor8 m-b-30">
            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="tel" id="number" name="number" placeholder="Nhập số điện thoại" required>
        </div>
 <!-- ảnh đại diện -->
        <div class="bor8 m-b-30">
          <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="file" name="avatar"  placeholder="ảnh đại diện của bạn">   
        </div>

        <!-- Nút submit -->
        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
            Đăng Ký
        </button>
        
    </form>
</div>


				
			</div>
		</div>
	</section>	

	

@endsection