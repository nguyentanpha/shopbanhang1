<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable=['customer_name','customer_email','customer_passwword','customer_phone'];
    protected $primaryKey='customer_id';
    protected $table ='tbl_customer'; 
}
