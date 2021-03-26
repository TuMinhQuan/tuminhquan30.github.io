<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Contact;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Slider;
use App\Product;
use App\Brand;
use App\CategoryProductModel;
use Auth;
session_start();
class ContactController extends Controller
{
	public function lien_he(Request $request){
		 //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        // SEO
        $meta_desc = "Liên hệ";
        $meta_keywords = "Liên hệ ";
        $meta_title = "Liên hệ";
        $url_canonical = $request->url();
        // SEO


        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

 		$contact = Contact::where('info_id',4)->get();
    	
     

      return view('pages.lienhe.contact')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('contact',$contact); 

       

	}
	
	 public function delete_info($info_id){
      
      $contact = Contact::find($info_id);
      $info_image = $contact->info_image;
      if($info_image){
        $path = 'public/uploads/contact/'.$info_image;
        unlink($path);
      }
      $contact->delete();
      Session::put('message','Xóa thông tin thành công');
       return Redirect()->back();
    }

	 public function list_info(){
           $all_info = Contact::orderBy('info_id','DESC')->get();
        return view('admin.information.list_info')->with(compact('all_info'));
    }
    public function information(){
    	$contact = Contact::where('info_id',1)->get();
    	return view('admin.information.add_information')->with(compact('contact'));
    }
     public function edit_info($info_id){
       
        // $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get(); // cach nay su dung database
       $edit_info = Contact::where('info_id',$info_id)->get(); // sử dụng model

        $manager_info = view('admin.edit_info')->with('manager_info',$manager_info);
         $all_info = Contact::orderBy('info_id','DESC')->get();
        return view('admin_layout')->with('admin.edit_info', $manager_info);
    }

     //  public function update_info(Request $request,$info_id){
     //  		$data = $request->all();
    	// $contact = Contact::find($info_id);
    	// $contact->info_contact = $data['info_contact'];
    	// $contact->info_map = $data['info_map'];
    	// $contact->info_fanpage = $data['info_fanpage'];
    	// $get_image = $request->file('info_image');
    	//  $info_logo = $contact->info_logo;

    	 

     //    if($get_image){
     //    	$path = 'public/uploads/contact/'.$info_logo;
     //    	unlink($path);
     //        $get_name_image = $get_image->getClientOriginalName();
     //        $name_image = current(explode('.',$get_name_image));
     //        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
     //        $get_image->move($path,$new_image);
     //        $contact->info_logo = $new_image;
        

     //    }
     //    $contact->save();
     //      return redirect()->back()->with('message','Cập nhật thông tin website thành công');
     //  }
    //   public function update_info(Request $request,$info_id){
    //   		$data = $request->all();
    // 	$contact = Contact::find($info_id);
    // 	$contact->info_contact = $data['info_contact'];
    // 	$contact->info_map = $data['info_map'];
    // 	$contact->info_fanpage = $data['info_fanpage'];
    // 	$get_image = $request->file('info_image');
    // 	// $path = 'public/uploads/contact/';
    // 	$get_image = $request->file('info_image');
    //     if($get_image){
    //     	$info_image = $contact->info_image;


    //   if($info_image){
    //   	$path = 'public/uploads/contact/'.$info_image;
    //   	unlink($path,$contact->info_image);
    //     	// unlink($path,$contact->info_logo);
    //         $get_name_image = $get_image->getClientOriginalName();
    //         $name_image = current(explode('.',$get_name_image));
    //         $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    //         $get_image->move($path,$new_image);
    //         $contact->info_logo = $new_image;
        
    //     }
    //        }
    //     $contact->save();
    //       return redirect()->back()->with('message','Cập nhật thông tin website thành công');
    // }
    public function save_info(Request $request){
    	$data = $request->all();
    	$contact = new Contact();
    	$contact->info_contact = $data['info_contact'];
    	$contact->info_map = $data['info_map'];
    	$contact->info_fanpage = $data['info_fanpage'];
    	$get_image = $request->file('info_image');
    	$path = 'public/uploads/contact/';

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_logo = $new_image;
        

        }
        $contact->save();
          return redirect()->back()->with('message','Thêm thông tin website thành công');
    }
}
