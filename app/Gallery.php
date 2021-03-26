<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
      public $timestamps = false; // hiển thị thời gian tạo // set thời gian
    protected $fillable = [
    	'gallery_name','gallery_image','product_id'
    ];
    protected $primaryKey = 'gallery_id';
    protected $table = 'tbl_gallery';
}

