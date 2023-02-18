<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\BonVente;
use App\Bon_Vente_Product;
class MontantBonVente extends Component
{

    protected $listeners = ['refresh'=>'render'];

    public $bonVente ;

    public function render()
    {
        return view('livewire.montant-bon-vente');
    }
}
