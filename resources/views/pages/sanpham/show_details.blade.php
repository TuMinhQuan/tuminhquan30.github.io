@extends('layout')
@section('content')
  <!-- Main Container -->
  <head>
 
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <!-- Custom fonts for this template-->
<!--   <link href="{{asset('public/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> -->


  
</head>
  <!-- Breadcrumbs -->
  <div class="breadcrumbs bounceInUp animated">
    <div class="container">
      <div class="row">
        <div class="col-xs-12" style="background:none">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="{{URL('/')}}">Trang chủ</a><span>» </span></li>
            <li class=""> <a title="Go to Home Page" href="{{URL('/danh-muc-san-pham/'.$cate_slug)}}">  {{$product_cate}}</a><span>» </span></li>
            <li class="category13"><strong>{{$meta_title}}</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  @foreach($product_details as $key => $value)
  <div class="main-container col1-layout">

    <div class="main container">
      <div class="col-main">
        <div class="row">
          <div class="product-view">
            <div class="product-essential">
        
                <div class="product-img-box col-sm-4 col-xs-12 bounceInRight animated">
                  <div class="new-label new-top-left"> New </div>
                  <div class="product-image">
                  {{--   <style type="text/css">
                      .li.active{
                        border:2px solid red;
                    }
                    </style> --}}
              {{--       <div class="large-image"> <a href="products-images/product4.jpg" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img alt="Thumbnail" src="{{URL::to('/public/uploads/product/'.$value->product_image)}}"> </a> </div>
               --}}
               <ul id="imageGallery">
                {{--  thumb là ở dưới ảnh nhỏ, data-src là khi click anh , img hiển thị  --}}
                @foreach ($gallery as $key => $gal)
                  <li data-thumb="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" data-src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}">
                    <img width="100%" alt="{{$gal->gallery_image}}" src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" />
                  </li>
                  @endforeach
                 
                    
                </ul>
                  </div>
                  <!-- end: more-images --> 
                </div>
                <div class="product-shop col-sm-5 col-xs-12 bounceInUp animated">
                 
                  <div class="product-name">
                    
                  <h2>{{$value->product_name}}</h2>
                <p>Mã Sản Phẩm: {{$value->product_id}}</p>
                  </div>
                  <div class=""> 
           
                  </div>

                  <div class="price-block">
                    <div class="price-box">
                 
                   <p style="font-size: 20px;color: red;">{{number_format($value->product_price).'VNĐ'}}</p>
                    </div>
                  </div>
                  <div class="add-to-box">
                    <div class="add-to-cart">
                    

                      <div class="product-information">
                                         
                           <span>
                              <label for="qty">Số Lượng</label>
                         <input  name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
                       <input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
                        </span>
                        <!-- </div> -->
                      </div>
                 
                  <form action="{{URL::to('/save-cart')}}" method="POST">
                  @csrf
                  <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">

               <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

                <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">

           <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">

                <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
          
                  <input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
    
                      <ul class="add-to-links">

                        <br><br>
                  <p><b>Tình trạng:</b> Còn hàng</p>
                <p><b>Điều kiện:</b> Mơi 100%</p>
                  <p><b>Số lượng kho còn:</b> {{$value->product_quantity}}</p>
                <p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
                <p><b>Danh mục:</b> {{$value->category_name}}</p>                      </ul>
                       <!-- <input type="button" value="Thêm giỏ hàng" class="btn btn-fefault cart fa fa-shopping-cart add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart"> -->
                      <button type="button"  class="button btn-cart  add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
                      </form> <br> <br>
                    </div>
                   
                  </div>
                </div>
                <aside class="col-lg-3 col-sm-3 col-xs-12 bounceInLeft animated"> 
            
                  
               
                </aside>
              
            </div>
            <div class="product-collateral col-sm-12 col-xs-12 bounceInUp animated">
              <div class="add_info">
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                  <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Mô Tả Sản Phẩm </a> </li>
                {{--   <li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li> --}}
               
                  <li> <a href="#product_tabs_custom" data-toggle="tab">Chi Tiết</a> </li>
                    {{--  <li> <a href="#reviews_tabs" data-toggle="tab">Đánh Giá</a> </li> --}}
         {{--          <li> <a href="#product_tabs_custom1" data-toggle="tab">Custom Tab1</a> </li> --}}
                </ul>
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std">
                     <p>{!!$value->product_desc!!}</p>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="product_tabs_tags">
                    <div class="box-collateral box-tags">
                      <div class="tags">
                        <form id="addTagForm" action="#" method="get">
                          <div class="form-add-tags">
                            <label for="productTagName">Add Tags:</label>
                            <div class="input-box">
                              <input class="input-text" name="productTagName" id="productTagName" type="text">
                              <button type="button" title="Add Tags" class=" button btn-add" onClick="submitTagForm()"> <span>Add Tags</span> </button>
                            </div>
                            <!--input-box--> 
                          </div>
                        </form>
                      </div>
                      <!--tags-->
                      <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="reviews_tabs">
                    <div class="box-collateral box-reviews" id="customer-reviews">
                      <div class="box-reviews1">
                     
                      </div>
                    
                      <div class="clear"></div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="product_tabs_custom">
                    <div class="product-tabs-content-inner clearfix">
                     <p>{!!$value->product_content!!}</p>
                    </div>
                  </div>
             
                </div>
              </div>
            </div>
            
 @endforeach
   
            <div class="related-slider col-lg-12 col-xs-12 bounceInDown animated">
              <div class="slider-items-products">
                <div class="slider-items-products">
                 
                  <div class="new_title center">
                    <h2>Sản phẩm liên quan</h2>
                  </div>
                  <div id="related-products-slider" class="product-flexslider hidden-buttons">

                    <div class="slider-items slider-width-col4 products-grid">
                      
            @foreach($relate as $key => $lienquan)
                      <div class="item">
                        
                        <div class="item-inner">
                        
                          <div class="item-img">
                            <div class="item-img-info"> <p  title="Sample Product" href="product_detail.html"> <img alt="Sample Product" src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}"> </p>
                              <div class="sale-label sale-top-left">sale</div>
                       

                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Sample Product" > <p>{{$lienquan->product_name}}</p> </a> 
                                 <div class="price-box"> <span class="regular-price">  <h2>{{number_format($lienquan->product_price).' '.'VNĐ'}}</h2> </span> </div>

                                 
                              </div>
                                
                              <div class="item-content">
                             
                                <div class="item-price">
                              

                                </div>
                              </div>
                            </div>
                          </div>
                
                       </div>
                      </div>
                      
 @endforeach
                    </div>


               
                  </div>




  

  <!-- Footer -->
  @endsection