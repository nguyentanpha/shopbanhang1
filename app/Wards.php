<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    //
    protected $fillable=['name_xaphuong','type','maqh'];
    protected $primaryKey='xaid';
    protected $table ='tbl_xaphuongthitran';
}
