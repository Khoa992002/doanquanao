@extends('frontend.layouts.app')

@section('content')

<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				  <div class="flex-w flex-l-m filter-tope-group m-tb-10">
               <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="all">
                     All Products
               </button>
                @foreach ($category as $category)
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 filter-button" value="{{ $category->id }}" data-filter=".men">
                 {{ $category->name }}
               </button>
            @endforeach
               
            </div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
               <form action="{{ url('timkiem') }}" method="GET">
               <div class="bor8 dis-flex p-l-15">
                  <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                     <i class="zmdi zmdi-search"></i>
                  </button>

                  <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Nhập tên sản phẩm bạn muốn tìm">
               </div> 
               </form>  
            </div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
               <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                  <div class="filter-col1 p-r-15 p-b-27">
                     <div class="mtext-102 cl2 p-b-15">
                        Sort By
                     </div>

                     <ul>
                        <li class="p-b-6">
                           <a href="#" class="filter-link stext-106 trans-04">
                              Default
                           </a>
                        </li>

                        <li class="p-b-6">
                           <a href="#" class="filter-link stext-106 trans-04">
                              Popularity
                           </a>
                        </li>

                        <li class="p-b-6">
                           <a href="#" class="filter-link stext-106 trans-04">
                              Average rating
                           </a>
                        </li>

                        <li class="p-b-6">
                           <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                              Newness
                           </a>
                        </li>

                        <li class="p-b-6">
                           <a href="#" class="filter-link stext-106 trans-04">
                              Price: Low to High
                           </a>
                        </li>

                        <li class="p-b-6">
                           <a href="#" class="filter-link stext-106 trans-04">
                              Price: High to Low
                           </a>
                        </li>
                     </ul>
                  </div>

                  <div class="filter-col2 p-r-15 p-b-27">
                     <div class="mtext-102 cl2 p-b-15">
                        Giá
                     </div>

                     <ul>
                        <li class="p-b-6">
                           <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                              Giá Thấp - Cao
                           </a>
                        </li>

                        <li class="p-b-6">
                           <a href="#" class="filter-link stext-106 trans-04">
                             Giá Cao - Thấp
                           </a>
                        </li>

                       
                     </ul>
                  </div>

                  <div class="filter-col3 p-r-15 p-b-27">
                     <div class="mtext-102 cl2 p-b-15">
                        Thương Hiệu
                     </div>

                     <ul>
                        @foreach ($brands as $brand)
                        <li class="p-b-6">
                           <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                              <i class="zmdi zmdi-circle"></i>
                           </span>

                           <a  class="filter-link stext-106 trans-04 brand-filter"  data-brand-id="{{ $brand->id }}">
                             {{ $brand->name }}
                           </a>
                        </li>
                           @endforeach
                        
                     </ul>
                  </div>

                  <div class="filter-col4 p-b-27">
                     <div class="mtext-102 cl2 p-b-15">
                        Tags
                     </div>

                     <div class="flex-w p-t-4 m-r--5">
                        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                           Fashion
                        </a>

                        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                           Lifestyle
                        </a>

                        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                           Denim
                        </a>

                        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                           Streetstyle
                        </a>

                        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                           Crafts
                        </a>
                     </div>
                  </div>
               </div>
            </div>
			</div>
           <h2 class="title text-center">Kết quả tìm kiếm cho "{{ $searchTerm }}"</h2>
			<div class="row isotope-grid">

				
				@foreach($sanphamtimduoc as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <?php
                    // Giải mã JSON hình ảnh và hiển thị ảnh đầu tiên
                     $hinhAnhArray = json_decode($product->main_image_url, true);
                    ?>
                    <img src="{{ asset('upload/admin/product/' . $hinhAnhArray[0] ) }}" style="width: 100%; height: auto; max-height: 300px; object-fit: cover; border-radius: 10px;" alt="IMG-PRODUCT ">

                    <a href="#" id="xem" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-id="{{ $product->id }}">
                        Quick View
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                      <a href="{{ route('chitietsanpham', ['id' => $product->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">


                            {{ $product->name }}
                        </a>

                        <span class="stext-105 cl3">
                            {{ number_format($product->price, 0, ',', '.') }} VND
                        </span>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">
                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            <img class="icon-heart1 dis-block trans-04" src="{{url('frontend/images/icons/icon-heart-01.png')}}" alt="ICON">
                            
                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{url('frontend/images/icons/icon-heart-02.png')}}" alt="ICON">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

				
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>
		<script type="text/javascript">
    $(document).ready(function() {
         // Lọc theo "All Products"
    $('button[data-filter=""]').on('click', function() {
        loadProducts(); // Nếu không có bộ lọc, tải tất cả sản phẩm

        $(this).addClass('how-active1').siblings().removeClass('how-active1');
    });

        // Khi người dùng nhấn vào một nút danh mục
        $('.filter-button').on('click', function() {
            // Lấy giá trị của thuộc tính 'value' từ nút bấm
            const categoryId = $(this).val();
             $(this).addClass('how-active1').siblings().removeClass('how-active1');
            // Gửi yêu cầu AJAX đến route lọc sản phẩm
            $.ajax({
                url: '{{ route('products.filter') }}',
                method: 'GET',
                data: { category: categoryId },
                success: function(response) {
                    var products = response.data; // Lấy dữ liệu sản phẩm từ phản hồi của server
                    displayProducts(products); // Gọi hàm hiển thị sản phẩm để cập nhật giao diện người dùng
                },
                error: function() {
                    alert('Error loading products');
                }
            });
        });
         $('.brand-filter').on('click', function(e) {
       
        
        var brandId = $(this).data('brand-id'); // Lấy ID của thương hiệu

        // Gửi yêu cầu AJAX đến server
        $.ajax({
            url: 'products/brand/' , // Đường dẫn đến route
            type: 'GET',
             data: { brand:brandId },
            success: function(response) {
                // Xử lý phản hồi từ server
                var products = response.data; // Lấy dữ liệu sản phẩm từ phản hồi của server
               displayProducts(products);
              
            },
            error: function(xhr) {
                console.error('Lỗi khi tải sản phẩm:', xhr);
            }
        });
    });
 // Khởi tạo Isotope với cấu hình masonry
    var $grid = $('.isotope-grid').isotope({
        itemSelector: '.isotope-item',
        layoutMode: 'masonry', // Sử dụng masonry layout để sắp xếp các phần tử
        masonry: {
            columnWidth: '.isotope-item', // Đảm bảo các phần tử được chia cột đúng cách
            gutter: 10  // Khoảng cách giữa các phần tử
        }
    });
     // Hàm hiển thị sản phẩm
        function displayProducts(products) {
            var productHtml = '';
            
            // Lặp qua từng sản phẩm và tạo HTML cho mỗi sản phẩm
            products.forEach(function(product) {
                var productImage = product.main_image_url ? JSON.parse(product.main_image_url)[0] : 'default-image.jpg';  // Giải mã JSON nếu có
                var productUrl = "{{ route('chitietsanpham', ['id' => '__id__']) }}".replace('__id__', product.id);
                var productPrice = new Intl.NumberFormat().format(product.price);  // Định dạng giá

                productHtml += `
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('upload/admin/product/') }}/${productImage}" style="width: 100%; height: auto; max-height: 300px; object-fit: cover; border-radius: 10px;" alt="${product.name}">
                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-id="${product.id}">
                                    Quick View
                                </a>
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l">
                                    <a href="${productUrl}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        ${product.name}
                                    </a>
                                    <span class="stext-105 cl3">
                                        ${productPrice} VND
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            // Cập nhật HTML vào phần sản phẩm
             $('.isotope-grid').html(productHtml);

    // Khởi tạo lại Isotope sau khi cập nhật HTML

    var $grid = $('.isotope-grid');

    $grid.isotope('destroy');  // Hủy Isotope hiện tại
    $grid.isotope({           // Khởi tạo lại Isotope
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows'  // Hoặc bất kỳ layoutMode mà bạn đang sử dụng
    });
    }

    });

   
</script>


@endsection
