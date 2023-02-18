<?php

namespace App\Http\Controllers;

use App\BonVente;
use App\Client;
use App\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

require_once('ChiffresEnLettres.php');

class BonVenteController extends Controller
{
    public function index()
    {
        $factures = BonVente::where(['montantTotal' => 0.00,'montantPayer' => 0.00, 'montantReste' => 0.00])->delete();

        return view('backoffice.bonVente.index');
    }

    public function details(BonVente $bonVente){
        $sumQtt = 0 ;
        foreach ($bonVente->products as $v) {
            $sumQtt += $v->pivot->quantite ;
        }

        return view('backoffice.bonVente.details')
                            ->with('bonVente',$bonVente)
                            ->with('sumQtt',$sumQtt);
    }

   public function versement(Request $request,$bon){
        $bonVente = BonVente::find($bon);
        $montantPayer = $bonVente->montantPayer + $request->montantVerse ;
        $montantReste = $bonVente->montantTotal - $montantPayer ;
        $bonVente->update([
            'montantPayer' => $montantPayer ,
            'montantReste' => $montantReste ,
        ]) ;

        toast('Montant verse ajouté avec success','Success');
        return redirect()->back();
   }

   public function removeProduct($bonVente,$product){
       $bon = BonVente::find($bonVente);
       $prod = Product::find($product);
       $productRemoved =  $bon->products()->find($prod->id)->pivot;
       $montantProductRemoved = $productRemoved->montantTotal ;
       $newMontantTotal = $bon->montantTotal - $montantProductRemoved ;
       $newMontantReste = $bon->montantReste + ($newMontantTotal - $bon->montantPayer) ;

       $bon->update([
        'montantTotal' => $newMontantTotal,
        'montantPayer' => $newMontantTotal,
        'montantReste' => $newMontantReste,
       ]);

       $productRemoved->delete();

        // add the removed quantite to the product stock
        $quantiteReste =  $prod->stock->quantiteReste + $productRemoved->quantite ;
        $outOfStock = $prod->stock->quantiteReste == 0 ? 1 : 0 ;
        $prod->stock()->update([
            'quantiteReste' => $quantiteReste,
            'outOfStock' => $outOfStock,
        ]);

       toast('Produit supprimé avec success','success');
       return back();
   }

   public function editQuantite(Request $request,$bonVente,$product){

        $bon = BonVente::find($bonVente);
        $prod = Product::find($product);
        $productEdited =  $bon->products()->find($prod->id)->pivot;
        $newMontant = $productEdited->prixVente * $request->quantite ;
        $gained = $newMontant - ($prod->price->prixAchat * $request->quantite) ;
        $prod->bonventes()->sync([$bon->id => ['quantite' => $request->quantite,'montantTotal'=> $newMontant,'montantGained'=>$gained]]);
        $montantDiff = $productEdited->montantTotal - $newMontant ;
        $montantDiff > 0 ? $bon->updateMontantBonVente($montantDiff * -1 , null , null) : $bon->updateMontantBonVente($montantDiff , null , 'remove') ;
        toast('Quantité du produit Modifier Avec Success','success');
        return back();

   }


    public function returnedList(){
        $clients= Client::all();
        return view('backoffice.bonVente.returnedList')
                        ->with('bon',BonVente::all())
                        ->with('clients',$clients);
    }

    public function removeBonVente($bon){
        $bonVente = BonVente::find($bon);
        foreach ($bonVente->products as $product) {
            $quantiteReste =  $product->stock->quantiteReste + $product->pivot->quantite ;
            $outOfStock = $product->stock->quantiteReste == 0 ? 1 : 0 ;
            $product->stock()->update(['quantiteReste' => $quantiteReste,'outOfStock' => $outOfStock]);
        }
        $bonVente->delete();
        toast('Le bon de vente à été supprime avec success','Success');
        return redirect()->route('bonVente.index');

    }

    public function Telecharge(bonVente $bonVente){
         // Download bon vente
         $client = Client::find($bonVente->client_id);
         $template = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(__DIR__)) . '\templates\facture.docx');
         $output = 'facture '. $client->firstName . ' ' . $client->lastName .'.docx';

         // Section Client
         $template->setValue('codeClient',$client->codeClient );
         $template->setValue('clinetName',$client->firstName . ' ' . $client->lastName);
         $template->setValue('clientAdresse',$client->address . ' ' . $client->commune . ' ' . $client->wilaya);
         $template->setValue('clientActivite',$client->activite ?? '');
         $template->setValue('NC',0);
         $template->setValue('AI',0);
         $template->setValue('MF',0);

         //Section Bonvente
         $template->setValue('numeroBon',$bonVente->id);
         $template->setValue('dateBon',$bonVente->get_created_at($bonVente->created_at));


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

         // Montant du Bon de vente
         $montantTVA = ($bonVente->montantTotal*19)/100;


         $template->setValue('motantTotal',  number_format($bonVente->montantTotal,2,'.',' '));
         $template->setValue('motantTVA',  number_format($montantTVA,2,'.',' '));
         $template->setValue('montatGlobal',  number_format($bonVente->montantGlobal,2,'.',' '));

         // montant en lettre
         $ChiffreEnLettre = new ChiffreEnLettres();
         $ChiffreEnLettreOutput= $ChiffreEnLettre->Conversion($this->bonVente->montantGlobal);
         $template->setValue('montantPayer',  number_format($this->bonVente->montantPayer,2,'.',' '));
         $template->setValue('montantReste',  number_format($this->bonVente->montantReste,2,'.',' '));
         $template->setValue('motantLettre',  strtoupper($ChiffreEnLettreOutput));

         ob_end_clean();
         ob_start();
         $template->saveAs(storage_path($output));
         return response()->download(storage_path($output));
    }

    public function Rembourse($id){
        $bonvente = BonVente::find($id);
        $remb = $bonvente->montantReste * -1;
        $mPayer =  $bonvente->montantPayer - $remb;
        $mReste =  $bonvente->montantReste + $remb;
        $bonvente->update([
            'montantPayer' => $mPayer ,
            'montantReste' => $mReste ,
        ]);
        return redirect()->back();
    }

}
