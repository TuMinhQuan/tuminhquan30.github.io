@extends('layout')
@section('content')
  <head>
 
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <!-- Custom fonts for this template-->
  <link href="{{asset('public/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">



  
</head>


 <div class="best-pro container wow bounceInUp animated">
        <div class="slider-items-products">
          <div class="new_title center">
            <h2>Sản Phẩm Mới</h2>
          </div>
          
            <div id="best-seller-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
                 @foreach($all_product as $key => $product)
                     <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_slug)}}">
        <form>
        @csrf
                 <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                 <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                 <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                 <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

              <div class="item">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"> 
                     <img alt="Sample Product" src="{{URL::to('public/uploads/product/'.$product->product_image)}}"> 
                      <div class="sale-label sale-top-left">sale</div>
                      <div class="item-box-hover">
                    


                      </div>
                    </div>

                  </div>
                  

                  <div class="item-info">
                    <div class="info-inner">
              
                      <div class="item-content">
                        <div class="rating">
                          <div class="ratings">
                            <div class="rating-box">
                              <div style="width:80%" class="rating"></div>
                            </div>
                            <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                          </div>
                        </div>
                        <div class="item-price">
                          <div class="price-box"> <span class="regular-price"> <span class="price">{{number_format($product->product_price).' '.'VNĐ'}}</span> </span> </div>
                        </div>
                          <p>{{$product->product_name}}</p>
                           </a>
                      <button type="button"  class="btn btn-fefault cart fa fa-shopping-cart add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
                  </form>
                  
                      </div>
                   {{--     <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fas fa-heart"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div> --}}
                    </div>
                  </div>

                </div>
              </div>
       
              @endforeach
             
            </div>
          </div>
        </div>

      </div>
            {{-- // danh mục iphone --}}
 <div class="best-pro container wow bounceInUp animated">
        <div class="slider-items-products">
          <div class="new_title center">
            <h2>Danh mục iphone</h2>
          </div>
          
            <div id="best-seller-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
                 @foreach($phone_ten as $key => $phone)
                     <a href="{{URL::to('/chi-tiet-san-pham/'.$phone->product_slug)}}">
        <form>
        @csrf
                 <input type="hidden" value="{{$phone->product_id}}" class="cart_product_id_{{$phone->product_id}}">
                <input type="hidden" value="{{$phone->product_name}}" class="cart_product_name_{{$phone->product_id}}">
                  <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                 <input type="hidden" value="{{$phone->product_image}}" class="cart_product_image_{{$phone->product_id}}">
                 <input type="hidden" value="{{$phone->product_price}}" class="cart_product_price_{{$phone->product_id}}">
                 <input type="hidden" value="1" class="cart_product_qty_{{$phone->product_id}}">

              <div class="item">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"> 
                     <img alt="Sample Product" src="{{URL::to('public/uploads/product/'.$phone->product_image)}}"> 
                      <div class="sale-label sale-top-left">sale</div>
                      <div class="item-box-hover">
                    


                      </div>
                    </div>

                  </div>
                  

                  <div class="item-info">
                    <div class="info-inner">
              
                      <div class="item-content">
                        <div class="rating">
                          <div class="ratings">
                            <div class="rating-box">
                              <div style="width:80%" class="rating"></div>
                            </div>
                            <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                          </div>
                        </div>
                        <div class="item-price">
                          <div class="price-box"> <span class="regular-price"> <span class="price">{{number_format($phone->product_price).' '.'VNĐ'}}</span> </span> </div>
                        </div>
                          <p>{{$phone->product_name}}</p>
                           </a>
                      <button type="button"  class="btn btn-fefault cart fa fa-shopping-cart add-to-cart" data-id_product="{{$phone->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
                  </form>
                      </div>
                     {{--   <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fas fa-heart"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div> --}}
                    </div>
                  </div>

                </div>
              </div>
       
              @endforeach
             
            </div>
          </div>
        </div>

      </div>
       
 {{-- // danh mục iphonxiaomi --}}
 <div class="best-pro container wow bounceInUp animated">
        <div class="slider-items-products">
          <div class="new_title center">
            <h2>Danh mục Xiaomi</h2>
          </div>
          
            <div id="best-seller-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
                 @foreach($xiaomi_dienthoai as $key => $dienthoai)
                     <a href="{{URL::to('/chi-tiet-san-pham/'.$dienthoai->product_slug)}}">
        <form>
        @csrf
                 <input type="hidden" value="{{$dienthoai->product_id}}" class="cart_product_id_{{$dienthoai->product_id}}">
                <input type="hidden" value="{{$dienthoai->product_name}}" class="cart_product_name_{{$dienthoai->product_id}}">
                  <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                 <input type="hidden" value="{{$dienthoai->product_image}}" class="cart_product_image_{{$dienthoai->product_id}}">
                 <input type="hidden" value="{{$dienthoai->product_price}}" class="cart_product_price_{{$dienthoai->product_id}}">
                 <input type="hidden" value="1" class="cart_product_qty_{{$dienthoai->product_id}}">

              <div class="item">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"> 
                     <img alt="Sample Product" src="{{URL::to('public/uploads/product/'.$dienthoai->product_image)}}"> 
                      <div class="sale-label sale-top-left">sale</div>
                      <div class="item-box-hover">
                    


                      </div>
                    </div>

                  </div>
                  

                  <div class="item-info">
                    <div class="info-inner">
              
                      <div class="item-content">
                        <div class="rating">
                          <div class="ratings">
                            <div class="rating-box">
                              <div style="width:80%" class="rating"></div>
                            </div>
                            <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                          </div>
                        </div>
                        <div class="item-price">
                          <div class="price-box"> <span class="regular-price"> <span class="price">{{number_format($dienthoai->product_price).' '.'VNĐ'}}</span> </span> </div>
                        </div>
                          <p>{{$dienthoai->product_name}}</p>
                           </a>
                      <button type="button"  class="btn btn-fefault cart fa fa-shopping-cart add-to-cart" data-id_product="{{$dienthoai->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
                  </form>
                      </div>
                    
                    </div>
                  </div>

                </div>
              </div>
       
              @endforeach
             
            </div>
          </div>
        </div>

      </div>


@endsection
