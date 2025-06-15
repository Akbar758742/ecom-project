<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public function user(){
        return $this->hasOne(('App\Models\user'),'id','user_id');
    }
     public function product(){
        return $this->hasOne(('App\Models\product'),'id','product_id');
    }
}
