<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\BonVente;

class Versement extends Model
{
    use HasFactory;


    protected $guarded = [] ;

    public function bonVente(){
       return $this->belongsTo(BonVente::class);
    }
}
