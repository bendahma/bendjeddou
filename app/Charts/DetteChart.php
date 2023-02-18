<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\BonVente;
use DB;
class DetteChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

      $veteReste = BonVente::select(DB::raw('DATE(created_at) as date'), DB::raw('sum(montantReste) as montantReste'))
                     ->whereBetween('created_at',[date('Y-m').'-01 00:00:00',date('Y-m').'-31 23:59:59'])
                     ->groupBy('date')
                     ->pluck('montantReste','date');

        return Chartisan::build()
                     ->labels($veteReste->keys()->toArray())
                     ->dataset('Dette', $veteReste->values()->toArray());
           
    }
}