 @extends('admin_layout')
 @section('admin_content')
 {{-- thông kê --}}
   <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
{{-- thông kê --}}
 <h1 class="h3 mb-0 text-gray-800">Trang Admin</h1>
	<div class="market-updates">
				<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Sản Phẩm</h4>
					<h3>{{$product_count}}</h3>
					{{-- <p>Other hand, we denounce</p> --}}
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Khách hàng</h4>
						<h3>{{$cus_count}}</h3>
					{{-- 	<p>Other hand, we denounce</p> --}}
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Đơn hàng</h4>
						<h3>{{$order_count}}</h3>
						{{-- <p>Other hand, we denounce</p> --}}
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
				{{-- <div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Sales</h4>
						<h3>1,500</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div> --}}
		   <div class="clearfix"> </div>
		</div>

 @endsection
