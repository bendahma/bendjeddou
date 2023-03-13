<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\BonVente;
use App\Frais;
class StatistiqueController extends Controller
{
    public function index(){

         $topProducts = DB::table('products')
                        ->join('stocks', 'products.id', '=', 'stocks.product_id')
                        ->select('products.*', DB::raw('stocks.quantiteTotal - stocks.quantiteReste as qtt'))
                        ->orderBy('qtt','ASC')
                        ->take(10)
                        ->get();


         $m = DB::table('products')
                        ->join('stocks', 'products.id', '=', 'stocks.product_id')
                        ->select('products.*', DB::raw('stocks.quantiteTotal - stocks.quantiteReste as qtt'))
                        ->orderBy('qtt','ASC')
                        ->take(10)
                        ->get();
        dd($m);
        
         $monthlyEarning = BonVente::sumMontantGlobal(date('Y-m'.'-01'),date('Y-m'.'-31')) - Frais::sumFrais(date('Y-m'.'-01'),date('Y-m'.'-31')) ;
         $trimestreEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-03-31')) - Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-03-31')) ;
         $semestreEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-06-31')) - Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-06-31')) ;
         $anneeEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-12-31')) - Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-12-31')) ;

         $earning = [
            'monthlyEarning' => $monthlyEarning,
            'trimestreEarning' => $trimestreEarning,
            'semestreEarning' => $semestreEarning,
            'anneeEarning' => $anneeEarning,
         ];
                           
         return view('backoffice.statistiques.index')
                     ->with('topProducts',$topProducts)
                     ->with('earning',$earning);
    }
}
