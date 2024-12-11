@extends('frontend.layouts.app')

@section('content')
	



	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" action="{{ url('thanhtoan') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- Đảm bảo bảo mật cho form -->
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>

                            @foreach($products as $key => $product)
                                <?php
                                    $getArrImage = json_decode($product['main_image_url'], true);
                                ?>

                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="{{ asset('upload/admin/product/' . $getArrImage[0]) }}" alt="IMG">
                                        </div>
                                    </td>

                                    <td class="column-2">{{ $product['name'] }}
                                     <br>
                                     <small>Size: {{ $product['size'] }}</small> </td>
                                    <td class="column-3">{{ number_format($product['price'] ?? 0, 0, ',', '.') }}đ</td> 
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" data-id="{{ $product['id'] }}" type="number" name="quantity[{{ $key }}]" value="{{ $product['qty'] }}" size="{{ $product['size'] }}">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5" data-price="{{ $product['price'] }}">{{ number_format($product['price'] * $product['qty']??0,0,',','.') }}đ</td>
                                </tr>
                            @endforeach

                            @php
                                $sum = $sum ?? 0;  // Đảm bảo tính tổng giỏ hàng
                            @endphp

                            <tr>
                                <td colspan="4" class="column-5">Subtotal:</td>
                                <td class="column-5">{{ number_format($sum??0,0,',','.')}}đ</td>
                            </tr>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

                            <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Apply coupon
                            </div>
                        </div>

                        <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" id="update-cart">
                            Update Cart
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">Cart Totals</h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">Subtotal:</span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">${{ number_format($sum??0,0,',','.')}}đ</span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">Shipping:</span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                Để lại thông tin để chúng tôi có thể giao hàng cho bạn
                            </p>

                            <div class="p-t-15">
                                <span class="stext-112 cl8">Enter Shipping Details</span>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_name" placeholder="Full Name" required>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="shipping_address" placeholder="Shipping Address" required>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Phone Number" required>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email" placeholder="Email (optional)">
                                </div>

                                <div class="flex-w">
                                    <button type="submit" class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                        Thanh toán khi nhận hàng
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">Total:</span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">${{ number_format($sum??0,0,',','.') }}đ</span>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Thanh toán online
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {  
    // Thêm sự kiện click cho nút tăng sản phẩm  
    $('.btn-num-product-up').on('click', function() {  
        var $input = $(this).siblings('.num-product'); // Lấy input số lượng  
        var currentVal = parseInt($input.val()); // Lấy giá trị hiện tại trong input  

        // Nếu giá trị hiện tại hợp lệ, tăng giá trị lên 1  
        if (!isNaN(currentVal)) {  
            $input.val(currentVal ++);  
        }  

        updateProductTotal($input);  // Cập nhật tổng tiền cho sản phẩm

        // Gửi dữ liệu cập nhật lên server  
        updateCart($input);  
    });

    // Thêm sự kiện click cho nút giảm sản phẩm  
    $('.btn-num-product-down').on('click', function() {  
        var $input = $(this).siblings('.num-product'); // Lấy input số lượng  
        var currentVal = parseInt($input.val()); // Lấy giá trị hiện tại trong input  

        // Nếu giá trị hiện tại lớn hơn 0, giảm giá trị xuống 1  
        if (!isNaN(currentVal) && currentVal > 0) {  
            $input.val(currentVal --);  
        }  

        updateProductTotal($input);  // Cập nhật tổng tiền cho sản phẩm

        // Gửi dữ liệu cập nhật lên server  
        updateCart($input); 
    });

    // Hàm cập nhật tổng tiền cho sản phẩm trong giỏ hàng
    function updateProductTotal($input) {
        var quantity = parseInt($input.val()); // Lấy số lượng từ input
        var price = parseFloat($input.closest('tr').find('.column-5').data('price')); // Lấy giá sản phẩm
        var total = (quantity * price).toFixed(2); // Tính tổng cho sản phẩm

        // Cập nhật tổng tiền cho sản phẩm
        $input.closest('tr').find('.column-5').text(total); 
    }


    // Hàm xử lý gửi dữ liệu lên server  
    function updateCart($input) {  
        var productId = $input.data('id'); // Lấy ID sản phẩm từ data-id  
        var quantity = $input.val(); // Lấy số lượng từ input  
        var size = $input.attr('size'); // Lấy size sản phẩm

        // Gửi dữ liệu lên server thông qua AJAX  
        $.ajax({  
            url: '/update-cart', // Đường dẫn để gửi request  
            type: 'POST', // Phương thức gửi dữ liệu  
            data: {  
                id: productId,  
                quantity: quantity,  
                size: size, // Lấy size sản phẩm
                _token: $('meta[name="csrf-token"]').attr('content') // Thêm CSRF token nếu cần  
            },  
            success: function(response) {  
                console.log(response); // Kiểm tra phản hồi từ server

                    // Cập nhật tổng tiền sản phẩm sau khi cập nhật giỏ hàng
                    updateProductTotal($input);  

                    // Cập nhật số lượng sản phẩm trong icon giỏ hàng
                    $('.icon-header-item').attr('data-notify', response.total_qty);

                    // Lưu giỏ hàng vào localStorage để lưu trữ dữ liệu giỏ hàng ở phía client
                     localStorage.setItem('cart', JSON.stringify(response.cart));
            },  
            error: function(xhr, status, error) {  
                console.error('Có lỗi xảy ra:', error); // In ra lỗi nếu có  
            }  
        });  
    }
   if (localStorage.getItem('cart')) {
    var cart = JSON.parse(localStorage.getItem('cart'));

    // Kiểm tra xem cart có tồn tại và chứa items là một mảng
    if (cart && Array.isArray(cart.items)) {
        // Cập nhật lại số lượng sản phẩm trong icon giỏ hàng
        $('.icon-header-item').attr('data-notify', cart.total_qty);

        // Cập nhật tổng tiền giỏ hàng (nếu cần)
        $('#cart-total').text('$' + cart.total_price);

        // Lặp qua giỏ hàng và cập nhật lại thông tin sản phẩm trong giỏ hàng
        cart.items.forEach(function(item) {
            var $input = $('input[data-id="' + item.id + '"][size="' + item.size + '"]');
            if ($input.length) {
                $input.val(item.quantity);  // Cập nhật lại số lượng
                updateProductTotal($input); // Cập nhật tổng tiền cho sản phẩm
            }
        });
    } else {
        console.error("Cart items không phải là mảng hoặc không tồn tại.");
    }
}


});



    // Cập nhật giỏ hàng khi người dùng nhấn nút "Update Cart"
    // Cập nhật giỏ hàng khi người dùng nhấn nút "Update Cart"

</script>






@endsection

