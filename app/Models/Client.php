<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use App\User;
use App\BonVente;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bonventes(){
        return $this->hasMany(BonVente::class);
    }

    public function getFullName(){
        return $this->firstName . ' ' . $this->lastName ;
    }

    public function get_client_global_dette(){
       return BonVente::where('client_id',$this->id)->sum('montantReste');
    }
}
