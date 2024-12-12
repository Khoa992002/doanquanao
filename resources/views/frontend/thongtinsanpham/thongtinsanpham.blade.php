@extends('frontend.layouts.app')

@section('content')



	<!-- breadcrumb -->
	<div class="container">

		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
				Men
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Lightweight Jacket
			</span>
		</div>
	</div>
		
<?php
                // Giải mã thuộc tính hinhanh thành mảng
                 $hinhAnhArray = json_decode($product->main_image_url, true);
                 ?>
<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="{{ asset('upload/admin/product/' . $hinhAnhArray[0] ) }}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset('upload/admin/product/' . $hinhAnhArray[0] ) }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('upload/admin/product/' . $hinhAnhArray[0] ) }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="{{ asset('upload/admin/product/' . $hinhAnhArray[1] ) }}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset('upload/admin/product/' . $hinhAnhArray[1] ) }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('upload/admin/product/' . $hinhAnhArray[1] ) }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="{{ asset('upload/admin/product/' . $hinhAnhArray[2] ) }}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset('upload/admin/product/' . $hinhAnhArray[2] ) }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('upload/admin/product/' . $hinhAnhArray[2] ) }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								{{$product->name}}
						</h4>
						hiển thị trung bình sao
                        <div class="rate">
                    <div class="vote">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($averageRating >= $i)
                                <div class="star_{{ $i }} ratings_stars ratings_hover"><input value="{{ $i }}" type="hidden"></div>
                            @else
                                <div class="star_{{ $i }} ratings_stars"><input value="{{ $i }}" type="hidden"></div>
                            @endif
                        @endfor
                       </div> 
                    </div>
						<span class="mtext-106 cl2">
							 {{ number_format($product->price, 0, ',', '.') }} VND
						</span>

						<p class="stext-102 cl3 p-t-23">
							{{$product->INTRODUCE}}
						</p>
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select id="sizeSelect" class="js-select2" name="size">
											<option value="">Choose an option</option>
                                        @foreach($productSizes as $productSize)
                                          <option 
                                            value="{{ $productSize->pivot->size_id }}" 
                                           data-product-id="{{ $productSize->pivot->product_id }}" 
                                                data-stock="{{ $productSize->pivot->stock_quantity }}">
                                                {{ $productSize->size }}
                                               </option>
                                            @endforeach
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<div id="stockInfo" class="p-t-10" style="color: green;">
                                               <!-- Số lượng sẽ được cập nhật ở đây -->
                                         </div>
										
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" data-id="{{$product->id}}">
										Add to cart
									</button>
								</div>
							</div>	
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
								{{$product->description}}
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

											<span class="stext-102 cl6 size-206">
												0.79 kg
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

											<span class="stext-102 cl6 size-206">
												110 x 33 x 100 cm
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												60% cotton
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												Black, Blue, Grey, Green, Red, White
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												XL, L, M, S
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-lg-12 m-lr-auto">
            <div class="p-b-30 m-lr-15-sm">
                <!-- Review Display -->
                @foreach($comments as $comment)
                <div class="review-box p-3 mb-4 bg-light rounded shadow-sm">
                     <div class="rate">
                    <div class="vote">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($comment->rating >= $i)
                                <div class="star_{{ $i }} ratings_stars ratings_hover"><input value="{{ $i }}" type="hidden"></div>
                            @else
                                <div class="star_{{ $i }} ratings_stars"><input value="{{ $i }}" type="hidden"></div>
                            @endif
                        @endfor
                        
                    </div>
                </div>	
                    <div class="d-flex align-items-start">
                        <div class="wrap-pic-s size-109 bor0 of-hidden rounded-circle mr-3">
                            <<img src="{{ $comment->user && $comment->user->image 
                            ? asset('storage/upload/admin/avatar/' . $comment->user->image) 
                            : asset('default-avatar.png') }}" 
                 alt="{{ $comment->user->name ?? 'Ẩn danh' }}" 
                 class="img-fluid rounded-circle">



                        </div>
                        <div>
                            <h5 class="mb-1 font-weight-bold">{{ $comment->name }}</h5>
                            <small class="text-muted">Posted on {{ $comment->created_at->format('F j, Y') }}</small>
                        </div>
                    </div>
                    <p class="mt-3 mb-1 text-muted">{{ $comment->content }}</p>
                </div>
                @endforeach

                <!-- Add Review -->
                <div class="add-review p-4 bg-white rounded shadow-sm">
                    <h4 class="mb-4">Leave Your Review</h4>
                    <form method="post" action="{{ url('/cmt') }}" class="w-full">
                        @csrf
                        <!-- Rating Section -->
                        <div class="rate user-rating">
                <div class="vote">
                    <div class="star_1 ratings_stars"><input value="1" type="hidden" name="rating"></div>
            <div class="star_2 ratings_stars"><input value="2" type="hidden" name="rating"></div>
            <div class="star_3 ratings_stars"><input value="3" type="hidden" name="rating"></div>
            <div class="star_4 ratings_stars"><input value="4" type="hidden" name="rating"></div>
            <div class="star_5 ratings_stars"><input value="5" type="hidden" name="rating"></div>
            
                </div> 
            </div>

                        <!-- Review Input -->
                        <input type="hidden" name="id_product" value="{{ $product->id }}">
                        <div class="form-group">
                            <label for="review">Your Review</label>
                            <textarea class="form-control size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" 
                                      id="review" name="review" rows="4"></textarea>
                        </div>

                        <input type="hidden" name="level" class="level" value="0">

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="btn btn-primary btn-block flex-c-m stext-101 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: Jacket, Men
			</span>
		</div>
	</section>							
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="js/jquery-1.9.1.min.js"></script>   
<script type="text/javascript">  
    $(document).ready(function() {
   $('#sizeSelect').on('change', function () {
    var sizeId = $(this).val(); // Lấy size_id từ dropdown
   var productId = $(this).find(':selected').data('product-id'); // Lấy product_id từ dropdown
   
    if (!sizeId || !productId) {
        $('#stockInfo').css('color', 'red').text('Thiếu thông tin sản phẩm hoặc kích thước!');
        return;
    }

    // Hiển thị trạng thái tải
    $('#stockInfo').css('color', 'blue').text('Đang tải thông tin...');

    // AJAX Request
    $.ajax({
        url: `/products/${productId}/sizes/${sizeId}/stock`, // RESTful API endpoint
        method: 'GET',
        success: function (response) {
            if (response.stock_quantity === 0) {
                $('#stockInfo').css('color', 'red').text('Hết hàng. Vui lòng chọn kích thước khác!');
            } else {
                var formattedPrice = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(response.price);
                $('#stockInfo').css('color', 'green').text(`Còn ${response.stock_quantity} sản phẩm `);
            }
        },
        error: function (xhr) {
            var error = xhr.responseJSON?.message || 'Không thể lấy thông tin số lượng. Vui lòng thử lại!';
            $('#stockInfo').css('color', 'red').text(error);
        }
    });
});


        $('.js-addcart-detail').click(function(e) {  
            e.preventDefault(); // Ngăn chặn hành vi mặc định của button  

            // Lấy ID sản phẩm từ thuộc tính data-id  
            var productId = $(this).data('id'); // Lấy ID sản phẩm từ data-id  
            var size = $('select[name="size"]').val(); // Lấy giá trị size đã chọn  $('select[name="size"] option:selected').text(), // Gửi tên size thay vì ID
            var color = $('select[name="color"]').val(); // Lấy giá trị color đã chọn  
            var quantity = $('input[name="num-product"]').val(); // Lấy số lượng  

            if (size === "Choose an option") {  
                alert("Vui lòng chọn kích thước.");  
                return false; // Dừng quá trình nếu chưa chọn size  
            }  

            // Kiểm tra nếu color chưa được chọn  
            if (color === "Choose an option") {  
                alert("Vui lòng chọn màu sắc.");  
                return false; // Dừng quá trình nếu chưa chọn color  
            }  

            // Gửi yêu cầu tới server để thêm sản phẩm vào giỏ hàng  
            $.ajax({  
                url: '/add-to-cart', // Đường dẫn API để thêm sản phẩm vào giỏ hàng  
                type: 'POST',  
                data: { 
                 
                    id: productId,
                    size: size,
                    color: color,
                    quantity: quantity, // ID sản phẩm  
                    _token: '{{ csrf_token() }}' // Nếu sử dụng Laravel, thêm token CSRF  
                },  
                success: function(response) {  
                    alert(response.success); 
                    
                    // Cập nhật số lượng sản phẩm trong icon giỏ hàng
                    $('.icon-header-item').attr('data-notify', response.total_qty);
                    
                    // Cập nhật giỏ hàng với sản phẩm mới
                    updateCart(response.cart);

                    // Lưu giỏ hàng vào localStorage
                    localStorage.setItem('cart', JSON.stringify(response.cart));
                },  
                error: function(xhr, status, error) {  
                    // Xử lý khi có lỗi xảy ra  
                   var errorResponse = xhr.responseJSON;
            if (errorResponse && errorResponse.message) {
                alert(errorResponse.message); // Hiển thị thông báo lỗi qua alert
            } else {
                alert('Đã xảy ra lỗi. Vui lòng thử lại!'); // Lỗi không xác định
            }
        }
    });
});



        // Hàm cập nhật giỏ hàng
        function updateCart(cartItems) {
            // Xóa nội dung hiện tại trong giỏ hàng
            $('.header-cart-wrapitem').empty();
      
            // Kiểm tra nếu giỏ hàng không rỗng
            if (cartItems.length > 0) {
                cartItems.forEach(function(product) {
                    var hinhAnhArray = Array.isArray(product.image) ? product.image : JSON.parse(product.image);
                    var imagePath = "{{ asset('upload/admin/product/') }}" + '/' + hinhAnhArray[0];
                    let newItem = `
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                                <img src="${imagePath}" alt="Product Image">
                            </div>
                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    ${product.name}
                                </a>
                                <span class="header-cart-item-info">
							Size: <span class="cart-item-size">  ${product.size}</span><br>
							Màu sắc: <span class="cart-item-color">${product.color}</span>
						</span>
                                <span class="header-cart-item-info">
                                    ${product.qty} x $${product.price}
                                </span>
                            </div>
                        </li>`;
                    $('.header-cart-wrapitem').append(newItem);
                });
            } else {
                $('.header-cart-wrapitem').append('<li>No items in cart.</li>'); // Hiển thị thông báo khi giỏ hàng rỗng
            }

            // Cập nhật tổng tiền
            $('.header-cart-total').text(`Total: $${calculateTotal()}`);
        }

        // Hàm tính tổng tiền
        function calculateTotal() {
            let total = 0;
            $('.header-cart-item').each(function() {
                let price = parseFloat($(this).find('.header-cart-item-info').text().split('$')[1]);
                let qty = parseInt($(this).find('.header-cart-item-info').text().split(' x ')[0]);
                total += price * qty;
            });
            return total.toFixed(2);
        }

        // Kiểm tra xem có giỏ hàng trong localStorage không khi tải lại trang
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        updateCart(cart);

        // Xử lý gửi form bình luận
        $("form").submit(function(event) {  
            event.preventDefault();  // Ngăn chặn gửi form mặc định  

            var getMess = $("textarea[name='review']").val();  
            var checkLogin = "{{ Auth::check() ? 'true' : 'false' }}";  // Chuyển đổi thành chuỗi  
            var id_product = {{ $product->id }};  // Lưu id_product nếu cần  
            var ratingValue = $('.ratings_stars.ratings_over').last().find('input').val();

            // Kiểm tra đăng nhập  
            if (checkLogin === 'true') {  // Sử dụng chuỗi để so sánh  
                if (getMess.trim() === "") {  // Sử dụng trim() để loại bỏ khoảng trắng  
                    $("p.err1").text("Vui lòng nhập bình luận");  
                    return false;  // Ngăn gửi form  
                } else {  
                    $("p.err1").text("");  // Xóa thông báo lỗi  
                }  
            } else {  
                alert("Vui lòng đăng nhập để bình luận.");  
                return false;  // Ngăn gửi form  
            }  

            // Gửi form nếu tất cả điều kiện đã được đáp ứng  
            this.submit();  // Gửi form một cách thủ công  
        });
       $('.user-rating .ratings_stars').hover(
        function () {
            $(this).prevAll().addBack().addClass('ratings_hover'); // Sử dụng addBack thay vì andSelf
        },
        function () {
            $(this).prevAll().addBack().removeClass('ratings_hover'); // Sử dụng addBack thay vì andSelf
        }
    );

    $('.user-rating .ratings_stars').click(function () {
         var ratingValue = $(this).find('input').val();
    $("input[name='rating']").val(ratingValue); // Cập nhật giá trị cho input hidden
        alert(`You rated: ${ratingValue}`);
        $('.ratings_stars').removeClass('ratings_over');
        $(this).prevAll().addBack().addClass('ratings_over'); // Sử dụng addBack thay vì andSelf
    });

    });
</script>



  

	<!-- Related Products -->

@endsection
