@extends('layouts.adminTemplate')

@section('content')

    <div class="card card-default">
        <div class="card-header mb-0 pb-0">
            <h4  style="font-weight: 700; color:black">Profile du client</h4>
        </div>
        <div class="card-body">
            <form action="" method="">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Code Client</label>
                            <input type="text" class="form-control" readonly value="{{$client->codeClient}}">
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" readonly value="{{$client->firstName}}">
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Prenom</label>
                            <input type="text" class="form-control" readonly value="{{$client->lastName}}">
                            
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    
                    <div class="col">
                        <div class="form-group">
                            <label for="">Adresse</label>
                            <input type="text" class="form-control" readonly value="{{$client->address}}">
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Commune</label>
                            <input type="text" class="form-control" readonly value="{{$client->commune}}">
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Wilaya</label>
                            <input type="text" class="form-control" readonly value="{{$client->wilaya}}">
                            
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Téléphone Fix</label>
                            <input type="text" class="form-control" readonly value="{{$client->phone}}">
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Fax</label>
                            <input type="text" class="form-control" readonly value="{{$client->fax}}">
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="text" class="form-control" readonly value="{{$client->mobile}}">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col">
                      <div class="form-group">
                          <label for="">Activité</label>
                          <input type="text" class="form-control" readonly value="{{isset($client) ? $client->activite : ''}}">
                         
                      </div>
                  </div>
                  <div class="col">
                     <div class="form-group">
                         <label for="">Numero Registre Commerce</label>
                         <input type="text" class="form-control" readonly value="{{$client->NumeroRegistreCommerce}}">
                         
                     </div>
                 </div>
                 
              </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">mode Paiement</label>
                            <input type="text" class="form-control" readonly value=" {{$client->modePaiement}}">
                            
                        </div>
                    </div>
                    @if ($client->modePaiement == 'banque')
                    <div class="col">
                     <div class="form-group">
                         <label for="">Banque</label>
                         <input type="text" class="form-control" readonly value="{{$client->banque}}">
                     </div>
                 </div>
                    @endif
                    
                    <div class="col">
                        <div class="form-group">
                            <label for="">Numero Compte</label>
                            <input type="text" class="form-control" readonly value="{{$client->NumeroCompte}}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection