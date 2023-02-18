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
use App\Models\Activation;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $monthlyEarning = BonVente::sumMontantGlobal(date('Y-m'.'-01'),date('Y-m'.'-31')) - Frais::sumFrais(date('Y-m'.'-01'),date('Y-m'.'-31')) ;
        $trimestreEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-03-31')) - Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-03-31')) ;
        $semestreEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-06-31')) - Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-06-31')) ;
        $anneeEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-12-31')) - Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-12-31')) ;
        // ----------------------
        $netMonthlyEarning = BonVente::sumMontantGlobal(date('Y-m'.'-01'),date('Y-m'.'-31'))  ;
        $netTrimestreEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-03-31'))  ;
        $netSemestreEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-06-31'))  ;
        $netAnneeEarning = BonVente::sumMontantGlobal(date('Y'.'-01-01'),date('Y'.'-12-31')) ;

        $earning = [
            'monthlyEarning' => $monthlyEarning,
            'trimestreEarning' => $trimestreEarning,
            'semestreEarning' => $semestreEarning,
            'anneeEarning' => $anneeEarning,
        ];

        $netEarning = [
            'netMonthlyEarning' => $netMonthlyEarning,
            'netTrimestreEarning' => $netTrimestreEarning,
            'netSemestreEarning' => $netSemestreEarning,
            'netAnneeEarning' => $netAnneeEarning,
        ];

        $dailyVente = BonVente::select(DB::raw('DATE(created_at) as date'), DB::raw('sum(montantTotal) as montant'), DB::raw('sum(montantReste) as montantReste'))
                              ->groupBy('date')
                              ->get();

         return view('backoffice.statistiques.index')
                  ->with('earning',$earning)
                  ->with('netEarning',$netEarning)
                  ->with('dailyVente',$dailyVente);

    }

    public function notActivated(){
       return view('backoffice.notActivated') ;
    }
}
