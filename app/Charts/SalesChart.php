<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\BonVente;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Arr;

class SalesChart extends BaseChart
{

   public $dateDebut;
   public $dateFin;

    public function handler(Request $request): Chartisan
    {

      $dateDebut = $request->dateDebut . ' 00:00:00';
      $dateFin = $request->dateFin . ' 23:59:59';

        $vente = BonVente::select(DB::raw('DATE(created_at) as date'), DB::raw('sum(montantTotal) as montant'))
                              ->whereBetween('created_at',[$dateDebut,$dateFin])
                              ->groupBy('date')
                              ->pluck('montant','date');

        return Chartisan::build()
                     ->labels($vente->keys()->toArray())
                     ->dataset('Revenu', $vente->values()->toArray());
    }
}