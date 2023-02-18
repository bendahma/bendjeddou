<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Card;
use App\BonVente;
use App\Price;
use App\Stock;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    public function price(){
        return $this->hasOne(Price::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function marque(){
        return $this->belongsTo(Marque::class);
    }

    public function bonventes(){
        return $this->belongsToMany(BonVente::class,'bon_vente_product')->withPivot(['quantite','montantTotal','prixVente','montantGained'])->withTimestamps();;
    }

    public function stock(){
        return $this->hasOne(Stock::class);
    }

    public function checkStock($prod,$quantite){
         $product = Product::find($prod);
         return $product->stock->quantiteReste < $quantite ? false : true ;
    }

    public static function search($search , $stockStat = null){
        if (is_null($stockStat)){
                    return empty($search) ? static::query()
                                            : static::where('name','LIKE','%'.$search.'%')
                                                    ->orWhere('refProduit','LIKE','%'.$search.'%')
                                                    ->orWhere('description','LIKE','%'.$search.'%');
        } else {
                    return empty($search) ? static::where('outOfStock',$stockStat)
                                          : static::where('name','LIKE','%'.$search.'%')
                                                    ->orWhere('refProduit','LIKE','%'.$search.'%')
                                                    ->orWhere('description','LIKE','%'.$search.'%')
                                                    ->andWhere('outOfStock',$stockStat);
        }

    }

    public static function check_discount($id){
        $product = static::find($id);
        return $product->price->discount == true && ($product->price->dateDebutReduction <= date('Y-m-d') && $product->price->dateFinReduction >= date('Y-m-d')) ? true : false ;
    }

}
