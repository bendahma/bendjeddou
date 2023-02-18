<?php

namespace App\Http\Controllers;

use App\stock;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Product;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backoffice.stock.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddQuantite(Request $request,$id)
    {
        $prod = Product::find($id);
        $quantiteReste = $prod->stock->quantiteReste +  $request->quantite ;
        $quantiteTotal = $prod->stock->quantiteTotal + $request->quantite ;
        $prod->stock->update([
            'quantite' => $request->quantite,
            'fillDate' => $request->date,
            'quantiteReste'=>$quantiteReste,
            'quantiteTotal' => $quantiteTotal,
            'outOfStock' => false,
        ]);
        toast('Nouveau stockage ajouté avec success','success');
        return redirect(route('stock.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(stock $stock)
    {
        //
    }
}
