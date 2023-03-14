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

    public function get_mony_achat_total(){

      $total_achat = 0 ;
      $total_gros = 0 ;
      $total_details = 0 ;
      $total_facilite = 0 ;

      $products = Product::whereHas('marque',function($q){
         $q->where('id',$this->id);
      })->with('price')->get();

      if($products->count() > 0){
         foreach ($products as $product) {
            $total_achat += $product->price->prixAchat ;
            $total_gros += is_numeric($product->price->prixVenteGros) ? $product->price->prixVenteGros : 0 ;
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
