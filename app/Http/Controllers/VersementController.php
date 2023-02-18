<?php

namespace App\Http\Controllers;

use App\Models\Versement;
use App\Http\Requests\StoreVersementRequest;
use App\Http\Requests\UpdateVersementRequest;

class VersementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVersementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVersementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Versement  $versement
     * @return \Illuminate\Http\Response
     */
    public function show(Versement $versement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Versement  $versement
     * @return \Illuminate\Http\Response
     */
    public function edit(Versement $versement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVersementRequest  $request
     * @param  \App\Models\Versement  $versement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVersementRequest $request, Versement $versement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Versement  $versement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Versement $versement)
    {
        //
    }
}
