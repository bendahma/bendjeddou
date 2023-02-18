<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Magazin;
class MagazinController extends Controller
{

    public function profile()
    {
        $magazin = Magazin::first();
        return view('backoffice.magazin.profile')->with('magazin',$magazin);
    }

    public function update(Request $request)
    {
         $magazin = Magazin::first();
         
         $magazin->update([
            'name' => $request->name ,
            'address' => $request->address ,
            'telephone' => $request->telephone ,
            'fax' => $request->fax ,
            'fix' => $request->fix ,
            'MF' => $request->MF ,
            'MF' => $request->MF ,
            'NIS' => $request->NIS ,
            'registreCommerce' => $request->registreCommerce ,
         ]);

         toast('Les informations du magazin mettre à jours avec success','success');
         
         return redirect()->route('magazin.profile');
    }

    public function Frais()
    {
        return view('backoffice.magazin.frais');
    }
}
