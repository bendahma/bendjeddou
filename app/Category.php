<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

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

    public function get_mony_achat_total(){

      $total_achat = 0 ;
      $total_gros = 0 ;
      $total_details = 0 ;
      $total_facilite = 0 ;

      $products = Product::whereHas('category',function($q){
         $q->where('id',$this->id);
      })->with('price')->get();

      if($products->count() > 0){
         foreach ($products as $product) {
            $total_achat += $product->price->prixAchat ;
            $total_gros += $product->price->prixVenteGros ;
            $total_details += $product->price->prixDetails ;
            $total_facilite += $product->price->prixFacilite ;
         };
      }

     $total_array = array(
            'total_achat'=>$total_achat,
            'total_gros' => $total_gros,
            'total_details' => $total_details,
            'total_facilite' => $total_facilite,
      ); 
      
      

      return $total_array;
    }

}
