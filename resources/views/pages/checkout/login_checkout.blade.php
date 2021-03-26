@extends('layout')
@section('content')


<section class="main-container col1-layout wow bounceInUp animated">
  <div class="main container">
    <div class="account-login">
      <div class="page-title">
        <h2>Đăng Nhập Tài Khoản</h2>
      </div>
      <fieldset class="col2-set">
       {{--  <legend>Login or Create an Account</legend> --}}
        <div class="col-1 new-users">
         <div class="content">
            
            <ul class="form-list">
              <li>
          <form action="{{URL::to('/login-customer')}}" method="POST">
              @csrf
                <br>
                <input type="text" title="Email Address" class="input-text" name="email_account" required placeholder="Nhập Email" >
                    
              </li>
              <li>
                <label for="pass">Password <span class="required">*</span></label>
                <br>
                <input type="password" title="Password"  class="input-text" name="password_account" required  placeholder="Nhập password">
      
              </li>
            </ul>
          
            <div class="buttons-set">
              <button  type="submit" class="button login"><span>Đăng Nhập</span></button>
               </div>
           </form>
          </div>
        </div>


        <div class="col-2 registered-users"><strong>Đăng Ký</strong>
          <div class="content">
            <form action="{{URL::to('/add-customer')}}" method="POST" >
		          @csrf
            <ul class="form-list">
              <li>
               
                <input  type="text" title="Email Address" class="input-text" name="customer_name"  placeholder="Họ Và Tên" required>
       
              </li>
                <li>
              
                <input type="email"  title="Password" name="customer_email" class="input-text" placeholder="Địa chỉ email" required>
              </li>
              <li>
              
                <input type="password"  title="Password" name="customer_password" class="input-text" placeholder="Mật khẩu" required>
              </li>
               <li>
              
                <input type="text"  title="Password" name="customer_phone" class="input-text" placeholder="Phone"  required>
              </li>
            </ul>
         
            <div class="buttons-set">
              <button type="submit" class="button login"><span>Đăng Ký</span></button>
               </div>

     
           </form>
          </div>
        </div>
      </fieldset>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>
</section>



@endsection
