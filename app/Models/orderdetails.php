<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderdetails extends Model
{
    public function Product() {

        return $this->belongsTo(Product::class , 'product_id') ;

    }


    protected $table = 'orderdetails';
    protected $fillable = ['product_id', 'price', 'quantity', 'order_id'];

}
