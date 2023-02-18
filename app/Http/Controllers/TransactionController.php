<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Fournisseur ;
use App\Transaction ;
class TransactionController extends Controller
{
    public function List(Fournisseur $fournisseur){
        $transactions = Transaction::where('fournisseur_id',$fournisseur->id)->get();
        return view('backoffice.transaction.index')
                    ->with('fournisseur',$fournisseur)
                    ->with('transactions',$transactions);
    }

    public function create(Fournisseur $fournisseur){
        return view('backoffice.transaction.create')
                            ->with('fournisseur',$fournisseur);
    }

    public function store(Request $request , Fournisseur $fournisseur){
        Transaction::create($request->all());
        toast('La transaction ajouté avec success','success');
        return redirect()->route('transaction.list',$fournisseur->id);
    }

    public function show(Fournisseur $fournisseur,Transaction $transaction){
        //
    }

    public function edit(Fournisseur $fournisseur,Transaction $transaction){
        return view('backoffice.transaction.create')
                    ->with('fournisseur',$fournisseur)
                    ->with('transaction',$transaction);
    }

    public function update(Request $request,Fournisseur $fournisseur,Transaction $transaction){
            $transaction->update($request->only(['numeroFacture','dateFacture','montantTotal','montantPayer','montantReste','fournisseur_id']));
            toast('La mise  jours terminé avec success','success');
            return redirect()->route('transaction.list',$fournisseur->id);
    }

    public function supprime(Transaction $transaction){
            $fournisseur = Fournisseur::find($transaction->fournisseur_id);
            $transaction->delete();
            Alert::toast('La transaction supprime avec success','success');
            return redirect()->route('transaction.list',$fournisseur->id);
    }

    public function destroy(Transaction $transaction){
        //
    }
}
