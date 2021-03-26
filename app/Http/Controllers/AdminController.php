<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Login;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Validator;
// use App\Rules\Captcha;  
use App\Product;
use App\Customer;
use App\Order;
use App\OrderDetails;
session_start();
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
    	return view('admin_login');
    }
   public function show_dashboard(){
          $this->AuthLogin();
            $product_count = Product::count();
            $order_count =  Order::count();
            $cus_count = Customer::count();
        return view('admin.dashboard',compact('product_count','order_count','cus_count'));
    }

    public function dashboard(Request $request){
        //$data = $request->all();
        $data = $request->validate([
            //validation laravel 
            'admin_email' => 'required',
            'admin_password' => 'required',
           // 'g-recaptcha-response' => new Captcha(),    //dòng kiểm tra Captcha
        ]);


        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($login){
            $login_count = $login->count();
            if($login_count>0){
                Session::put('admin_name',$login->admin_name);
                Session::put('admin_id',$login->admin_id);
                return Redirect::to('/dashboard');
            }
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Vui lòng nhập lại');
                return Redirect::to('/admin');
        }
       

    }

    
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
  
    }
}
