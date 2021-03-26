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

            <div class="toolbar">
             
              <div id="sort-by">
              {{--   <label class="left">Sắp xếp:</label> --}}
         {{--       <form>
                @csrf
                <select name="sort" id="sort" class="form-control"> 
                  <option value="{{Request::url()}}?sort_by=none">--------------Sắp xếp----------------</option>
                    <option value="{{Request::url()}}?sort_by=tang_dan">--------Giá từ thấp đến cao--</option>
                      <option value="{{Request::url()}}?sort_by=giam_dan">------Giá từ cao xuống thấp--</option>
                        <option value="{{Request::url()}}?sort_by=kytu_az">-----Lọc theo tên A đến Z---</option>
                          <option value="{{Request::url()}}?sort_by=kytu_za">---Lọc theo tên Z đến A----</option>
                </select>
              </form> --}}
                </div>
         
            </div>



              <div class="breadcrumbs bounceInUp animated">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="{{URL('/')}}">Trang chủ</a><span>» </span></li>
    {{--         <li class=""> <a title="Go to Home Page" href="">Women</a><span>» </span></li> --}}
            <li class="category13"><strong>{{$meta_title}}</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
              <div class="page-header">
              <div class="container">
             <div class="row">
          <div class="col-xs-12">
            

                             <div class="row">
         {{--    <div class="col-md-4">

              <label for="amount">Sắp xếp theo</label>
              <form>
                @csrf
                
                <select name="sort" id="sort" class="form-control">
                  <option value="{{Request::url()}}?sort_by=none">--Lọc theo--</option>
                    <option value="{{Request::url()}}?sort_by=tang_dan">--Giá tăng dần--</option>
                      <option value="{{Request::url()}}?sort_by=giam_dan">--Giá giảm dần--</option>
                        <option value="{{Request::url()}}?sort_by=kytu_az">Lọc theo tên A đến Z</option>
                          <option value="{{Request::url()}}?sort_by=kytu_za">Lọc theo tên Z đến A</option>
                </select>
              </form>
            </div> --}}
          </div>


               </div>
                 </div>
                   </div>
                    </div><br><br>


  <div class="category-products">
               
              <ul class="products-grid">
                        @foreach($search_product as $key => $product) 
                     <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_slug)}}">
                <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
 
                  <div class="item">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"> {{-- <a class="product-image" title="Sample Product"> --}}
                     <img alt="Sample Product" src="{{URL::to('public/uploads/product/'.$product->product_image)}}"> 
                      <div class="sale-label sale-top-left">sale</div>
                      <div class="item-box-hover">
                   
                      </div>
                    </div>
                  </div>


                   <div class="item-info">
                    <div class="info-inner">
              
                      <div class="item-content">
                        <form>
                                        @csrf
                       <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                      <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                         <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                      <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                       <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                       <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                         <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                {{-- <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" /> --}}
                                                <h2>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</h2>
                                                <p>{{$product->product_name}}</p>

                                             
                                             </a>
                                            <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                            </form>
                      </div>
                      {{--  <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fas fa-heart"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div> --}}
                    </div>
                  </div>

                </div>
              </div>
                    </a>
                    @endforeach
                
                      
                </li>
       
                
              </ul>


            </div>





@endsection
