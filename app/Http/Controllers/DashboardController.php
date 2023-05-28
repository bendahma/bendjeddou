<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

use Illuminate\Support\Arr;
use App\Stock;
use App\BonVente;
use App\Frais;
use App\Product;
use App\Models\Activation;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $products = Product::with('stock')->get();
        
        $montantOnHold = 0 ;
        $produitsReste = 0 ;
        foreach ($products as $product) {
            $montantOnHold += $product->stock->quantiteReste * $product->price->prixAchat ;
            $produitsReste += $product->stock->quantiteReste ;
        }
        // test git 
        // ----------------Les charges --------------------------------------------------------------------------
        $monthlyFrais = Frais::sumFrais(date('Y-m'.'-01'),date('Y-m'.'-31')) ;
        $trimestreFrais = Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-03-31')) ;
        $semestreFrais = Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-06-31')) ;
        $anneeFrais = Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-12-31')) ;
        // --------------MMONTANT TOTAL ---------------------------------------------------------------------------------------
        $globalMonthlyEarning = BonVente::sumMontantGlobal(date('Y-m'.'-01'),date('Y-m'.'-31'))  ;
        $globalTrimestreEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-03-31'))  ;
        $globalSemestreEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-06-31'))  ;
        $globalAnneeEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-12-31')) ;
        //------------- NET GAINED -----------------------------------------------------------------------------
        $netMonthlyEarning = BonVente::sumMontantNetGlobal(date('Y-m'.'-01'),date('Y-m'.'-31'))  ;
        $netTrimestreEarning = BonVente::sumMontantNetGlobal(date('Y'.'-01-01'),date('Y'.'-03-31'))  ;
        $netSemestreEarning = BonVente::sumMontantNetGlobal(date('Y'.'-01-01'),date('Y'.'-06-31'))  ;
        $netAnneeEarning = BonVente::sumMontantNetGlobal(date('Y'.'-01-01'),date('Y'.'-12-31')) ;
        //------------------------------------------------------------------------------------------------------
        $frais = [
            'monthlyFrais' => $monthlyFrais,
            'trimestreFrais' => $trimestreFrais,
            'semestreFrais' => $semestreFrais,
            'anneeFrais' => $anneeFrais,
        ];

        $netEarning = [
            'netMonthlyEarning' => $netMonthlyEarning,
            'netTrimestreEarning' => $netTrimestreEarning,
            'netSemestreEarning' => $netSemestreEarning,
            'netAnneeEarning' => $netAnneeEarning,
        ];

        $globalEarning = [
            'globalMonthlyEarning' => $globalMonthlyEarning,
            'globalTrimestreEarning' => $globalTrimestreEarning,
            'globalSemestreEarning' => $globalSemestreEarning,
            'globalAnneeEarning' => $globalAnneeEarning,
        ];

        $dailyVente = BonVente::select(DB::raw('DATE(created_at) as date'), 
                                       DB::raw('sum(montantTotal) as montant'), 
                                       DB::raw('sum(montantReste) as montantReste'),
                                       DB::raw('sum(montantNetTotal) as montantNetTotal'))
                              ->groupBy('date')
                              ->orderBy('date','DESC')
                              ->get();
        $totalDette = BonVente::select(DB::raw('sum(montantReste) as montantReste'))->first()->montantReste;
      

         return view('backoffice.statistiques.index')
                  ->with('frais',$frais)
                  ->with('globalEarning',$globalEarning)
                  ->with('netEarning',$netEarning)
                  ->with('montantOnHold',$montantOnHold)
                  ->with('produitsReste',$produitsReste)
                  ->with('dailyVente',$dailyVente)
                  ->with('totalDette',$totalDette);

    }
}
