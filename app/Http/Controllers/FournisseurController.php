<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view('backoffice.fournisseurs.index')->with('fournisseurs',$fournisseurs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.fournisseurs.create');
    }

    public function store(Request $request)
    {
        Fournisseur::create($request->all());
        toast('Un nouveau fournisseur ajouté avec success','success');
        return redirect()->route('fournisseur.index');
    }


    public function show($fournisseur)
    {
       //
    }


    public function edit(Fournisseur $fournisseur)
    {
        return view('backoffice.fournisseurs.create')->with('fournisseur',$fournisseur);
    }

    public function update(Request $request, Fournisseur $fournisseur)
    {
        $fournisseur->update($request->only(['codeFournisseur','name','credit','telephone']));
        toast('Le fournisseur à été mettre a jour avec success','Success');
        return redirect()->route('fournisseur.index');
    }

    public function Supprime(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        toast('Le fournisseur à été supprime avec success','success');
        return redirect()->route('fournisseur.index');
    }
}
