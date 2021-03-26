<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//FrontEnd trang chu tìm kiếm home
Route::get('/', 'HomeController@index' );
Route::get('/trang-chu','HomeController@index' ) ;
Route::post('/tim-kiem','HomeController@search');
// Route::get('/404','HomeController@error_page');
// Route::post('/autocomplete-ajax','HomeController@autocomplete_ajax');
// liên hệ website
Route::get('/lien-he','ContactController@lien_he');
Route::get('/list-info','ContactController@list_info');
Route::get('/information','ContactController@information');
Route::post('/save-info','ContactController@save_info');

Route::get('/delete-info/{info_id}','ContactController@delete_info');
// Route::get('/edit-info/{info_id}','ContactProduct@edit_info');
// Route::post('/update-info/{info_id}','ContactController@update_info');
//Danh Mục Sản Phẩm Trang Chủ và thương hiệu sản phẩm
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
// Route::get('/thuong-hieu-san-pham/{brand_slug}','BrandProduct@show_brand_home');
Route::get('/thuong-hieu/{brand_slug}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');

//BackEnd
Route::get('/admin','AdminController@index' ) ;
Route::get('/dashboard','AdminController@show_dashboard' ) ;
Route::get('logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');


// Category product danh muc san pham
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
// ẩn hiện danh mục sản phẩm
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');


Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');



// Brand product thương hiệu san pham
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');

Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');



//  product thương hiệu san pham
// Route::get('/add-product','ProductController@add_product');
// Route::get('/edit-product/{product_id}','ProductController@edit_product');
//Product
Route::group(['middleware' => 'auth.roles'], function () {
	Route::get('/add-product','ProductController@add_product');
	Route::get('/edit-product/{product_id}','ProductController@edit_product');
});

//user controller phân quyền user
Route::get('users','UserController@index')->middleware('auth.roles');
Route::get('add-users','UserController@add_users')->middleware('auth.roles');
Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles')->middleware('auth.roles');

// chuyển quyền impersonate
Route::get('impersonate/{admin_id}','UserController@impersonate');
Route::get('impersonate-destroy','UserController@impersonate_destroy');
//
Route::post('store-users','UserController@store_users');
Route::post('assign-roles','UserController@assign_roles')->middleware('auth.roles');

// xóa sản phẩm
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/unactive-product/{brand_product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');




// file manager ckeditor
Route::post('/uploads-ckeditor','ProductController@ckeditor_image');
Route::get('/file-browser','ProductController@file_browser');



// // file manager ckeditor
// Route::post('/uploads-ckeditor','ProductController@ckeditor_image');
// Route::get('/file-browser','ProductController@file_browser');

// Add Galelery thư viên ảnh
Route::get('/add-gallery/{product_id}','GalleryController@add_gallery');
Route::post('/select-gallery','GalleryController@select_gallery');
Route::post('/insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('/update-gallery-name','GalleryController@update_gallery_name');
Route::post('/delete-gallery','GalleryController@delete_gallery');
Route::post('/update-gallery','GalleryController@update_gallery');
//cart thanh toán

Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/gio-hang','CartController@gio_hang');
Route::post('/update-cart','CartController@update_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');
Route::get('/del-all-product','CartController@delete_all_product');


//coupon mã giảm giá trong phần cart . FrontEnd
Route::post('/check-coupon','CartController@check_coupon');
//coupon trong phần admin
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::get('/list-coupon','CouponController@list_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');

Route::get('/unset-coupon','CouponController@unset_coupon');


//Delivery phí vận chuyển
// Route::get('/delivery','DeliveryController@delivery');
// Route::post('/select-delivery','DeliveryController@select_delivery');
// Route::post('/insert-delivery','DeliveryController@insert_delivery');
// Route::post('/select-feeship','DeliveryController@select_feeship');
// Route::post('/update-delivery','DeliveryController@update_delivery');

// check out đăng nhập
//Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/dang-nhap','CheckoutController@login_checkout');
//logout đăng xuất
Route::get('/logout-checkout','CheckoutController@logout_checkout');

Route::post('/login-customer','CheckoutController@login_customer');

Route::post('/add-customer','CheckoutController@add_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');

//confirm order xác nhận đơn hàng
Route::post('/confirm-order','CheckoutController@confirm_order');

// chọn phí vận chuyển trong lúc thanh toán
// Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
// Route::post('/calculate-fee','CheckoutController@calculate_fee');
//xóa phí vận chuyển trong thanh toán
// Route::get('/del-fee','CheckoutController@del_fee');

// Route::get('/payment','CheckoutController@payment');
// Route::post('/order-place','CheckoutController@order_place');




//Order đặt hàng và in  đơn hàng
Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');

//Banner
Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::post('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','SliderController@active_slide');
Route::get('/delete-slide/{slider_id}','SliderController@delete_slider');

// Authencation role, phân quyền
Route::get('/register-auth','AuthController@register_auth');
Route::get('/login-auth','AuthController@login_auth');
Route::get('/logout-auth','AuthController@logout_auth');

Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');