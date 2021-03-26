<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Slider;
use Auth;
session_start();
class BrandProduct extends Controller
{
    

      public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand_product(){
         $this->AuthLogin();
    	return view('admin.add_brand_product');

    }
    public function all_brand_product(){
        $this->AuthLogin();
    	// $all_brand_product = DB::table('tbl_brand_product')->get(); // lấy dữ liệu  từ database
        $all_brand_product = Brand::orderBy('brand_id','DESC')->paginate(5); // cach 2 

    	$manager_brand_product  = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product); // vào admin lấy  gán dữ liệu vào table liệt kê danh mục sản phẩm
    	return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product); // trả về trang admin chứa all_brand_.. gán vào biến admin
    	return view('admin.all_brand_product');

    }
    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = $request->all();

        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
    	// $data = array(); //chuoi
    	// $data['brand_name'] = $request->brand_product_name; // lấy dữ liệu
    	// $data['brand_desc'] = $request->brand_product_desc;// tên của biến trong database và biến name trong form
    	// $data['brand_status'] = $request->brand_product_status;

    	// DB::table('tbl_brand_product')->insert($data); // them dữ liệu vào database

    	Session::put('message','Thêm thuong hieu sản phẩm thành công');
    	return Redirect::to('add-brand-product');

    }
 
      public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
       
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }
    public function active_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }

      public function edit_brand_product($brand_product_id){
       $this->AuthLogin();
        // $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get(); // cach nay su dung database
       $edit_brand_product = Brand::where('brand_id',$brand_product_id)->get(); // sử dụng model

        $manager_brand_product  = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);

        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_product_id){
       $this->AuthLogin();
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_slug = $data['brand_product_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
         $brand->save();
        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_desc'] = $request->brand_product_desc;
        // DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
      public function delete_brand_product($brand_product_id){
       $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

      //End Function Admin // Thương hiệu sản phẩm
     
    //  public function show_brand_home(Request $request, $brand_slug){
    //      //slide
    //     $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        
    //     $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
    //     $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        
        
    //     $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')->where('tbl_brand_product.brand_slug',$brand_slug)->get();

    //     $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_slug',$brand_slug)->get();

    //     foreach($brand_name as $key => $val){
    //         //seo 
    //         $meta_desc = $val->brand_desc; 
    //         $meta_keywords = $val->brand_desc;
    //         $meta_title = $val->brand_name;
    //         $url_canonical = $request->url();
    //         //--seo
    //     }
         
    //     return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
    // }
     public function show_brand_home(Request $request, $brand_slug){
     

        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        
        
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')->where('tbl_brand_product.brand_slug',$brand_slug)->paginate(6);

        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_slug',$brand_slug)->limit(1)->get();

        foreach($brand_name as $key => $val){
            //seo 
            $meta_desc = $val->brand_desc; 
            $meta_keywords = $val->brand_desc;
            $meta_title = $val->brand_name;
            $url_canonical = $request->url();
            //--seo
        }
         
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
    }

     

}
