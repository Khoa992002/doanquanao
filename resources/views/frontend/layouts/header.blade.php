<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a>
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							logout
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="{{ asset('frontend/images/icons/KSP.png') }}" alt="Logo">  

					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="{{url('home')}}">Trang Chủ</a>
								
							</li>

							<li>
								<a href="{{url('shop')}}">Cửa Hàng</a>
							</li>

							
							<li>
								<a href="{{url('blog')}}">Tin Tức</a>
							</li>

							<li>
								<a href="{{url('about')}}">About</a>
							</li>
							

							@if (Auth::check())
    <li style="" class="menu-item">
        <a href="{{ url('dangxuat') }}" class="logout-link" title="Logout">Logout</a>
    </li>
    <li class="menu-item dropdown">
        <a href="#" class="dropdown-toggle">Tài khoản</a>
        <ul class="dropdown-menu">
            <li><a href="{{ url('thongtincanhan') }}">Trang cá nhân</a></li>
           <!--  <li><a href="{{ url('notifications') }}">Thông báo</a></li>
            <li><a href="{{ url('settings') }}">Cài đặt</a></li> -->
            @if(auth()->user()->level == 1)
                <li><a href="{{ route('admin.dashboard') }}">Vào trang quản trị</a></li>
            @else
                <li><a href="#">Chào mừng, Member!</a></li>
            @endif
        </ul>
    </li>
@else
    <li class="menu-item">
        <a href="{{ url('dangnhap') }}" class="login-link" title="Login">Login</a>
    </li>
@endif

						          </ul>
					            </div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify=" {{ session('total_qty',0) }}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="{{ url('frontend/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="3">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="{{url('/login')}}">Contact</a>
				</li>
			</ul>
		</div>
	<div class="wrap-header-cart js-panel-cart">
      <div class="s-full js-hide-cart"></div>

     <div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>

	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">Sản phẩm bạn đã chọn</span>

			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>
		
		<div class="header-cart-content flex-w js-pscroll">
			<ul class="header-cart-wrapitem w-full">
				<li class="header-cart-item flex-w flex-t m-b-12">
					<div class="header-cart-item-img">
						<img src="" alt="Logo">
					</div>

					<div class="header-cart-item-txt p-t-8">
						<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							Tên sản phẩm
						</a>

						<span class="header-cart-item-info">
							Size: <span class="cart-item-size">M</span><br>
							Màu sắc: <span class="cart-item-color">Đỏ</span>
						</span>
					</div>
				</li>
			</ul>

			<div class="w-full">
				<div class="header-cart-total w-full p-tb-40">
					Total: $75.00
				</div>

				<div class="header-cart-buttons flex-w w-full">
					<a href="{{ url('/cart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						View Cart
					</a>

					<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
						Check Out
					</a>
				</div>
			</div>
		</div>
	</div>
</div>



   
</div>

				</div>
			</div>
		</div>
	</div>
   </div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{ asset('frontend/images/icons/icon-close2.png') }}" alt="CLOSE">
				</button>

				<form action="{{ url('timkiem') }}" method="GET" class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search-product" placeholder="nhập tên sản phẩm bạn muốn tìm">        
				</form>
			</div>
		</div>
	</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
	<script type="text/javascript">
$(document).ready(function() {
    // Đường dẫn hình ảnh
    

    // Hàm cập nhật giỏ hàng
    function updateCart(cartItems) {
        // Xóa nội dung hiện tại trong giỏ hàng
        $('.header-cart-wrapitem').empty();
        let total = 0;

        // Kiểm tra nếu giỏ hàng không rỗng
        if (cartItems.length > 0) {
            cartItems.forEach(function(product) {
                // Kiểm tra nếu sản phẩm có thuộc tính image
                var hinhAnhArray = Array.isArray(product.image) ? product.image : JSON.parse(product.image);
                    var imagePath = "{{ asset('upload/admin/product/') }}" + '/' + hinhAnhArray[0];

                let newItem = `
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="${imagePath}" alt="Product Image">
                        </div>
                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                ${product.name || 'Product Name'}
                            </a>
                            <span class="header-cart-item-info">
							Size: <span class="cart-item-size">M</span><br>
							Màu sắc: <span class="cart-item-color">Đỏ</span>
						</span>
                            <span class="header-cart-item-info">
                                ${product.qty || 0} x $${product.price || 0.00}
                            </span>
                        </div>
                    </li>`;
                $('.header-cart-wrapitem').append(newItem);

                // Tính tổng tiền
                total += (product.qty || 0) * (product.price || 0.00);
            });
        } else {
            $('.header-cart-wrapitem').append('<li>No items in cart.</li>'); // Hiển thị thông báo khi giỏ hàng rỗng
        }

        // Cập nhật tổng tiền
        $('#cart-total').text(total.toFixed(2));
    }

    // Kiểm tra xem có giỏ hàng trong localStorage không khi tải lại trang
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    updateCart(cart); // Cập nhật giỏ hàng khi trang tải

    // Cập nhật khi thêm sản phẩm vào giỏ hàng
    $('.js-addcart-detail').click(function(e) {  
        e.preventDefault(); // Ngăn chặn hành vi mặc định của button

        // Lấy thông tin sản phẩm từ DOM
        var productId = $(this).data('id'); // Lấy ID sản phẩm từ data-id
        var size = $('select[name="size"]').val(); // Lấy giá trị size đã chọn
        var color = $('select[name="color"]').val(); // Lấy giá trị color đã chọn
        var quantity = $('input[name="num-product"]').val(); // Lấy số lượng

        // Thực hiện kiểm tra và gọi AJAX ở đây...

        // Sau khi thành công, cập nhật giỏ hàng
        // updateCart(updatedCart);
    });
});
</script>
