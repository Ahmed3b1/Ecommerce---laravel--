<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendingorder extends Model
{

    public function orderDetails(){

        return $this->hasMany(orderdetails::class) ;

    }

    public function user() {

        return $this->belongsTo(User::class , 'user_id') ;

    }
    
}
