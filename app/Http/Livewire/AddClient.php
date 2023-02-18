<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Client;

class AddClient extends Component
{

    public $codeClient ;
    public $nomClient ;
    public $prenomClient ;

    // protected $listeners = ['refresh'=>'render'];

    public function addClient(){
        Client::create([
            'firstName' => $this->nomClient ,
            'lastName' => $this->prenomClient ,
        ]);

        $this->emit('refresh');

        $this->emit('closeModel');
    }

    public function render()
    {
        return view('livewire.add-client');
    }
}
