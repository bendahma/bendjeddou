<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\Product;

class Marque extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
