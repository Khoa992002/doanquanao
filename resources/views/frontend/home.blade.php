@extends('frontend.layouts.app')

@section('content')

  

      

   <!-- Slider -->
   <section class="section-slide">
      <div class="wrap-slick1">
         <div class="slick1">
            <div class="item-slick1" style="background-image: url(frontend/images/7dot.png);">
               <div class="container h-full">
                  <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                     <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                        <span class="ltext-101 cl2 respon2">
                           CHUYÊN ĐỒ THỂ THAO
                        </span>
                     </div>
                        
                     <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                        <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                         CHẤT LƯỢNG HÀNG ĐẦU
                        </h2>
                     </div>
                        
                     <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                        <a href="{{url('shop')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                           Shop Now
                        </a>
                     </div>
                  </div>
               </div>
            </div>

            <div class="item-slick1" style="background-image: url(frontend/images/duc.png);">
               <div class="container h-full">
                  <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                     <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                        <span class="ltext-101 cl2 respon2">
                           TRANG PHỤC CHUẨN MEN 2024
                        </span>
                     </div>
                        
                     <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                        <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                           Jackets & Coats
                        </h2>
                     </div>
                        
                     <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                        <a href="{{url('shop')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                           Shop Now
                        </a>
                     </div>
                  </div>
               </div>
            </div>

            <div class="item-slick1" style="background-image: url(frontend/images/slide-03.jpg);">
               <div class="container h-full">
                  <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                     <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                        <span class="ltext-101 cl2 respon2">
                           MẪU MÃ ĐA DẠNG
                        </span>
                     </div>
                        
                     <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                        <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                           New arrivals
                        </h2>
                     </div>
                        
                     <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                        <a href="{{url('shop')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                           Shop Now
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>


   <!-- Banner -->
   <div class="sec-banner bg0 p-t-80 p-b-50">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
               <!-- Block1 -->
               <div class="block1 wrap-pic-w">
                  <img src="frontend/images/banner-01.jpg" alt="IMG-BANNER">

                  <a href="{{url('shop')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                     <div class="block1-txt-child1 flex-col-l">
                        <span class="block1-name ltext-102 trans-04 p-b-8">
                           ÁO KHOÁT
                        </span>

                        <span class="block1-info stext-102 trans-04">
                           Spring 2024
                        </span>
                     </div>

                     <div class="block1-txt-child2 p-b-4 trans-05">
                        <div class="block1-link stext-101 cl0 trans-09">
                           Shop Now
                        </div>
                     </div>
                  </a>
               </div>
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
               <!-- Block1 -->
               <div class="block1 wrap-pic-w">
                  <img src="frontend/images/banner-02.jpg" alt="IMG-BANNER">

                  <a href="{{url('shop')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                     <div class="block1-txt-child1 flex-col-l">
                        <span class="block1-name ltext-102 trans-04 p-b-8">
                           Men
                        </span>

                        <span class="block1-info stext-102 trans-04">
                           Spring 2024
                        </span>
                     </div>

                     <div class="block1-txt-child2 p-b-4 trans-05">
                        <div class="block1-link stext-101 cl0 trans-09">
                           Shop Now
                        </div>
                     </div>
                  </a>
               </div>
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
               <!-- Block1 -->
               <div class="block1 wrap-pic-w">
                  <img src="frontend/images/banner-03.jpg" alt="IMG-BANNER">

                  <a href="{{url('shop')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                     <div class="block1-txt-child1 flex-col-l">
                        <span class="block1-name ltext-102 trans-04 p-b-8">
                           Accessories
                        </span>

                        <span class="block1-info stext-102 trans-04">
                           New Trend
                        </span>
                     </div>

                     <div class="block1-txt-child2 p-b-4 trans-05">
                        <div class="block1-link stext-101 cl0 trans-09">
                           Shop Now
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>


   <!-- Product -->
   <section class="bg0 p-t-23 p-b-140">
      <div class="container">
         <div class="p-b-10">
            <h3 class="ltext-103 cl5">
               Product Overview
            </h3>
         </div>

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
                  Tìm kiếm
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
                              SẢN PHẨM MỚI NHẤT
                           </a>
                        </li>
                        <li class="p-b-6">
                           <a href="#" class="filter-link stext-106 trans-04">
                              SẢN PHẨM CÓ LƯỢT MUA NHIỀU NHET
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
                           <a href="#" class="filter-link stext-106 trans-04 sort-by-price" data-sort="asc">
                              Giá Thấp - Cao
                           </a>
                        </li>

                        <li class="p-b-6">
                           <a href="#" class="filter-link stext-106 trans-04 sort-by-price" data-sort="desc">
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

      <div class="row isotope-grid">
    @foreach($data as $product)
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
                         <p>Số lượng còn lại: 
                         @if ($product->stock > 0)
                             {{ $product->stock }}
                             @else
                           <span style="color: red;">Hết hàng</span>
                            @endif
                          </p>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">
                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            <img class="icon-heart1 dis-block trans-04" src="frontend/images/icons/icon-heart-01.png" alt="ICON">
                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="frontend/images/icons/icon-heart-02.png" alt="ICON">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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

         <!-- Load more -->
         <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
               Load More
            </a>
         </div>
      </div>
   </section>
<script type="text/javascript">
    $(document).ready(function() {
      $('.sort-by-price').on('click', function(e) {
    e.preventDefault();

    const sortOrder = $(this).data('sort'); // Lấy kiểu sắp xếp (asc hoặc desc)
    
    // Gửi yêu cầu AJAX đến server để lấy danh sách sản phẩm đã sắp xếp
    $.ajax({
        url: '{{ route('products.sort.price') }}',
        method: 'GET',
        data: { order: sortOrder },
        success: function(response) {
            const products = response.data; // Lấy danh sách sản phẩm từ phản hồi
            displayProducts(products); // Hiển thị danh sách sản phẩm
        },
        error: function(xhr) {
            console.error('Lỗi khi sắp xếp sản phẩm theo giá:', xhr);
        }
    });

    // Đổi trạng thái nút sắp xếp
    $(this).addClass('filter-link-active').siblings().removeClass('filter-link-active');
});

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


  

<!-- Tải jQuery -->


@endsection
