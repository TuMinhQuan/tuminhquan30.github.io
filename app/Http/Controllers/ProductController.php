<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use Auth;
use App\Gallery;
use App\Product;
// model file có quyền copy file ảnh từ product qua gallery
use File;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();


        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);


    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_product  = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);

    }
    public function save_product(Request $request){
         $this->AuthLogin();
        $data = array();
        $product_price = filter_var($request->product_price, FILTER_SANITIZE_NUMBER_INT);

        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_status;
        $get_image = $request->file('product_image');

        $path = 'public/uploads/product/';
        $path_gallery = 'public/uploads/gallery/';

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            File::copy($path.$new_image,$path_gallery.$new_image);
            $data['product_image'] = $new_image;

        }
          $pro_id = DB::table('tbl_product')->insertGetId($data);
          $gallery = new Gallery();
          $gallery->gallery_image = $new_image;
          $gallery->gallery_name = $new_image;
          $gallery->product_id = $pro_id;
          $gallery->save();

          Session::put('message','Thêm sản phẩm thành công');
         return Redirect::to('add-product');

    }
    public function unactive_product($product_id){
         $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');

    }
    public function active_product($product_id){
         $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
         $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();

        $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
     public function update_product(Request $request,$product_id){
         $this->AuthLogin();
        $data = array();
        $product_price = filter_var($request->product_price, FILTER_SANITIZE_NUMBER_INT);

        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['product_image'] = $new_image;
                    DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('all-product');
        }

        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }


    //  public function update_product(Request $request,$product_id){
    //      $this->AuthLogin();
    //     $data = array();
    //     $data['product_name'] = $request->product_name;
    //     $data['product_quantity'] = $request->product_quantity;
    //     $data['product_slug'] = $request->product_slug;
    //     $data['product_price'] = $request->product_price;
    //     $data['product_desc'] = $request->product_desc;
    //     $data['product_content'] = $request->product_content;
    //     $data['category_id'] = $request->product_cate;
    //     $data['brand_id'] = $request->product_brand;
    //     $data['product_status'] = $request->product_status;
    //     $get_image = $request->file('product_image');

    //     $path = 'public/uploads/product/';
    //     $path_gallery = 'public/uploads/gallery/';

    //     if($get_image){
    //                 $get_name_image = $get_image->getClientOriginalName();
    //                 $name_image = current(explode('.',$get_name_image));
    //                 $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    //                 // $get_image->move('public/uploads/product',$new_image);
    //                 // $data['product_image'] = $new_image;
    //                   $get_image->move($path,$new_image);
    //                  File::copy($path.$new_image,$path_gallery.$new_image);
    //                 $data['product_image'] = $new_image;
    //                 // DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    //                 // Session::put('message','Cập nhật sản phẩm thành công');
    //                 // return Redirect::to('all-product');
    //     }


    //     DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    //     Session::put('message','Cập nhật sản phẩm thành công');
    //     return Redirect::to('all-product');
    // }


    //  public function delete_product($product_id){
    //     $this->AuthLogin();
    //     DB::table('tbl_product')->where('product_id',$product_id)->delete();
    //     Session::put('message','Xóa sản phẩm thành công');
    //     return Redirect::to('all-product');
    // }


       public function delete_product($product_id){
        $this->AuthLogin();
      $product = Product::find($product_id);
      $product_image = $product->product_image;
      if($product_image){
        $path = 'public/uploads/product/'.$product_image;
        unlink($path);
      }
      $product->delete();
      Session::put('message','Xóa sản phẩm thành công');
       return Redirect()->back();
    }
    //End Admin Page
    public function details_product($product_slug , Request $request){
 
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_slug',$product_slug)->get();

        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
            $product_cate = $value->category_name;
            $cate_slug = $value->slug_category_product;
            // gallery
            $product_id = $value->product_id;
                //seo
                $meta_desc = $value->product_desc;
                $meta_keywords = $value->product_slug;
                $meta_title = $value->product_name;
                $url_canonical = $request->url();
                //--seo
            }
               //gallery
        $gallery = Gallery::where('product_id',$product_id)->get();

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_slug',[$product_slug])->orderby(DB::raw('RAND()'))->paginate(3);


        return view('pages.sanpham.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product)->with('relate',$related_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('product_cate',$product_cate)->with('cate_slug',$cate_slug)->with('gallery',$gallery);

    }
    //  public function  ckeditor_image(Request $request){
    //     // nếu có up ảnh
    //     if($request->hashFile('upload')) {
    //         // lấy tên ảnh đã tải lên
    //         $originName = $request->file('upload')->getClientOriginalName();
    //         // lấy tên file ko lấy đuôi mở rộng của ảnh
    //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //         // lấy đuôi mở rộng
    //         $extension = $request->file('upload')->getClientOriginalExtension();
    //         // thêm thời gian hiện tại để tránh trùng ảnh
    //         $fileName = $fileName.'_'.time().'_'.$extension;

    //         $request->file('upload')->move('public/uploads/ckeditor/',$fileName);
    //         //hàm tải ảnh lên
    //         $CKEditorFuncNum = $request->input('CKEditorFuncNum');
    //         $url = asset('public/uploads/ckeditor/'.$fileName);
    //         $msg = 'Tải ảnh thành công';
    //         $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNumm, '$url','$msg')</script>";
    //         @header('Content-type: text/html; charset=utf-8');
    //         echo $response;
    //     }

    // }


    //    public function file_browser(Request $request){
    //     // số nhiều lấy nhiều ảnh
    //     $paths = glob(public_path('uploads/ckeditor/*'));

    //     $fileNames = array();
    //     foreach ($paths as  $path) {
    //          array_push($fileNames, basename($path));

    //     }
    //     // lấy ảnh cuối cùng, chứ ko phải trong kho ảnh có bao nhiêu thì lấy hết
    //     $data = array (
    //         'fileNames' => $fileNames

    //     );

    //     return view('admin.images.file_browser')->with($data);

    // }

    public function file_browser(Request $request){

        $paths = glob(public_path('uploads/ckeditor/*'));

        $fileNames = array();
        foreach ($paths as  $path) {
             array_push($fileNames, basename($path));

        }

        $data = array (
            'fileNames' => $fileNames

        );
        return view('admin.images.file_browser')->with($data);

    }
     public function  ckeditor_image(Request $request){

       if($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();

            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('uploads/ckeditor/'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Tải ảnh thành công';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }

    }
}
