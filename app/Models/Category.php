<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Marque;
use App\Product;
use App\Image;

class Category extends Model
{
    protected $guarded = [];

    public function marques(){
        return $this->belongsToMany(Marque::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function image(){
        return $this->hasOne(Image::class);
    }

}
