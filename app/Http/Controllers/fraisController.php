<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Frais;

class fraisController extends Controller
{

    public function index()
    {
        $frais = Frais::all();


        $montant = [
           'mois' => Frais::sumFrais(date('Y-m'.'-01 00:00:00'),date('Y-m'.'-31 23:59:59')) ,
           'tri' => Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-03-31')) ,
           'semestre' => Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-06-30')),
           'annee' => Frais::sumFrais(date('Y'.'-01-01'),date('Y'.'-12-31')),
        ] ;

        return view('backoffice.frais.index')
                        ->with('frais',$frais)
                        ->with('montant',$montant);
    }


    public function create()
    {
        return view('backoffice.frais.create');
    }


    public function store(Request $request)
    {
        Frais::create($request->all());
        toast('La charge à été ajouté avec success','success');
        return redirect()->route('frais.index');
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $frais = Frais::find($id);
         return view('backoffice.frais.create')->with('frais',$frais);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $frais = Frais::find($id);
        $frais->update($request->only(['dateFrais','typeFrais','autreFraisType','montant']));
        toast('La charge modifier avec success','success');
        return redirect()->route('frais.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function supprime($id)
    {
        $frais = Frais::find($id)->delete();

        toast('La charge supprime avec success','success');
        return redirect()->route('frais.index');
    }
}
