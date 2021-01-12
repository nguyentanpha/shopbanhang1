<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $fillable=['name_quanhuyen','type','matp'];
    protected $primaryKey='maqh';
    protected $table ='tbl_quanhuyen';
}
