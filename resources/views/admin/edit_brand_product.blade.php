@extends('admin_layout')
@section('admin_content')
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Custom fonts for this template-->
   <link href="{{asset('public/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <!-- Custom styles for this template-->
   <link href="{{asset('public/backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<div class="container">
   <div class="row" >
      <div class="col-sm-12">
         <div class="text-center">
            <h2> Cập nhật  thương hiệu </h2>
         </div>
         @foreach($edit_brand_product as $key => $edit_value)
         <div class="position-center">
            <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
               {{ csrf_field() }}
               <div class="form-group">
                  <label for="exampleInputEmail1">Tên danh mục</label>
                  <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" >
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Slug</label>
                  <input type="text" value="{{$edit_value->brand_slug}}" name="brand_product_slug" class="form-control" id="exampleInputEmail1" >
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Mô tả danh mục</label>
                  <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1" >{{$edit_value->brand_desc}}</textarea>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Hiển thị</label>
                  <select name="brand_product_status" class="form-control input-sm m-bot15">
                     <option value="0">Ẩn</option>
                     <option value="1">Hiển thị</option>
                  </select>
               </div>
               <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương hiệu</button>
            </form>
         </div>
      </div>
      @endforeach
   </div>
</div>
@endsection