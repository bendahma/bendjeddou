<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Frais extends Model
{
    use HasFactory;

    protected $guarded = [] ;



    public static function sumFrais($dateDebut,$dateFin){
         return DB::table('frais')->whereBetween('dateFrais', [$dateDebut, $dateFin])
                                 ->selectRaw('sum(montant) as montant')
                                 ->first()
                                 ->montant; 

    }
}
