@extends('layout')
@section('content')

   <section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
               @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                @endif
          <form action="{{URL('/update-cart')}}" method="POST"> 
                @csrf
          <div class="table-responsive">
              
              
                    </tbody>
               <table class="data-table cart-table" id="shopping-cart-table">
                  <thead>
                    <tr >
                    {{--   <th rowspan="1">&nbsp;</th> --}}
                      <th rowspan="1"><span >Hình Ảnh</span></th>
                      <th rowspan="1"><span class="nobr">Tên Sản Phẩm </span></th>
                      <th rowspan="1" class="hidden-phone"> Số lượng tồn</th>
                     
                      <th colspan="1" class="a-center"><span class="nobr">Giá Sản Phẩm</span></th>
                        <th class="a-center " rowspan="1">Số Lượng</th>
                      <th colspan="1" class="a-center">Thành Tiền</th>
                      {{--   <th colspan="1" class="a-center">Sửa</th> --}}
                     {{--  <th class="a-center" rowspan="1">&nbsp;</th> --}}
                    </tr>
                  </thead>
             
                  <tbody>
                    @if(Session::get('cart')==true)
                    @php
              
                $total=0;
             
              @endphp
                @foreach(Session::get('cart') as $key => $cart)
                  @php
                $subtotal = $cart['product_price']*$cart['product_qty'];
                $total+=$subtotal;
             
              @endphp

               
                    
                     <tr class="first odd">
                      <td ><img width="75" alt="{{$cart['product_image']}}" src="{{asset('public/uploads/product/'.$cart['product_image'])}}"></a></td>
                    
                      <td><h2 class="product-name"> {{$cart['product_name']}}</a> </h2></td>

                    {{--    <td><h2 class="product-name"> {{$cart['product_quantity']}}</a> </h2></td> --}}

                    <td class="cart_description">
                <h4><a href=""></a></h4>
                <p>{{$cart['product_quantity']}}</p>
              </td>
        
                      <td class="a-center hidden-table"><span >{{number_format($cart['product_price'],0,',','.')}}VNĐ</span></td>

                      <td class="a-center movewishlist"><input type="number" min="1"  class="input-text qty" title="Qty"  value="{{$cart['product_qty']}}" name="cart_qty[{{$cart['session_id']}}]"></td>
                      
                      <td class="a-center movewishlist"><span class="cart-price"> <span class="price">{{number_format($subtotal,0,',','.')}}VNĐ</span> </span></td>

                      <td class="a-center last"><a class="button remove-item" title="Remove item" href="{{URL('/del-product/'.$cart['session_id'])}}"><span>Xóa Sản Phẩm</span></a></td>
                    </tr>
              
                  
                     @endforeach
                     <tr>
                       <td>
                        <input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="btn btn-default check_out btn-default btn-sm">

                       </td>
                       <td><a class="btn btn-default check_out" href="{{URL::to('/del-all-product')}}">Xóa Tất Cả</a></td>
                       <td>  @if(Session::get('coupon'))
                       <td><a class="btn btn-default check_out" href="{{URL::to('/unset-coupon')}}">Xóa Mã</a></td>
                          @endif</td>

                          <td>
                        @if(Session::get('customer_id'))
                              <a class="btn btn-default check_out" href="{{url('/checkout')}}">Đặt hàng</a>
                              @else 
                              <a class="btn btn-default check_out" href="{{url('/dang-nhap')}}">Đặt hàng</a>
                @endif
              </td>
                       <td colspan="2">
      
                          <li colspan="1" class="a-left"><strong><span>Tổng:</span>&nbsp;&nbsp;<span >{{number_format($total,0,',','.')}}VNĐ</span>  </strong></li>
                     {{--  <li ><strong><span >{{number_format($total,0,',','.')}}VNĐ</</span></strong></li> --}}
                     @if(Session::get('coupon'))
                     <li>
                        
                      
                        @foreach(Session::get('coupon') as $key => $cou) 
               {{--          giảm theo % --}}
                             @if($cou['coupon_condition']==1)
                              Giảm : {{$cou['coupon_number']}} %
                             <p>
                            {{--   lấy tổng * 10% chia 100 ra tổng giảm --}}
                                @php
                                $total_coupon = ($total*$cou['coupon_number'])/100;
                                echo '<p><li>Tổng Giảm:'.number_format($total_coupon,0,',','.').'đ</li></p>';
                                @endphp
                              </p>
                           {{--    lây tổng - total coupon --}}
                              <p><li> Tổng đã giảm: {{number_format($total-$total_coupon,0,',','.')}}đ</li></p>

                             {{--  // giảm theo tiền --}}
                               @elseif($cou['coupon_condition']==2)
                                Mã giảm: {{number_format($cou['coupon_number'],0,',','.')}} VNĐ
                              <p>
                      {{-- lấy tổng - số tiền giảm --}}
                                @php

                                $total_coupon = $total - $cou['coupon_number'];
                                @endphp
                              </p>

                               <p><li> Tổng đã giảm: {{number_format($total_coupon,0,',','.')}}đ</li></p> 
                          

                                @endif  
                             @endforeach 
                         



                      </li> 
                       @endif
                    
                      </td>

                     </tr>


                     @else
                     <tr>
                      <td colspan="5"><center>
                       @php
                       echo 'Vui lòng thêm sản phẩm vào giỏ hàng';
                       @endphp
                     </center></td>

                     </tr>
                     @endif
                  </tbody>
          </form>
         {{--  Nếu xóa luôn giỏ hàng thì xóa phần mã giảm giá --}}
         @if(Session::get('cart'))
          <tr>
            <td  >
            <form method="POST" action="{{url('/check-coupon')}}">
              @csrf 
                  
                       <input type="text" class="form-control"  name="coupon" placeholder="Mã giảm giá "><br>

                       <input type="submit" class="btn btn default check_coupon" name="check_coupon" value="Nhập mã giảm giá ">

                      
                     </form>
            </td>

              </tr>
              @endif

                </table>
      
          </div>
          
       
          
         
          
        </div>
      
@endsection
