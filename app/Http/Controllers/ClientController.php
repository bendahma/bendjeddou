<?php

namespace App\Http\Controllers;

use App\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('backoffice.clients.index')
                            ->with('clients',$clients);
    }

    public function create()
    {
        return view('backoffice.clients.create');
    }

    public function store(Request $request)
    {
        Client::create($request->all());
        toast('Nouveau Client Ajouté Avec Success','Success');
        return redirect()->route('client.index');
    }

    public function show(Client $client)
    {
        return view('backoffice.clients.details')->with('client',$client);
    }

    public function edit(Client $client)
    {
        return view('backoffice.clients.create')->with('client',$client);
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        toast('Les informations du client sont mettre à jours avec Success','Success');
        return redirect()->route('client.index');
    }

    public function Supprime(Client $client)
    {
        $client->delete();
        toast('Le client a été supprimé avec succès','Success');
        return redirect()->route('client.index');
    }
}
