<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;
use App\Product;
use App\Client;
use App\Magazin;
use App\Versement;

class SelectProducts extends Component {

    use WithPagination;
    protected $listeners = ['refresh'=>'render'];

    public $TypeVente = "prixDetails";

    public $search = "";
    public $items = 10 ;

    public $bonVente ;
    public $clientId = 0;
    public $client = null;

    public $selectedProducts;
    public $productToBeSelected ;

    public $prixVenteProduit = 0 ;

    public $qtt = 1;
    public $oldQtt ;
    public $qttChange;
    public $editQuantite = 0 ;

    public $montantTotalBonVente = 0 ;
    // public $montantTotalBonVenteSansRemise = 0 ;
    public $montantNetTotalBonVente = 0 ;
    public $montantNetTotalBonVenteSansRemise = 0 ;
    public $montantGained = 0 ;
    public $montantTotal = 0 ;
    public $remiseExist = false ;
    public $montantVerse = 0 ;

    public function mount(){
        $this->selectedProducts = [];
    }

    public function hydrate(){
        $this->selectedProducts = $this->bonVente->products ;
        // $this->remiseExist = $this->montantTotalBonVente != $this->montantTotalBonVenteSansRemise ? true : false ;

    }

    public function updatedClientId(){
        $this->bonVente->update(['client_id'=>$this->clientId]);
        $this->client = Client::find($this->clientId);
    }

    public function changePrixVente($id){
       $product = Product::find($id);
      //  dd($product->price);
       $product->price->update([
          'prixVenteFinale' => $this->prixVenteProduit ,
       ]);

       $this->emit('refresh');
       $this->emit('closeModel');
    }

    public function addProductToCard(Product $product){
            if($product->checkStock($product->id,$this->qtt) == false){
               $this->qtt = 0 ;
               $this->emit('productoutOfSTock');
            } else {
               if($product->price->prixVenteFinale == 0){

                  $this->montantTotal = $product::check_discount($product->id) ? ($product->price[$this->TypeVente] - (($product->price[$this->TypeVente]*$product->price->remise)/100))*$this->qtt 
                                                                               : $product->price[$this->TypeVente] * $this->qtt;                  
               }else {

                  $this->montantTotal = $product::check_discount($product->id) ? 
                                                                              ($product->price->prixVenteFinale - (($product->price->prixVenteFinale*$product->price->remise)/100)) * $this->qtt 
                                                                              : $product->price->prixVenteFinale * $this->qtt;                  
               }
               
               $this->montantGained = $this->montantTotal - ( $product->price->prixAchat * $this->qtt ) ;

               $prixVente = $product->price->discount == true ? $product->price[$this->TypeVente] - (($product->price[$this->TypeVente]*$product->price->remise)/100) : $product->price[$this->TypeVente] ;
               
               $this->bonVente->products()->attach($product,['quantite'=>$this->qtt,'montantTotal'=>$this->montantTotal,'montantGained'=>$this->montantGained,'prixVente'=>$prixVente]);
               
               $this->bonVente->updateMontantBonVente($this->montantTotal);
               
               $this->bonVente->updateMontantNetBonVente($this->montantGained);
               
               $quantiteReste = ($product->stock->quantiteReste - $this->qtt) < 0 ? 0 : $product->stock->quantiteReste - $this->qtt;
               
               $product->stock->update(['quantiteReste' => $quantiteReste]);
               
               $this->qtt = 1 ;
               $this->montantTotal = 0 ;
               $this->montantGained = 0 ;

               if($this->TypeVente == 'prixFacilite') {
                  $this->montantVerse = ( $this->montantTotal * 30 ) / 100 ;
               }
               
               $this->emit('refresh');
            }


    }

