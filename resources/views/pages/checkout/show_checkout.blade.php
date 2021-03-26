@extends('layout')
@section('content')

<!-- Main Container -->
<section class="main-container col2-right-layout bounceInUp animated">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-9">
        <div class="page-title">
          <h2>Checkout</h2>
        </div>
       <div class="content">
          <div class="col-sm-12 clearfix">
            
          <form  method="POST">
			  @csrf
        
            <ul class="form-list">
              <li>
               
                <input type="text" title="Email Address"  class="input-text shipping_email"  name="shipping_email"  placeholder="Điền email">
              </li>
                <li>
              
                <input type="text"  title="Password" name="shipping_name"   class="input-text shipping_name" placeholder="Họ và tên" >
              </li>
              <li>
              
                <input type="text"  title="Password" name="shipping_address"  class="input-text shipping_address " placeholder="Địa chỉ " >
              </li>
               <li>
              
                <input type="text"  title="Password" name="shipping_phone"  class="input-text shipping_phone " placeholder="Số điện thoại" >
              </li>
       {{--    Tính phí vận chuyển --}}
              {{--   @if(Session::get('fee'))
                    <input type="hidden" name="order_fee" class="order_fee"  value="{{Session::get('fee')}}">
                  @else 
                    <input type="hidden" name="order_fee" class="order_fee" value="10000">
                  @endif --}}
    {{-- //Tính mã giảm giá trong đặt hàng 
      Vì là chuỗi nên phải dung foreach lấy ra mã giảm giá
      -Sau khi đặt hàng dựa vào coupon code lấy ra trong csdl để so sánh mã giảm, để láy ra dc % giảm  --}}
                  @if(Session::get('coupon'))
                    @foreach(Session::get('coupon') as $key => $cou)
                      <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                    @endforeach
                  @else 
                    <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                  @endif
                  
              <li>
                <textarea style="resize: none" rows="5" name="shipping_notes"   class="form-control shipping_notes " name="category_product_keywords" placeholder="Ghi chú đơn hàng của bạn"></textarea>
            </li>
            <div class="">
                     <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                          <select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
                                                 
                                                <option value="0">Qua chuyển khoản</option>
                                                 <option value="1">Tiền mặt</option> 
                                                
                                        </select>
                                    </div>
                  </div>
            </ul>


          <input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-success send_order">

           </form>
</div>


		    


          </div>
      </div>


      <div class="col-main col-sm-9">
      	   @if(session()->has('message'))
                  <div class="alert alert-success">
                    {{session()->get('message')}} 
                  </div>
                  @elseif(session()->has('error'))
                <div class="alert alert-danger">
                   {{session()->get('error')}} 
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
                      {{-- <th rowspan="1" class="hidden-phone"></th> --}}
                     
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
                        <td colspan="2">
      
                    <li colspan="1" ><strong><span>Tổng:{{number_format($total,0,',','.')}}VNĐ</span>  </strong></li>
             
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
         @if(Session::get('cart'))
          <tr>
            <td >
            <form method="POST" action="{{url('/check-coupon')}}">
              @csrf
                       <input type="text" class="form-control"  name="coupon" placeholder="Mã giảm giá"><br>
                       <input type="submit" class="btn btn default check_coupon" name="check_coupon" value="Nhập mã giảm giá">

                       
                     </form>
            </td>

              </tr>
              @endif

                </table>
      
          </div>

      </div>

    </div>
  </div>
  </section>
@endsection