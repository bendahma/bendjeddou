<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use App\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        return view('backoffice.employe.index')->with('employes',Employe::all());
    }

    public function create()
    {
         return view('backoffice.employe.create');
    }

    public function store(Request $request)
    {
         Employe::create([
            'nom' => $request->nom ,
            'prenom' => $request->prenom ,
            'address' => $request->address ,
            'telephone' => $request->telephone ,
            'salaire' => $request->salaire ,
            'assure' => $request->assure ,
         ]);
         toast('Nouvelle employee ajouté avec success','Success');
         return redirect()->route('employee.index');
    }

    public function show(Employe $employe)
    {
        //
    }

    public function edit($employe)
    {
         $e = Employe::find($employe);
         return view('backoffice.employe.create')->with('employe',$e);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employe)
    {
         $e = Employe::find($employe);
         $e->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'salaire' => $request->salaire,
            'assure' => $request->assure,
            ]);
         toast('Employee mettre à jours avec success','Success');
         return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function Supprime($employe)
    {
        $e = Employe::find($employe)->delete();
        toast('Employee supprime avec success','Success');
        return redirect()->route('employee.index');
    }
}