    public function removeProduct(Product $product,$quantite){

            $this->montantTotal = $product->price->discount == true ? ($product->price->prixDetails - (($product->price->prixDetails*$product->price->remise)/100))*$quantite
                                                      : $product->price[$this->TypeVente] * $quantite;
            // $this->montantTotalBonVenteSansRemise -=  $product->price[$this->TypeVente] * $quantite ;
            $this->bonVente->updateMontantBonVente($this->montantTotal,null,'remove');
            $this->bonVente->products()->detach($product);
            
            $this->montantGained = $this->montantTotal - ( $product->price->prixAchat * $this->qtt ) ;

            $this->bonVente->updateMontantNetBonVente($this->montantGained,null,'remove');

            $quantiteReste =  $product->stock->quantiteReste + $quantite ;
            $outOfStock = $product->stock->quantiteReste == 0 ? 1 : 0 ;
            $product->stock()->update([
            'quantiteReste' => $quantiteReste,
            'outOfStock' => $outOfStock,
            ]);

            $this->emit('refresh');


    }

    public function changeQuantite(Product $product){

        // check if the new product stock existe and it's suffessiant 
        if($product->checkStock($product->id,$this->editQuantite) == false){
         $this->qtt = 0 ;
         $this->emit('productoutOfSTock');
         }else{
            $oldMontant = DB::table('bon_vente_product')->select('bon_vente_product.montantTotal')
                                                         ->where('bon_vente_id',$this->bonVente->id)
                                                         ->where('product_id',$product->id)
                                                         ->first();
            
            $oldQuantite = DB::table('bon_vente_product')->select('bon_vente_product.quantite')
                        ->where('bon_vente_id',$this->bonVente->id)
                        ->where('product_id',$product->id)
                        ->first();
            
            $this->bonVente->updateMontantBonVente($oldMontant->montantTotal,null,'remove');
            $this->montantGained = $this->montantTotal - ( $product->price->prixAchat * $this->qtt ) ;

            $this->bonVente->updateMontantNetBonVente($this->montantGained);
            
            if($product->price->prixVenteFinale == 0){
               $this->montantTotal = $product->price->discount == true ? ($product->price->prixDetails - (($product->price->prixDetails*$product->price->remise)/100)) * $this->editQuantite
                                                                        : $product->price[$this->TypeVente] * $this->editQuantite;

            }else{
               $this->montantTotal = $product->price->discount == true ? ($product->price->prixDetails - (($product->price->prixDetails*$product->price->remise)/100)) * $this->editQuantite
                                                                       : $product->price->prixVenteFinale * $this->editQuantite;

            }
            
            $product->bonventes()->sync([$this->bonVente->id => ['quantite' => $this->editQuantite,'montantTotal'=> $this->montantTotal]]);
            
            $this->bonVente->updateMontantBonVente($this->montantTotal);
            
            $this->editQuantite = 1 ;
            
            $this->emit('refresh');
            
            $this->emit('closeModel');
         }
        

    }

    public function montantPayer(){
        $this->bonVente->updateMontantBonVente(null,$this->montantVerse,null);
        
        $this->emit('refresh');
        $this->emit('closeModel');
    }

    // Téléchargé Bon Vente
    public function endVends(){


        // Remeve product from stock
        foreach ($this->bonVente->products as  $product) {
            $quantiteReste =  $product->stock->quantiteReste - $product->pivot->quantite;
            $outOfStock = $product->stock->quantiteReste == 0 ? 1 : 0 ;
            $product->stock()->update([
                'quantiteReste' => $quantiteReste,
                'outOfStock' => $outOfStock,
            ]);
        }

        $typeFacture = $this->TypeVente == 'prixDetails' ? 'details' : ($this->TypeVente == 'prixVenteGros' ? 'gros' : 'facilite') ;

        
        if( $this->TypeVente == 'prixFacilite') {
               Versement::create([
                  'DateVersement' => date('Y-m-d'),
                  'montantVersement' => $this->montantVerse ,
                  'bon_vente_id' => $this->bonVente->id ,
               ]);
         }
        

        $this->bonVente->update(['typeVente'=>$typeFacture]); 

        $magazin = Magazin::first();
        
    
        return redirect()->route('pdf',$this->bonVente->id);

    }

    public function render()
    {
        $products = Product::search($this->search)->with('price')->orderBy('id','ASC')->paginate($this->items,['id','name']);
        $clients = Client::all();
        return view('livewire.select-products')
                        ->with('clients',$clients)
                        ->with('products',$products);
    }
}
