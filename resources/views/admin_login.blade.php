<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Quản Lý Sản Phẩm</title>
     <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--===============================================================================================-->  
      <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/bootstrap/css/bootstrap.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/animate/animate.css')}}">
      <!--===============================================================================================-->  
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/css-hamburgers/hamburgers.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/animsition/css/animsition.min.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/select2/select2.min.css')}}">
      <!--===============================================================================================-->  
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/daterangepicker/daterangepicker.css')}}">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/util.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/main.css')}}">
      <!--===============================================================================================-->
   </head>
   <body>
      <div class="limiter">
         <div class="container-login100" style="background-image: url('{{asset('public/backend/images/bg-01.jpg')}}">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
               <form class="login100-form validate-form flex-sb flex-w" action="{{URL::to('/admin-dashboard')}}" method="post">
                  {{ csrf_field() }}
                  <span class="login100-form-title p-b-53">
                  Quản Lý  Sản Phẩm
                  </span>
                
                  <div class="p-t-31 p-b-9">
                     <span class="txt1">
                     Username
                     </span>
                  </div>
                  <div class="wrap-input100 validate-input" data-validate = "Username is required">
                     <input class="input100" type="text" name="admin_email" >
                     <span class="focus-input100"></span>
                  </div>
                  <div class="p-t-13 p-b-9">
                     <span class="txt1">
                     Password
                     </span>
                  
                  </div>
                  <div class="wrap-input100 validate-input" data-validate = "Password is required">
                     <input class="input100" type="password" name="admin_password" >
                     <span class="focus-input100"></span>
                  </div>
                  <div class="container-login100-form-btn m-t-17">
                     <button type="submit"  value="Đăng nhập" class="login100-form-btn"  name="login"> Đăng Nhập</button>
                  </div>
                  <?php
                     $message = Session::get('message');
                     if($message){
                       echo '<span class="text-alert">'.$message.'</span>';
                       Session::put('message',null);
                     }
                     ?>
             {{--      <div class="w-full text-center p-t-55">
                     <span class="txt2">
                     Not a member?
                     </span>
                     <a href="#" class="txt2 bo1">
                     Sign up now
                     </a>
                  </div> --}}
               </form>
               <a href="{{url('/register-auth')}}"> Đăng ký Auth</a> |
                <a href="{{url('/login-auth')}}"> Đăng nhập Auth</a> |
            </div>
         </div>
      </div>
      <div id="dropDownSelect1"></div>
      <!--===============================================================================================-->
      <script src="{{asset('public/backend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
      <!--===============================================================================================-->
      <script src="{{asset('public/backend/vendor/animsition/js/animsition.min.js')}}"></script>
      <!--===============================================================================================-->
      <script src="{{asset('public/backend/vendor/bootstrap/js/popper.js')}}"></script>
      <script src="{{asset('public/backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
      <!--===============================================================================================-->
      <script src="{{asset('public/backend/vendor/select2/select2.min.js')}}"></script>
      <!--===============================================================================================-->
      <script src="{{asset('public/backend/vendor/daterangepicker/moment.min.js')}}"></script>
      <script src="{{asset('public/backend/vendor/daterangepicker/daterangepicker.js')}}"></script>
      <!--===============================================================================================-->
      <script src="{{asset('public/backend/vendor/countdowntime/countdowntime.js')}}"></script>
      <!--===============================================================================================-->
      <script src="{{asset('public/backend/js/main.js')}}"></script>
   </body>
</html>