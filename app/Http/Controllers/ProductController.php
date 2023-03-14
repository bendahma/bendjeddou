<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Marque;
use App\Price;
use App\Stock;

use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductRequest;
use Alert;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class ProductController extends Controller
{

    public function index()
    {
        return view('backoffice.product.index');
    }

    public function create()
    {

        $categories = Category::all(['id','name']);
        
        $marques = Marque::all(['id','name']);

        if($categories->isEmpty()){
            Alert::warning('Ajouté une catégorie avant saisie les produits');
            return redirect(route('category.create'));
        }
        if($marques->isEmpty()){
            Alert::warning('Ajouté une marque avant saisie les produits');
            return redirect(route('marque.create'));
        }

        return view('backoffice.product.add')
                                ->with('categories',$categories)
                                ->with('marques',$marques);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'prixAchat' => 'required|numeric',
            'prixVenteGros' => 'required|numeric',
            'prixDetails' => 'required|numeric',
            'prixFacilite' => 'required|numeric',
        ]);

        $count = Product::where('refProduit',$request->refProduit)->count();

        if($count > 0){
           toast('La réféérence ' . $request->refProduit .' déjà existe','error');
            return redirect()->route('product.index');
        }

        $product = Product::create([
            'refProduit' => $request->refProduit,
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'marque_id'=>$request->marque_id,
        ]);

        Price::create([
            'prixAchat' => $request->prixAchat,
            'prixVenteGros' => $request->prixVenteGros,
            'prixDetails' => $request->prixDetails,
            'prixFacilite' => $request->prixFacilite,
            'product_id' => $product->id,
        ]);

        Stock::create([
            'product_id' => $product->id,
            'quantite' => $request->quantiteStock,
            'quantiteReste' => $request->quantiteStock,
            'fillDate' => date('Y-m-d'),
            'quantiteTotal' => $request->quantiteStock,
        ]);

        toast('un nouveau produit ajouté avec success','success');

        return redirect()->route('product.index');


    }

    public function endDiscount (Product $product)
    {
        $price = Price::where('product_id',$product->id);

        $price->update([
            'discount' => false ,
            'remise' => 0,
            'dateDebutReduction' => null ,
            'dateFinReduction' => null ,
        ]);

        toast('Périod de remise de prix terminé','warning');

        return redirect(route('product.remise'));
    }

    public function edit($id)
    {
        $product = Product::withTrashed()->where('id',$id)->with(['category','marque','price'])->first();
        $categories = Category::all(['id','name']);
        $marques = Marque::all(['id','name']);

        return view('backoffice.product.add')
                            ->with('product',$product)
                            ->with('categories',$categories)
                            ->with('marques',$marques);
    }

    public function update(Request $request, $id)
    {
        $product = Product::withTrashed()->where('id',$id)->first();

        $price = Price::where('product_id',$product->id)->first();

        $product->update([
            'refProduit' => $request->refProduit,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'marque_id' => $request->marque_id,

        ]);

        $price->update([
            'prixAchat' => $request->prixAchat,
            'prixVenteGros' => $request->prixVenteGros,
            'prixDetails' => $request->prixDetails,
            'prixFacilite' => $request->prixFacilite,
            'product_id' => $product->id,
        ]);

        toast('le produit modifier avec success','success');

        return redirect(route('product.index'));
    }

    public function Remove(Product $product){
        $product->delete();
        toast('Produit suspendu ','success');
        return back();
    }

    public function Removed(){
        $products = Product::onlyTrashed()->with(['category:id,name','marque:id,name'])->get();
        return view('backoffice.product.removed')->with('products',$products);
    }

    public function Restore($id){
        $product = Product::withTrashed()->where('id',$id)->restore();

        toast('Produit récupérer avec success ','success');

        return redirect()->route('product.index');

    }

    public function Delete($id){
        $product = Product::withTrashed()->where('id',$id)->forceDelete();
        $products = Product::all();
        $categories = Category::all();
        toast('Produit supprime avec success','success');
        return view('backoffice.product.index')
                ->with('products',$products)
                ->with('category',$categories);

    }

    public function Remise(){
        $product_discount = Product::whereHas('price',function($q){
            $q->where('discount',1);
        })->get();
        
        foreach ($product_discount as $product) {
           if($product->dateFinReduction > date('Y-m-d')){
              $product->price->update([
                  'discount' => false,
                  'remise' => 0,
                  'dateDebutReduction' => null,
                  'dateFinReduction' => null,
              ]);
           }
        }
        $products = Product::with(['price'])->get();
        return view('backoffice.product.remise')->with('products',$products);
    }

    public function RemisePrix(Request $request,Product $product){

        $price = Price::where('product_id',$product->id)->first();

        $prixReduction = $price->prixVenteGros - ( $price->prixVenteGros * $request->remise ) / 100;

        if($prixReduction <= $price->prixAchat) {
            Alert::warning('Attention','La nouvelle prix détails est inferieur ou egal à le prix d\'achat');
            return back();
        }

        $price->update([
            'discount' => true,
            'remise' => $request->remise,
            'dateDebutReduction' => $request->dateDebutReduction,
            'dateFinReduction' => $request->dateFinReduction,
        ]);

        toast('La remise ajouté avec success','success');

        return redirect(route('product.index'));
    }
}
