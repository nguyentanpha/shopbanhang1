<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=['category_id','product_name','brand_id','product_desc','product_content','product_sold'
        ,'product_price','product_image','product_status'];
    protected $primaryKey='product_id';
    protected $table ='tbl_product'; 
}
