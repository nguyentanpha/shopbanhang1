<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $fillable=['name'];
    protected $primaryKey='id_roles';
    protected $table ='tbl_roles';
    public function admin(){
        return $this->belongsToMany('App\Admin');
    }
}
