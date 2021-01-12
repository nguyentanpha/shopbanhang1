<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderRight extends Model
{
    //
    protected $fillable=['slider_right_name','slider_right_image','slider_right_status','slider_right_desc'];
    protected $primaryKey='slider_right_id';
    protected $table ='tbl_slider_right'; 
}
