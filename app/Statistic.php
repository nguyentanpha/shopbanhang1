<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    //
    protected $fillable=['order_date','sales','profit','quantity','total_order'];
    protected $primaryKey='id_statistical';
    protected $table ='tbl_statistical'; 
}
