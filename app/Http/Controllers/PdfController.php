<?php

namespace App\Http\Controllers;
require_once('ChiffresEnLettres.php');
use Illuminate\Http\Request;

use App\BonVente;
use App\Magazin;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
    public function generatePdf(BonVente $bonVente){
        $bonVente->load(['client','products']);
        $magazin = Magazin::first();
      
        $ChiffreEnLettre = new ChiffreEnLettres();
        $motantLettre= strtoupper($ChiffreEnLettre->Conversion($bonVente->montantTotal)) ;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf.report',[
            'bonVente'=>$bonVente,
            'motantLettre'=>$motantLettre,
            'magazin' => $magazin,
        ]));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        return $pdf->stream('report.pdf');
       
    }
}
