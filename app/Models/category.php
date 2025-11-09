<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    public function Product () {

        return $this->hasMany(Product::class) ;

    }

}
