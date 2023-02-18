<?php

namespace App\Http\Controllers;

use App\Marque;
use App\Product;
use Illuminate\Http\Request;
use Alert;

class MarqueController extends Controller
{

    public function index()
    {
        return view('backoffice.marque.index')->with('marques',Marque::all());
    }

    public function create()
    {
        return view('backoffice.marque.create');
    }

    public function store(Request $request)
    {
        $marque = Marque::where('name',$request->name)->count();
        if($marque > 0) {
            toast('La marque ' . $request->name . ' déja existe','error');
        }else {
            Marque::create([
               'name'=>$request->name,
            ]);
            toast('Une nouvelle marque ajouté avec success','success');
        }
        
        return redirect(route('marque.index'));
    }

    public function edit(Marque $marque)
    {
        return view('backoffice.marque.create')->with('marque',$marque);
    }

    public function update(Request $request, Marque $marque)
    {
        $imageUrl = $request->has('image') ? $request->image->store('upload') : $marque->image ;
        $marque->update([
            'name'=>$request->name,
            'image'=>$imageUrl,
        ]);
        toast('une marque à été mettre a jours avec success','success');
        return redirect(route('marque.index'));
    }

    public function supprime(Marque $marque)
    {
        $marque->delete();
        toast('une marque à été supprime avec success','success');
        return redirect(route('marque.index'));

    }

    public function products(Marque $marque){
        $products = Product::whereHas('marque',function($q) use ($marque){
            $q->where('id',$marque->id);
        })->with(['marque','category'])->get();
        return view('backoffice.marque.products')->with('products',$products);
    }
}
