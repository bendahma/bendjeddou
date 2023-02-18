<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\BonVente ;
use App\Client ;

class ListBonVente extends Component
{

    use WithPagination;

    public $search = "";
    public $dateBon = "" ;
    public $perPage = 10 ;
    public $client ;
    public $paiement = "" ;


    public function videRecherche(){
        $this->search = "" ;
        $this->dateBon = "" ;
        $this->perPage = 10 ;
        $this->client = "" ;
        $this->paiement = "" ;
    }

    public function render()
    {
        $bon = BonVente::search($this->search,$this->client,$this->dateBon,$this->paiement)->orderby('created_at','DESC')->paginate($this->perPage);
        $clients = Client::all();
        return view('livewire.list-bon-vente')
                ->with('bon',$bon)
                ->with('clients',$clients);
    }
}
