<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = [] ;

    public function products(){
        return $this->hasMany(Product::class);
    }

}
