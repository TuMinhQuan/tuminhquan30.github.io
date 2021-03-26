<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
// use Mail;
use App\Slider;

use Illuminate\Support\Facades\Redirect;
session_start();
use App\Product;
use App\Brand;
class HomeController extends Controller
{
    //
    
    public function index(Request $request){
    
       

      //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        // SEO
        $meta_desc = "Chuyên bán điện thoại iphone, xiaomi, samsung";
        $meta_keywords = "iphone, phụ kiện điện thoại";
        $meta_title = "Điện thoại ";
        $url_canonical = $request->url();
        // SEO


        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6); 
    //danh mục iphone

        $phone_ten = DB::table('tbl_product')->where('brand_id','10')->get();
      // danh mục xiaomi
         
         $xiaomi_dienthoai = DB::table('tbl_product')->where('brand_id','11')->get(); 
          // $xiaomi_dienthoai = Brand::where('brand_id','11')->get(); 


     

      return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('phone_ten',$phone_ten)->with('xiaomi_dienthoai',$xiaomi_dienthoai); 

       
     
        
    }
      public function search(Request $request){
        
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo 
        $meta_desc = "Tìm kiếm sản phẩm"; 
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);

    }
    // public function autocomplete_ajax(Request $request){
    //     $data = $request->all();
    //     if($data['query']){
    //         $product = Product::where('product_status',0)->where('product_name','LIKE','%' .$data['query'].'%')->get();
    //         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
    //         foreach ($product as $key => $val) {
    //             $output .='
    //             <li> <a href="#">'.$val->product_name.'</a></li>';
    //         }
    //         $output .= '</ul>';
    //         echo $output;
    //     }
    // }
}
