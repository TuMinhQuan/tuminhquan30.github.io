<!DOCTYPE html>
<html lang="en">
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <meta charset="utf-8">
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <![endif]-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      {{-- SEO đường dẫn --}}
      <meta name="description" content="{{$meta_desc}}">
      <meta name="author" content="">
      <meta name="keywords" content="{{$meta_keywords}}"/>
      <link rel="canonical" href="">
      <meta name="Robots" content="index, follow">
      {{-- SEO đường dẫn --}}
      <!-- Favicons Icon -->
      <link rel="icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
      <link rel="shortcut icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
      <title>{{$meta_title}}</title>
      <!-- Mobile Specific -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <!-- CSS Style -->
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/font-awesome.css')}}" media="all">
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/animate.css')}}" media="all">
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/revslider.css')}}" >
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/owl.carousel.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/owl.theme.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/jquery.mobile-menu.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/jquery.bxslider.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}" media="all">
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/sweetalert.css')}}">

   {{--  //css hien thi nhieu anh --}}
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/lightgallery.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/lightslider.css')}}">
          <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/prettify.css')}}">

      <!-- Google Fonts -->
      <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700,900' rel='stylesheet' type='text/css'>
      {{-- //fas --}}
      <link href="{{asset('public/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   </head>
   <body class="cms-index-index cms-home-page">
      <div id="page">
      <!-- Header -->
      <header>
         <div class="header-container">
         <div class="header-top">
            <div class="container">
               <div class="row">
                 {{--  <div class="col-sm-2 col-xs-6 col-lg-2 hidden-xs">
                
                  </div>
               --}}


              {{--     <div class="col-sm-3 ">
              
                    <div class="search-box pull-right">
                        <form action="{{URL::to('/tim-kiem')}}" method="POST" id="search_mini_form" name="Categories">
                           @csrf  
                           <input type="text" placeholder="Tìm Kiếm Sản Phẩm..."  name="keywords_submit" width="1000px" maxlength="70"  id="search" autocomplete="off">
             
                           <button type="submit" name="search_items" class="search-btn-bg"><p class="glyphicon glyphicon-search"></p></button>
                        </form>
                     </div>
                </div> --}}

{{-- TÌm kiém --}}
              
                  <div class="col-sm-12">

                          <div class="toplinks">
                        <div class="links">
                   
                                <?php
                                   $customer_id = Session::get('customer_id');
                                   $shipping_id = Session::get('shipping_id');
                                   if($customer_id!=NULL && $shipping_id==NULL){ 
                                 ?>
                                 <div ><a title="Checkout" href="{{URL::to('/checkout')}}"><span class="far fa-money-bill-alt">Thanh Toán</span></a></div>
                                

                                <?php
                                 }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                 ?>
                                  <div ><a title="Checkout" href="{{URL::to('/payment')}}"><span class="far fa-money-bill-alt">Thanh Toán</span></a></div>
                                 <?php 
                                }else{
                                ?>
                                
                                  <div><a title="Checkout" href="{{URL::to('/dang-nhap')}}"><span class="far fa-money-bill-alt">Thanh Toán</span></a></div>

                                <?php
                                 }
                                ?>
                                
                                <div ><a href="{{URL::to('/gio-hang')}}"><span class="fa fa-shopping-cart ">Giỏ hàng</span></a></div>
                                <?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
                                 ?>
                                  <div class="login"><a href="{{URL::to('/logout-checkout')}}"><span class="">Đăng Xuất</span></a></div>  &nbsp; &nbsp;
                                
                                <?php
                            }else{
                                 ?>
                                 
                                   <div ><a href="{{URL::to('/dang-nhap')}}"><span class="fa fa-lock">Đăng Nhập</span></a></div> 
                                 <?php 
                             }
                                 ?>
                               
                            </ul>
                        </div>
                        
            
                  </div>
                     <!-- End Search-col --> 
                  </div>
               </div>
            </div>
         </div>
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-lg-2 col-sm-3 col-xs-12 col-md-2">
                     <!-- Header Logo -->
                      
                     <div class="logo"><a title="Magento Commerce" href="http://localhost:8080/webshop"><img alt="Magento Commerce" src="{{URL::to('public/frontend/images/logo2.png')}}"></a></div>
                    
                     <!-- End Header Logo --> 
                  </div>
                  <!-- Navbar -->
                  <div class="nav-inner">
                     <ul id="nav" class="hidden-xs">
                        <li class="level0 parent drop-menu active"><a href="{{URL::to('/trang-chu')}}"><span>Trang Chủ</span></a>
                        </li>
                        <li class="level0 parent drop-menu">
                           <a href="#"><span>Danh Mục Sản Phẩm</span></a>
                           <ul class="level1">
                              @foreach($category as $key => $cate)
                              <li class="level1 first"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        <li class="mega-menu">
                           <a href="grid.html" class="level-top"><span>Điện Thoại</span></a>
                           <div style="left: 0px; display: none;" class="level0-wrapper dropdown-6col">
                              <div class="container">
                                 <div class="level0-wrapper2">
                                    <div class="col-1">
                                       <div class="nav-block nav-block-center">
                                          <ul class="level0">
                                             <li class="level1 nav-6-1 parent item">
                                                <a href="#"><span>Thương hiệu sản phẩm</span></a>
                                                <ul class="level1">
                                                   @foreach($brand as $key => $brand)
                                                   <li class="level2 nav-6-1-1"><a href="{{URL::to('/thuong-hieu/'.$brand->brand_slug)}}"><span>{{$brand->brand_name}}</span></a></li>
                                                   @endforeach
                                                </ul>
                                             </li>
                                         {{--     <li class="level1 nav-6-1 parent item">
                                                <a href="grid.html"><span>Mức Giá</span></a>
                                                <ul class="level1">
                                                   <li class="level2 nav-6-1-1"><a href="#"><span>Beaded Handbags</span></a></li>
                                                </ul>
                                             </li> --}}
                                             {{--    
                                             <li class="level1 nav-6-1 parent item">
                                                <a href="grid.html" class=""><span>Stylish Bag</span></a>
                                                <ul class="level1">
                                                   <li class="level2 nav-6-1-1"><a href="grid.html" class=""><span>Clutch Handbags</span></a></li>
                                                   <li class="level2 nav-6-1-1"><a href="grid.html" class=""><span>Diaper Bags</span></a></li>
                                                   <li class="level2 nav-6-1-1"><a href="grid.html" class=""><span>Bags</span></a></li>
                                                   <li class="level2 nav-6-1-1"><a href="grid.html" class=""><span>Hobo handbags</span></a></li>
                                                </ul>
                                             </li>
                                             --}}
                                          </ul>
                                       </div>
                                    </div>
                                    <!--nav-block nav-block-center-->
                                    <div class="col-2">
                                       {{-- <div class="menu_image"><a href="#" title=""><img src="{{('public/frontend/images/menu_image.jpg')}}" alt="menu_image"></a></div> --}}
                                       {{--   
                                       <div class="menu_image1"><a href="#" title=""><img src="{{('public/frontend/images/menu_image1.jpg')}}" alt="menu_image"></a></div>
                                       --}}
                                    </div>
                                 </div>
                                 <!--level0-wrapper2--> 
                              </div>
                           </div>
                        </li>
                        <li class="mega-menu">
                           <a href="#" class="level-top"><span>Laptop</span></a>
                           <div  style="left: 0px; display: none;" class="level0-wrapper dropdown-6col">
                              <div class="container">
                                 <div class="level0-wrapper2">
                                    <div class="nav-block nav-block-center">
                                       <ul class="level0">
                                       {{--    <li class="level1 nav-6-1 parent item">
                                             <a href="grid.html" class=""><span>Shoes</span></a>
                                             <ul class="level1">
                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Sport Shoes</span></a></li>
                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Casual Shoes</span></a></li>
                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Leather Shoes</span></a></li>
                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>canvas shoes</span></a></li>
                                             </ul>
                                          </li> --}}
                                         
                                       </ul>
                                    </div>
                             
                                 </div>
                              </div>
                           </div>
                        </li>

                  

                        <li class="nav-custom-link mega-menu">
                           <a class="level-top" href="{{URL::to('/lien-he')}}"><span>Liên Hệ</span></a>
                          {{--  <div class="level0-wrapper custom-menu" style="left: 0px; display: none;">
                              <div class="container">
                                 <div class="header-nav-dropdown-wrapper clearer">
                                 
                                 </div>
                              </div>
                           </div> --}}
                        </li>
                     </ul>
                    
                       
              
                    <div class="search-box pull-right">
                        <form action="{{URL::to('/tim-kiem')}}" method="POST" id="search_mini_form" name="Categories">
                           @csrf  
                           <input type="text" placeholder="Tìm Kiếm Sản Phẩm..."  name="keywords_submit" width="1000px" maxlength="70"  id="search" autocomplete="off">
             
                           <button type="submit" name="search_items" class="search-btn-bg"><p class="glyphicon glyphicon-search"></p></button>
                        </form>
                     </div>
                {{-- </div> --}}
                   {{--         </div>
                     --}}
                      
                  </div>
               </div>
            </div>
      </header>
      <!-- end header -->
      <div class="mm-toggle-wrap">
      <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
      </div>
     
      <section id="slider"><!--slider-->
      <div class="container">
      <div class="row">
      <div class="col-sm-12">
      <div id="slider-carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
      <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
      <li data-target="#slider-carousel" data-slide-to="1"></li>
      <li data-target="#slider-carousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
      @php 
      $i = 0;
      @endphp
      @foreach($slider as $key => $slide)
      @php 
      $i++;
      @endphp
      <div class="item {{$i==1 ? 'active' : '' }}">
      <div class="col-sm-12">
      <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" height="200" width="100%" class="img img-responsive">
      </div>
      </div>
      @endforeach  
      </div>
      <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
      <i class="fa fa-angle-left"></i>
      </a>
      <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
      <i class="fa fa-angle-right"></i>
      </a>
      </div>
      </div>
      </div>
      </div>
      </section><!--/slider-->
      <!-- end banner --> 
      <!-- banner section -->
      {{--   <div class="top-offer-banner wow bounceInUp animated">
      <div class="container">
      <div class="row">
      <div class="offer-inner col-lg-12"> 
      <!--newsletter-wrap-->
      <div class="left">
      <div class="col-1"><a href="#"><img src="{{('public/frontend/images/offer-banner1.jpg')}}" alt="offer banner1"></a></div>
      <div class="col mid">
      <div class="inner-text">
      <h3>Watches</h3>
      </div>
      <a href="#"><img src="{{('public/frontend/images/offer-banner2.jpg')}}" alt="offer banner2"></a></div>
      <div class="col last">
      <div class="inner-text">
      <h3>Shoes</h3>
      </div>
      <a href="#"><img src="{{('public/frontend/images/offer-banner3.jpg')}}" alt="offer banner2"></a></div>
      </div>
      <div class="right">
      <div class="col">
      <div class="inner-text">
      <h4>Top COLLECTION</h4>
      <h3>Sunglasses</h3>
      <a href="#" class="shop-now1">Shop now</a> </div>
      <a href="#" title=""><img src="{{('public/frontend/images/offer-banner4.jpg')}}" alt=""></a> </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      --}}
      <!-- End banner section --> 
      <!-- main container -->
      <div class="main-col">
      <div class="container">
      <div class="row"> 
      <!-- Featured Slider -->
      <!-- End Featured Slider --> 
      </div>
      </div>
      @yield('content')
      </div>
      <!-- end main container --> 
      <!-- Featured Slider -->
      <!-- End Featured Slider --> 

      <!--Offer Start-->
   {{--    <div class="offer-slider wow animated parallax parallax-2">
      <div class="container">
      <ul class="bxslider">
      <li>
      <h2>NEW ARRIVALS</h2>
      <h1>Sale up to 30% off</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Integer sed arcu massa. </p>
      <a class="shop-now" href="#">Shop now</a> </li>
      <li>
      <h2>Hello hotness!</h2>
      <h1>Summer collection</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Integer sed arcu massa. </p>
      <a class="shop-now" href="#">View More</a> </li>
      <li>
      <h2>New launch</h2>
      <h1>Designer dresses on sale</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Integer sed arcu massa. </p>
      <a class="shop-now" href="#">Learn More</a> </li>
      </ul>
      </div>
      </div> --}}

      <!--Offer silder End--> 
      <!-- Latest Blog -->
     {{--  <section class="latest-blog wow bounceInUp animated">
      <div class="container">
      <div class="row">
      <div class="new_title center">
      <h2>Latest Blog</h2>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-3">
      <div class="blog_inner">
      <div class="blog-img"> <img src="{{('public/frontend/images/blog-img1.jpg')}}" alt="Blog image">
      <div class="mask"> <a class="info" href="blog_detail.html">Read More</a> </div>
      </div>
      <h3><a href="blog_detail.html">Pellentesque habitant morbi</a> </h3>
      <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sit  ... </p>
      </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-3">
      <div class="blog_inner">
      <div class="blog-img"> <img src="{{('public/frontend/images/blog-img2.jpg')}}" alt="Blog image">
      <div class="mask"> <a class="info" href="blog_detail.html">Read More</a> </div>
      </div>
      <h3><a href="blog_detail.html">Pellentesque habitant morbi</a> </h3>
      <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sit  ... </p>
      </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-3">
      <div class="blog_inner">
      <div class="blog-img"> <img src="{{('public/frontend/images/blog-img3.jpg')}}" alt="Blog image">
      <div class="mask"> <a class="info" href="blog_detail.html">Read More</a> </div>
      </div>
      <h3><a href="blog_detail.html">Pellentesque habitant morbi</a> </h3>
      <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sit  ... </p>
      </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-3">
      <div class="blog_inner">
      <div class="blog-img"> <img src="{{('public/frontend/images/blog-img4.jpg')}}" alt="Blog image">
      <div class="mask"> <a class="info" href="blog_detail.html">Read More</a> </div>
      </div>
      <h3><a href="blog_detail.html">Pellentesque habitant morbi</a> </h3>
      <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sit  ... </p>
      </div>
      </div>
      </div>
      </div>
      </section> --}}
      <!-- End Latest Blog --> 
      <!-- offer banner section -->
  {{--     <div class="offer-banner-section wow bounceInUp animated">
      <div class="container">
      <div class="row">
      <div class="col-lg-3 col-sm-3 col-xs-6">
      <div class="col"><img src="{{('public/frontend/images/promo-banner-img1.png')}}" alt="offer banner1"></div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
      <div class="col"><img src="{{('public/frontend/images/promo-banner-img2.png')}}" alt="offer banner2"></div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
      <div class="col"><img src="{{('public/frontend/images/promo-banner-img3.png')}}" alt="offer banner3"></div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
      <div class="col last"><img src="{{('public/frontend/images/promo-banner-img4.png')}}" alt="offer banner4"></div>
      </div>
      </div>
      </div>
      </div> --}}
      <!-- end banner section -->
      {{-- <div class="brand-logo">
      <div class="container">
      <div class="slider-items-products">
      <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
      <div class="slider-items slider-width-col6"> 
      <!-- Item -->
      <div class="item"><a href="#"><img src="{{('public/frontend/images/b-logo1.png')}}" alt="Image"></a> </div>
      <!-- End Item --> 
      <!-- Item -->
      <div class="item"><a href="#"><img src="{{('public/frontend/images/b-logo2.png')}}" alt="Image"></a> </div>
      <!-- End Item --> 
      <!-- Item -->
      <div class="item"><a href="#"><img src="{{('public/frontend/images/b-logo3.png')}}" alt="Image"></a> </div>
      <!-- End Item --> 
      <!-- Item -->
      <div class="item"><a href="#"><img src="{{('public/frontend/images/b-logo4.png')}}" alt="Image"></a> </div>
      <!-- End Item --> 
      <!-- Item -->
      <div class="item"><a href="#"><img src="{{('public/frontend/images/b-logo5.png')}}" alt="Image"></a> </div>
      <!-- End Item --> 
      <!-- Item -->
      <div class="item"><a href="#"><img src="{{('public/frontend/images/b-logo6.png')}}" alt="Image"></a> </div>
      <!-- End Item --> 
      <!-- Item -->
      <div class="item"><a href="#"><img src="{{('public/frontend/images/b-logo1.png')}}" alt="Image"></a> </div>
      <!-- End Item --> 
      <!-- Item -->
      <div class="item"><a href="#"><img src="{{('public/frontend/images/b-logo4.png')}}" alt="Image"></a> </div>
      <!-- End Item --> 
      </div>
      </div>
      </div>
      </div>
      </div> --}}
      {{-- free shipping --}}
      <!-- Start Shop Services Area -->
      <!-- End Shop Services Area -->

      <!-- Footer -->
      <footer>

      <section class="footer-navbar">
      <div class="footer-inner">
      <div class="container">
      <div class="row">
      <div class="col-sm-12 col-xs-12 col-lg-8">
      <div class="footer-column pull-left collapsed-block">
      <h4>Giới Thiệu<a class="expander visible-xs" href="#TabBlock-1">+</a></h4>
      <div class="tabBlock" id="TabBlock-1">
      <ul class="links">
      <li class="first"><a href="#" title="How to buy">Giới thiệu về công ty</a></li>
      <li><a href="faq.html" title="FAQs">Liên hệ</a></li>
      <li><a href="#" title="Payment">Giải đáp mua hàng online</a></li>
      <li><a href="#" title="Shipment&lt;/a&gt;">Tuyển dụng</a></li>
      {{--    <li><a href="#" title="Where is my order?">Where is my order?</a></li>
      <li class="last"><a href="#" title="Return policy">Return policy</a></li> --}}
      </ul>
      </div>
      </div>
      <div class="footer-column pull-left collapsed-block">
      <h4>Quy Định - Chính Sách<a class="expander visible-xs" href="#TabBlock-2">+</a></h4>
      <div class="tabBlock" id="TabBlock-2">
      <ul class="links">
      <li class="first"><a title="Your Account" href="login.html">Chính sách đổi trả</a></li>
      <li><a title="Information" href="#">Chính sách bảo hành</a></li>
      <li><a title="Addresses" href="#">Chính sách vận chuyển</a></li>
      <li><a title="Addresses" href="#">Phương thức thanh toán</a></li>
      {{--    <li><a title="Orders History" href="#">Orders History</a></li>
      <li class="last"><a title=" Additional Information" href="#">Additional Information</a></li> --}}
      </ul>
      </div>
      </div>
      <div class="footer-column pull-left collapsed-block">
      <h4>Smart Mobile <a class="expander visible-xs" href="#TabBlock-3">+</a></h4>
      <div class="tabBlock" id="TabBlock-3">
      <ul class="links">
      <li class="first"><a href="#" title="privacy policy">Điện thoại bán hàng: </a></li>
      <li><a href="#" title="Search Terms">Hotline hỗ trợ kỹ thuật</a></li>
      <li><a href="#" title="Advanced Search">Hướng dẫn mua hàng online</a></li>
      <li><a href="contact_us.html" title="Contact Us">SiteMap</a></li>
      {{--   <li><a href="#" title="Suppliers">Suppliers</a></li>
      <li class=" last"><a href="#" title="Our stores" class="link-rss">Our stores</a></li> --}}
      </ul>
      </div>
      </div>
      </div>
      <div class="col-xs-12 col-lg-4">
      <div class="footer-column-last">
      <div class="newsletter-wrap collapsed-block">
      <h4>Đăng Ký Nhận Tin<a class="expander visible-xs" href="#TabBlock-4">+</a></h4>
      <div class="tabBlock" id="TabBlock-4">
      <form id="newsletter-validate-detail" method="post" action="#">
      <div id="container_form_news">
      <div id="container_form_news2">
      <input type="text" class="input-text required-entry validate-email" value="Enter your email address" onfocus=" this.value='' " title="Sign up for our newsletter" id="newsletter" name="email">
      <button class="button subscribe" title="Subscribe" type="submit"><span>Subscribe</span></button>
      </div>
      </div>
      </form>
      </div>
      </div>
      <div class="social">
      <h4>Follow Us</h4>
      <ul class="link">
      <li class="fb pull-left"><a href="#"></a></li>
      <li class="tw pull-left"><a href="#"></a></li>
      <li class="googleplus pull-left"><a href="#"></a></li>
      <li class="rss pull-left"><a href="#"></a></li>
      <li class="pintrest pull-left"><a href="#"></a></li>
      <li class="linkedin pull-left"><a href="#"></a></li>
      <li class="youtube pull-left"><a href="#"></a></li>
      </ul>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="footer-middle">
      <div class="container">
      <div class="row">
      {{--     <div style="text-align:center"><a href="{{URL::to('/trang-chu')}}"><img alt="footerlogo" src="{{('public/frontend/images/footer-logo.png')}}"></a></div> --}}
      <address>
      <i class="icon-location-arrow"></i> Phan Đình Phùng <i class="icon-mobile-phone"></i><span> 0867 927 950</span> <i class="icon-envelope"></i><span> tuminhquan30@gmail.com</span>
      </address>
      </div>
      </div>
      </div>
  {{--     <div class="footer-bottom">
      <div class="container">
      <div class="row">
      <div class="col-sm-5 col-xs-12 coppyright">&copy; 2020 Magikcommerce. All Rights Reserved.</div>
      <div class="col-sm-7 col-xs-12 company-links">
      <ul class="links">
      <li><a title="Magento Themes" href="#">Magento Themes</a></li>
      <li><a title="Premium Themes" href="#">Premium Themes</a></li>
      <li><a title="Responsive Themes" href="#">Responsive Themes</a></li>
      <li class="last"><a title="Magento Extensions" href="#">Magento Extensions</a></li>
      </ul>
      </div>
      </div>
      </div>
      </div> --}}
      </section>
      </footer>

      </div>
         <div id="mobile-menu">
         <div class="mm-search">
            <form name="search">
               <div class="input-group">
                  <div class="input-group-btn">
                     <button class="btn btn-default" type="submit"><i class="icon-search"></i></button>
                  </div>
                  <input type="text" class="form-control simple" placeholder="Search ..." name="search" value="Search" maxlength="70" id="search">
                  
               </div>
            </form>
         </div>
         <ul>
            <li> </li>
            <li>
               <div class="home"><a href="{{URL::to('/trang-chu')}}"><i class="icon-home"></i>Trang Chủ</a> </div>
            </li>
            <li>
               <a href="#">Danh Mục Sản Phẩm</a>
               <ul>
                  @foreach($category as $key => $cate)

                    
                  <li class="level1 first"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a></li>
                  @endforeach
                  </li>
               </ul>
            </li>

        {{--         
            <li>
               <a href="grid.html">Sản phẩm</a>
               <ul>
                  <li>
                     <a href="grid.html" class="">Stylish Bag</a>
                     <ul>
                        <li> <a href="grid.html" class="">Clutch Handbags</a></li>
                        <li> <a href="grid.html" class="">Diaper Bags</a></li>
                        <li> <a href="grid.html" class="">Bags</a></li>
                        <li> <a href="grid.html" class="">Hobo handbags</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html">Material Bag</a>
                     <ul>
                        <li> <a href="grid.html">Beaded Handbags</a></li>
                        <li> <a href="grid.html">Fabric Handbags</a></li>
                        <li> <a href="grid.html">Handbags</a></li>
                        <li> <a href="grid.html">Leather Handbags</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html">Shoes</a>
                     <ul>
                        <li> <a href="grid.html">Flat Shoes</a></li>
                        <li> <a href="grid.html">Flat Sandals</a></li>
                        <li> <a href="grid.html">Boots</a></li>
                        <li> <a href="grid.html">Heels</a></li>
                     </ul>
                  </li>
               </ul>
            </li>
            --}}
            {{--     
            <li>
               <a href="grid.html">Men</a>
               <ul>
                  <li>
                     <a href="grid.html" class="">Shoes</a>
                     <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="grid.html">Sport Shoes</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Casual Shoes</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Leather Shoes</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">canvas shoes</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html">Dresses</a>
                     <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="grid.html">Casual Dresses</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Evening</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Designer</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Party</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html">Jackets</a>
                     <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="grid.html">Coats</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Formal Jackets</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Leather Jackets</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Blazers</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html">Watches</a>
                     <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="grid.html">Fasttrack</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Casio</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Titan</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Tommy-Hilfiger</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html">Sunglasses</a>
                     <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="grid.html">Ray Ban</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Fasttrack</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Police</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Oakley</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html">Accesories</a>
                     <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="grid.html">Backpacks</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Wallets</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Laptops Bags</a></li>
                        <li class="level2 nav-6-1-1"><a href="grid.html">Belts</a></li>
                     </ul>
                  </li>
               </ul>
            </li>
            --}}
            {{--   
            <li>
               <a href="grid.html">Electronics</a>
               <ul>
                  <li>
                     <a href="grid.html"><span>Mobiles</span></a>
                     <ul>
                        <li> <a href="grid.html"><span>Samsung</span></a></li>
                        <li> <a href="grid.html"><span>Nokia</span></a></li>
                        <li> <a href="grid.html"><span>IPhone</span></a></li>
                        <li> <a href="grid.html"><span>Sony</span></a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html" class=""><span>Accesories</span></a>
                     <ul>
                        <li> <a href="grid.html"><span>Mobile Memory Cards</span></a></li>
                        <li> <a href="grid.html"><span>Cases &amp; Covers</span></a></li>
                        <li> <a href="grid.html"><span>Mobile Headphones</span></a></li>
                        <li> <a href="grid.html"><span>Bluetooth Headsets</span></a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html"><span>Cameras</span></a>
                     <ul>
                        <li> <a href="grid.html"><span>Camcorders</span></a></li>
                        <li> <a href="grid.html"><span>Point &amp; Shoot</span></a></li>
                        <li> <a href="grid.html"><span>Digital SLR</span></a></li>
                        <li> <a href="grid.html"><span>Camera Accesories</span></a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html"><span>Audio &amp; Video</span></a>
                     <ul>
                        <li> <a href="grid.html"><span>MP3 Players</span></a></li>
                        <li> <a href="grid.html"><span>IPods</span></a></li>
                        <li> <a href="grid.html"><span>Speakers</span></a></li>
                        <li> <a href="grid.html"><span>Video Players</span></a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html"><span>Computer</span></a>
                     <ul>
                        <li> <a href="grid.html"><span>External Hard Disk</span></a></li>
                        <li> <a href="grid.html"><span>Pendrives</span></a></li>
                        <li> <a href="grid.html"><span>Headphones</span></a></li>
                        <li> <a href="grid.html"><span>PC Components</span></a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html"><span>Appliances</span></a>
                     <ul>
                        <li> <a href="grid.html"><span>Vaccum Cleaners</span></a></li>
                        <li> <a href="grid.html"><span>Indoor Lighting</span></a></li>
                        <li> <a href="grid.html"><span>Kitchen Tools</span></a></li>
                        <li> <a href="grid.html"><span>Water Purifier</span></a></li>
                     </ul>
                  </li>
               </ul>
            </li>
            --}}
            <li>
               <a href="#">Tin Tức</a>
               {{--       
               <ul>
                  <li>
                     <a href="grid.html">Living Room</a>
                     <ul>
                        <li> <a href="grid.html">Racks &amp; Cabinets</a></li>
                        <li> <a href="grid.html">Sofas</a></li>
                        <li> <a href="grid.html">Chairs</a></li>
                        <li> <a href="grid.html">Tables</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html" class="">Dining &amp; Bar</a>
                     <ul>
                        <li> <a href="grid.html">Dining Table Sets</a></li>
                        <li> <a href="grid.html">Serving Trolleys</a></li>
                        <li> <a href="grid.html">Bar Counters</a></li>
                        <li> <a href="grid.html">Dining Cabinets</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html">Bedroom</a>
                     <ul>
                        <li> <a href="grid.html">Beds</a></li>
                        <li> <a href="grid.html">Chest of Drawers</a></li>
                        <li> <a href="grid.html">Wardrobes &amp; Almirahs</a></li>
                        <li> <a href="grid.html">Nightstands</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="grid.html">Kitchen</a>
                     <ul>
                        <li> <a href="grid.html">Kitchen Racks</a></li>
                        <li> <a href="grid.html">Kitchen Fillings</a></li>
                        <li> <a href="grid.html">Wall Units</a></li>
                        <li> <a href="grid.html">Benches &amp; Stools</a></li>
                     </ul>
                  </li>
               </ul>
               --}}
            </li>
            <li><a href="{{URL::to('/gio-hang')}}">Giỏ hàng</a></li>
            <li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>
         </ul>
      </div>
      <!-- End Footer --> 
      <!-- JavaScript --> 
      <script type="text/javascript" src="{{asset('public/frontend/js/jquery.min.js')}}"></script> 
      <script type="text/javascript" src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script> 
      <script type="text/javascript" src="{{asset('public/frontend/js/parallax.js')}}"></script> 
      <script type="text/javascript" src="{{asset('public/frontend/js/revslider.js')}}"></script> 
      <script type="text/javascript" src="{{asset('public/frontend/js/common.js')}}"></script> 
      <script type="text/javascript" src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script> 
      <script type="text/javascript" src="{{asset('public/frontend/js/jquery.mobile-menu.min.js')}}"></script> 
      <script type="text/javascript" src="{{asset('public/frontend/js/jquery.bxslider.min.js')}}"></script> 
{{--       <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
      <script type="text/javascript" src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script> 

    {{--   // Galery hien thi nhieu anh js --}}
          <script type="text/javascript" src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script> 
             <script type="text/javascript" src="{{asset('public/frontend/js/lightslider.js')}}"></script> 
                <script type="text/javascript" src="{{asset('public/frontend/js/prettify.js')}}"></script> 


             <script type="text/javascript">
                 $(document).ready(function() {
                $('#imageGallery').lightSlider({
                    gallery:true, // code chạy nhiều hình ảnh
                    item:1, // khi click vào chạy 1 item
                    loop:true, // vòng lặp khi click vào lặp đi lặp lại nhiều
                    thumbItem:3,// hiển thị 3 ảnh vòng lặp
                    slideMargin:0,
                    enableDrag: false,
                    currentPagerPosition:'left',
                    onSliderLoad: function(el) {
                        el.lightGallery({
                            selector: '#imageGallery .lslide'
                        });
                    }   
                });  
              });
             </script>   
     {{--  // Search autocomplete gợi ý sản phẩm --}}

 {{--     <script type="text/javascript">
       $('#keywords').keyup(function(){
         var query = $(this).val();

         if(query != '')
         {
          var _token = $('input[name="_token"]').val();

          $.ajax({
              url : '{{url('/autocomplete-ajax')}}',
                 method: 'POST',
                 data:{query:query,_token:_token},
                 success:function(data){
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                  }
          });
         }else{
          $('#search_ajax').fadeOut();
         }

       });
       $(document).on('click','li',function(){
         $('#keywords').val($(this).text());
          $('#search_ajax').fadeOut();
       });
     </script>
 --}}
  
  {{-- Sắp xếp theo tên  --}}
  <script type="text/javascript">
 $(document).ready(function() {
                $('#sort').on('change',function(){
                     var url = $(this).val();
                    
                     if(url) {
                      window.location = url;
                     }
                     return false;
                       
                });  
              });
  </script>
         


      {{-- // Xác nhận đơn hàng --}}
      <script type="text/javascript">
         $(document).ready(function(){
           $('.send_order').click(function(){
               swal({
                 title: "Xác nhận đơn hàng",
                 text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                 type: "info",
                 showCancelButton: true,
                 confirmButtonClass: "btn-info",
                 confirmButtonText: "Cảm ơn, Mua hàng",
         
                   cancelButtonText: "Đóng,chưa mua",
                   closeOnConfirm: false,
                   closeOnCancel: false
               },
               function(isConfirm){
                    if (isConfirm) {
                       var shipping_email = $('.shipping_email').val();
                       var shipping_name = $('.shipping_name').val();
                       var shipping_address = $('.shipping_address').val();
                       var shipping_phone = $('.shipping_phone').val();
                       var shipping_notes = $('.shipping_notes').val();
                       var shipping_method = $('.payment_select').val();
                       // var order_fee = $('.order_fee').val();
                       var order_coupon = $('.order_coupon').val();
                       var _token = $('input[name="_token"]').val();
         
                       $.ajax({
                           url: '{{url('/confirm-order')}}',
                           method: 'POST',
                           data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_coupon:order_coupon,shipping_method:shipping_method},
                           success:function(){
                              swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                           }
                       });
         
                       window.setTimeout(function(){ 
                           location.reload();
                       } ,3000);
         
                     } else {
                       swal("Đóng", "Đơn hàng chưa được gửi, vui lòng hoàn tất đơn hàng", "error");
         
                     }
             
               });
         
              
           });
         });
         
         
      </script>
      
   {{--     Thêm giỏ hàng --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){

                var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                // chuyển sang Int mới so sánh đc. Vì var trong jquery là string
                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Số lượng giỏ hàng không đủ. Vui lòng đặt nhỏ hơn ' + cart_product_quantity);
                }else{

                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(){

                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/gio-hang')}}";
                                });

                        }

                    });
                }

                
            });
        });

        jQuery('#rev_slider_4').show().revolution({
         dottedOverlay: 'none',
         delay: 5000,
         startwidth: 1920,
         startheight: 650,
         
         hideThumbs: 200,
         thumbWidth: 200,
         thumbHeight: 50,
         thumbAmount: 2,
         
         navigationType: 'thumb',
         navigationArrows: 'solo',
         navigationStyle: 'round',
         
         touchenabled: 'on',
         onHoverStop: 'on',
         
         swipe_velocity: 0.7,
         swipe_min_touches: 1,
         swipe_max_touches: 1,
         drag_block_vertical: false,
         
         spinner: 'spinner0',
         keyboardNavigation: 'off',
         
         navigationHAlign: 'center',
         navigationVAlign: 'bottom',
         navigationHOffset: 0,
         navigationVOffset: 20,
         
         soloArrowLeftHalign: 'left',
         soloArrowLeftValign: 'center',
         soloArrowLeftHOffset: 20,
         soloArrowLeftVOffset: 0,
         
         soloArrowRightHalign: 'right',
         soloArrowRightValign: 'center',
         soloArrowRightHOffset: 20,
         soloArrowRightVOffset: 0,
         
         shadow: 0,
         fullWidth: 'on',
         fullScreen: 'off',
         
         stopLoop: 'off',
         stopAfterLoops: -1,
         stopAtSlide: -1,
         
         shuffle: 'off',
         
         autoHeight: 'off',
         forceFullWidth: 'on',
         fullScreenAlignForce: 'off',
         minFullScreenHeight: 0,
         hideNavDelayOnMobile: 1500,
         
         hideThumbsOnMobile: 'off',
         hideBulletsOnMobile: 'off',
         hideArrowsOnMobile: 'off',
         hideThumbsUnderResolution: 0,
         
         hideSliderAtLimit: 0,
         hideCaptionAtLimit: 0,
         hideAllCaptionAtLilmit: 0,
         startWithSlide: 0,
         fullScreenOffsetContainer: ''
         });
        
         
    </script>
   </body>
</html>