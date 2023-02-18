<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Fournisseur;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class);
    }
}
