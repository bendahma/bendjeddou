<?php

namespace App\Http\Controllers;

use App\Models\Activation;
use App\Http\Requests\StoreActivationRequest;
use App\Http\Requests\UpdateActivationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ActivationController extends Controller
{
    public function activate(Request $request){    

    }
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
     * @param  \App\Http\Requests\StoreActivationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function show(Activation $activation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function edit(Activation $activation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActivationRequest  $request
     * @param  \App\Models\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivationRequest $request, Activation $activation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activation $activation)
    {
        //
    }
}
