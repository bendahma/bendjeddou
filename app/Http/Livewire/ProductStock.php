<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Product;
use App\Stock;

class ProductStock extends Component
{

    use WithPagination;

    protected $listeners = ['refresh'=>'$refresh'];

    public $search = "";
    public $items = 10 ;
    public $stockStat = null ;
    public function render()
    {
        $products = Product::search($this->search,$this->stockStat)->orderBy('id','ASC')->paginate($this->items);
        return view('livewire.product-stock')->with('products',$products);
    }
}
