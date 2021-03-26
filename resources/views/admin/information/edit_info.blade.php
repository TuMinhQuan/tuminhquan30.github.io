@extends('admin_layout')
@section('admin_content')
<head>
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
</head>
<div class="container">
   <div class="row" >
      <div class="col-sm-12">
         <div class="text-center">
            <h2> Cập nhật  thông tin< /h2>
         </div>
         @foreach($edit_info as $key => $edit_value)
         <div class="position-center">
            <form role="form" action="{{URL::to('/update-info/'.$edit_value->info_id)}}" method="post">
             @csrf
               <div class="form-group">
                  <label for="exampleInputEmail1">Tên </label>
                  <input type="text" value="{{$edit_value->info_contact}}" name="info_contact" class="form-control" id="exampleInputEmail1" >
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Map</label>
                  <input type="text" value="{{$edit_value->info_map}}" name="slug_category_product" class="form-control" id="exampleInputEmail1" >
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Logo </label>
                  <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                  <img src="{{URL::to('public/uploads/contact/'.$edit_value ->info_logo)}}" height="100" width="100">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Fanpage</label>
                  <textarea style="resize: none" rows="8" class="form-control" name="category_product_keywords" id="exampleInputPassword1" placeholder="Từ Khóa Danh Mục">{{$edit_value->info_fanpage}}</textarea>
               </div>
                    
               <button type="submit" name="update_category_product" class="btn btn-outline-success btn-block">Cập nhật thông tin liên hệ</button>
            </form>
         </div>
      </div>
      @endforeach
   </div>
</div>
@endsection