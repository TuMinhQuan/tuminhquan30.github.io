@extends('admin_layout')
@section('admin_content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<div class="table ">
   <div class="panel panel-default">
      <div class="panel-heading">
         Liệt kê bài viết
      </div>
      <div class="row w3-res-tb">
      
         <div class="col-sm-3">
       
         </div>
      </div>
      <div class="table-responsive">
         <table class="table table-striped b-t b-light">
            <thead>
               <tr>
                  <th style="width:20px;">
                     <label class="i-checks m-b-none">
                     <input type="checkbox"><i></i>
                     </label>
                  </th>
                  <th>Tên sản phẩm</th>
                  <th>Hình Ảnh</th>
                  <th>Slug</th>
                  <th>Mô tả bài viết</th>
                  <th>Từ khóa</th>
                  <th>Danh mục</th>
              
                 
                  <th style="width:30px;"></th>
               </tr>
            </thead>
            <tbody>
               {{--  // lấy dữ liêu --}}
               @foreach($all_post as $key => $post) 
               <tr>
                  <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{ $post->post_title }}</td>
                  <td><img src="{{asset('public/uploads/post/'.$post->post_image)}}" height="100" width="100"></td>
                  <td>{{ $post->post_slug }}</td>
                  <td>{!! $post->post_desc !!}</td>
                  <td>{{ $post->post_meta_keywords }}</td>
                  <td>{{ $post->cate_post->cate_post_name }}</td>
                  <td>
                     @if($post->post_status=0)
                     Hiển thị
                     @else
                     Ẩn
                     @endif
                  </td>
        
           
                  {{--   
                  <td><span class="text-ellipsis">Ngày Thêm</span></td>
                  --}}
                  <td>
                     <a href="{{URL::to('/edit-post/'.$post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                     <i class="glyphicon glyphicon-pencil"></i></a>
                     <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này không?')" href="{{URL::to('/delete-post/'.$post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                     <i class="glyphicon glyphicon-trash"></i>
                     </a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
         <?php
            $message = Session::get('message');
            if($message){
              echo '<span class="text-alert">'.$message.'</span>';
              Session::put('message',null);
            }
            ?>
      </div>
      <footer class="panel-footer">
         {{--    
         <div class="row">
            <div class="col-sm-5 text-center">
               <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
               <ul class="pagination pagination-sm m-t-none m-b-none">
                  <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                  <li><a href="">1</a></li>
                  <li><a href="">2</a></li>
                  <li><a href="">3</a></li>
                  <li><a href="">4</a></li>
                  <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
               </ul>
            </div>
         </div>
         --}}
         {!!$all_post->links()!!}
      </footer>
   </div>
</div>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
@endsection