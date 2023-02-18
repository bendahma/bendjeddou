<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Transaction;

class Fournisseur extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function credit(){

        return Transaction::where('fournisseur_id',$this->id)->sum('montantReste');

    }
}
