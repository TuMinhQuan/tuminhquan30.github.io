<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'order_code', 'product_id', 'product_name','product_price','product_sales_quantity','product_coupon','product_feeship'
    ];
    protected $primaryKey = 'order_details_id';
 	protected $table = 'tbl_order_details';


// mỗi sản phẩm trong chi tiết hóa đơn thuộc 1 sản phẩm trong product (1-1)
 	public function product(){
 		return $this->belongsTo('App\Product','product_id');
 	}
 }
