<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Slider;
use Session;
use App\CategoryProductModel;
use App\Product;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
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

    public function add_category_product(){
       $this->AuthLogin();
       // $category = CategoryProductModel::where('category_parent',0)->orderBy('category_id','DESC')->get();
    	return view('admin.add_category_product');

    }
    public function all_category_product(){
          $this->AuthLogin();
         
    	$all_category_product = DB::table('tbl_category_product')->paginate(4); // lấy dữ liệu  từ database
    	$manager_category_product  = view('admin.all_category_product')->with('all_category_product',$all_category_product); // vào admin lấy  gán dữ liệu vào table liệt kê danh mục sản phẩm
    	return view('admin_layout')->with('admin.all_category_product', $manager_category_product); // trả về trang admin chứa all_category_.. gán vào biến admin
    	// return view('admin.all_category_product');

    }
    public function save_category_product(Request $request){
          $this->AuthLogin();
    	$data = array(); //chuoi
    	$data['category_name'] = $request->category_product_name; // lấy dữ liệu
      // $data['category_parent'] = $request->category_parent; // lấy dữ liệu
      $data['meta_keywords'] = $request->category_product_keywords; // lấy dữ liệu
      $data['slug_category_product'] = $request->slug_category_product;
    	$data['category_desc'] = $request->category_product_desc;// tên của biến trong database và biến name trong form
    	$data['category_status'] = $request->category_product_status;

    	DB::table('tbl_category_product')->insert($data); // them dữ liệu vào database
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('add-category-product');

    }
    public function unactive_category_product($category_product_id){
          $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt  sản phẩm thành công');
        return Redirect::to('all-category-product');

    }
    public function active_category_product($category_product_id){
          $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Kích hoạt  sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

      public function edit_category_product($category_product_id){
         $this->AuthLogin();
          $category = CategoryProductModel::orderBy('category_id','DESC')->get();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();

        $manager_category_product  = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product)->with('category',$category);

        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
         $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        // $data['category_parent'] = $request->category_parent; 
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
      public function delete_category_product($category_product_id){
         $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    //End Function Admin Page
    public function show_category_home(Request $request ,$slug_category_product){
      
       //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $category_by_slug = CategoryProductModel::where('slug_category_product',$slug_category_product)->get();
        foreach ($category_by_slug as $key => $cate) {
            $category_id = $cate->category_id;
           
          }  
          if(isset($_GET['sort_by'])){

          $sort_by = $_GET['sort_by'];

            if($sort_by=='giam_dan'){

              $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','DESC')->paginate(6)->appends(request()->query());

            }elseif($sort_by=='tang_dan'){
                 $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','ASC')->paginate(6)->appends(request()->query());

            }elseif($sort_by=='kytu_za'){
                 $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','DESC')->paginate(6)->appends(request()->query());
            
            }elseif($sort_by=='kytu_az'){
                 $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','ASC')->paginate(6)->appends(request()->query());

            }
          }else{
           $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_id','DESC')->paginate(6);

          }


      $category_name = DB::table('tbl_category_product')->where('tbl_category_product.slug_category_product',$slug_category_product)->limit(1)->get();
       foreach($category_name as $key => $val){
                //seo 
                 $meta_desc = $val->category_desc; 
                $meta_keywords = $val->meta_keywords;
                $meta_title = $val->category_name;
                $url_canonical = $request->url();
                //--seo
           }
    

      return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
    }

}

