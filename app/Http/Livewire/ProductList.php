<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;

class ProductList extends Component
{
    public $items = 10 ;
    public $search = "" ;

    public function render()
    {
        $products = Product::search($this->search)->with(['category:id,name','marque:id,name'])->orderBy('id','ASC')->paginate($this->items);

        return view('livewire.product-list')->with('products',$products);
    }
}
