<?php

namespace App\Http\Controllers;

require_once('ChiffresEnLettres.php');

use Illuminate\Http\Request;
use App\Client;
use App\Product;
use App\BonVente;
use App\Facilite;
use App\Versement;
use App\Magazin;
use App\Price;

class VenteController extends Controller
{

    public function VenteGros(){
        $bonVente = BonVente::create();
        $products = Product::all();
        Price::where('prixVenteFinale','!=',0)->update(['prixVenteFinale'=>'0']) ;
        return view('backoffice.ventes.gros.selectProducts')
                                    ->with('products',$products)
                                    ->with('bonVente',$bonVente);
    }

    public function selectProduct(Client $client){

        $bonVente = BonVente::create([
            'client_id' => $client->id,
        ]);

        $products = Product::all();

        return view('backoffice.ventes.gros.selectProducts')
                                    ->with('products',$products)
                                    ->with('bonVente',$bonVente);
    }

    public function facilite(){
         $bonVenteParFacilite = BonVente::where('typeVente','facilite')->with('client')->orderBy('created_at','DESC')->get();
         return view('backoffice.ventes.facilite.index')->with('bonVenteParFacilite',$bonVenteParFacilite);
      }

   public function versement(BonVente $bonVente){
         return view('backoffice.ventes.facilite.details')->with('bonVente',$bonVente) ;
   }

   public function versementMontant(BonVente $bonVente,Request $request){

         Versement::create([
            'DateVersement' => date('Y-m-d'),
            'montantVersement' => $request->montantVerse,
            'bon_vente_id' => $bonVente->id ,
         ]);

         $montantVerse = $bonVente->montantPayer + $request->montantVerse ;
         $montantReste = $bonVente->montantReste - $request->montantVerse ;
         
         $bonVente->update([
               'montantPayer' => $montantVerse ,
               'montantReste' => $montantReste ,
         ]);

         toast('Versement sauvgardé avec success','success');

         return redirect()->route('facilite.index');
   }

   public function telechargerBonVente(BonVente $bonVente){


      $template = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(__DIR__)) . '\templates\facture.docx');


      // Magazin
      $magazin = Magazin::first();
      $template->setValue('address', $magazin->address );
      $template->setValue('commune', $magazin->commune );
      $template->setValue('telephone', $magazin->telephone );
      $template->setValue('fix', $magazin->fix );
      $template->setValue('fax', $magazin->fax );
      // Client
      $template->setValue('codeClient',$bonVente->client->id );
      $template->setValue('clinetName',$bonVente->client->firstName . ' ' . $bonVente->client->lastName);
      $template->setValue('clientAdresse',$bonVente->client->address . ' ' . $bonVente->client->commune . ' ' . $bonVente->client->wilaya);
      $template->setValue('clientActivite',$bonVente->client->activite ?? '');
      $output = 'facture '. $bonVente->client->firstName . ' ' . $bonVente->client->lastName . ' '. date('Y-m-d') . '.docx';
      
      //Section Bonvente
      $template->setValue('numeroBon',$bonVente->id);
      $template->setValue('dateBon',$bonVente->get_created_at_regular($bonVente->created_at));


      // Fill products info into facture.docx
      $i=1;
      $nbrProducts = $bonVente->products()->count();
      $template->cloneRow('predRef', $nbrProducts);
      foreach ($bonVente->products as $product) {
          $PU = floatval($product->pivot->montantTotal) / floatval($product->pivot->quantite) ;
          $template->setValue('predRef#'.$i,  $product->refProduit ?? '');
          $template->setValue('productName#'.$i,  $product->name);
          $template->setValue('Qtt#'.$i,  $product->pivot->quantite );
          $template->setValue('prix#'.$i, number_format($PU,2,'.',' ') );
          $template->setValue('montant#'.$i, number_format($product->pivot->montantTotal,2,'.',' ') );
          $i=$i+1;
      }
      //



      // Montant du Bon de vente

      $montantTVA = ($bonVente->montantTotal*19)/100;


      $template->setValue('motantTotal',  number_format($bonVente->montantTotal,2,'.',' '));
      $template->setValue('motantTVA',  number_format($montantTVA,2,'.',' '));
      $template->setValue('montatGlobal',  number_format($bonVente->montantGlobal,2,'.',' '));

      // montant en lettre
      $ChiffreEnLettre = new ChiffreEnLettres();
      $ChiffreEnLettreOutput= $ChiffreEnLettre->Conversion($bonVente->montantTotal);
      $template->setValue('montantPayer',  number_format($bonVente->montantPayer,2,'.',' '));
      $template->setValue('montantReste',  number_format($bonVente->montantReste,2,'.',' '));
      $template->setValue('motantLettre',  strtoupper($ChiffreEnLettreOutput));

      $output = 'facture.docx';

      ob_end_clean();
      ob_start();
      $template->saveAs(storage_path($output));
      return response()->download(storage_path($output));
   }



}
