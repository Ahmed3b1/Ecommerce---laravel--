<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    
    public function Category() {

        return $this->belongsTo(Category::class ,'category_id') ;

    }
    
    public function ProductPhotos () {

        return $this->hasMany(ProductPhoto::class) ;

    }

    public function ProductReviews () {

        return $this->hasMany(Review::class) ;

    }
    
}
