<div>

    <div class="row">
        <div class="col-lg-7">

           @livewire('montant-bon-vente', ['bonVente' => $bonVente], key($bonVente->id))

        </div>
        <div class="col-lg-5">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-light border border-success shadow-sm">
                            <div class="row">
                                <div class="col-lg-3">
                                <h5 class="font-weight-bold text-dark "><i class="far fa-list-alt"></i> N° Bon :</h5>
                                </div>
                                <div class="col">
                                    <h5 class="font-weight-bold text-dark"> {{$bonVente->id}} </h5>
                                </div>
                                <div class="col-lg-3">
                                <h5 class="font-weight-bold text-dark"><i class="fas fa-calendar-alt"></i> Date :</h5>
                                </div>
                                <div class="col">
                                    <h5 class="font-weight-bold text-dark float-left"> {{date('d/m/Y')}} </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-light border border-success shadow">
                            <div class="row">
                                <div class="col-lg-3">
                                <h5 class="font-weight-bold text-dark pt-1"><i class="fas fa-user-alt"></i> Client : </h5>
                                </div>
                                <div class="col">
                                    <h5 class="font-weight-bold text-dark">
                                       @if ($clients->count() > 0)
                                            <div class="row">
                                                <div class="col">
                                                    <select class="custom-select" id="clientList" wire:model="client_id">
                                                        <option>Choisi un client</option>
                                                        @foreach ($clients as $client)
                                                        <option value="{{$client->id}}" >{{$client->firstName . ' ' . $client->lastName}}</option>
                                                        @endforeach
                                                  </select>
                                                </div>
                                                <div class="col-lg-3">@livewire('add-client')</div>
                                            </div>

                                       @else
                                       <div class="d-flex text-danger">
                                           <span class="pt-1"> Aucun client trouvé</span> <span class="ml-3">@livewire('add-client')</span>
                                       </div>
                                       @endif

                                    </h5>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-light border border-success shadow">
                            <div class="row">
                               <div class="col">
                                   <button class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#versement"><i class="fas fa-money-bill-wave"></i> Versement</button>
                                   <div wire:ignore.self class="modal fade" id="versement" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editQuantiteLabel">Montant verse</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true close-btn">×</span>
                                                </button>
                                            </div>
                                        <div class="modal-body">
                                                <form>
                                                    <div class="row my-auto">
                                                        <div class="col-lg-3 mt-2">
                                                            <label for="" class="my-auto">Montant Verse</label>
                                                        </div>
                                                        <div class="col">
                                                            <input type="integer" class="form-control" id="" wire:model="montantVerse">
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" wire:click.prevent="montantPayer({{$bonVente->id}})" class="btn btn-outline-success close-modal">Confirmé</button>
                                                <button type="button" class="btn btn-danger close-btn" data-dismiss="modal">Ferme</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                               </div>
                               <div class="col">
                                   <button class="btn btn-warning btn-block" wire:click="endVends({{$bonVente->id}})"><i class="fas fa-cloud-download-alt"></i> Téléchargé Bon Vente</button>
                               </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>

    <div class="row">
       <div class="col-lg-7">
         <div class="card shadow-lg rounded">
            <div class="card-header bg-info text-light">
                <div class="d-sm-flex align-items-center justify-content-between">
                        <h5 class="">Vente en :</h5>
                </div>
            </div>
            <div class="card-body">
               <select name="" id="" wire:model="TypeVente" class="">
                  <option value="prixDetails">Vente en Détials</option>
                  <option value="prixVenteGros">Vente en Gros</option>
                  <option value="prixFacilite">Vente en Fatilité</option>
               </select>
            </div>
       </div>
    </div></div>

    <div class="row mt-2">
        <div class="col-lg-7">
            <div class="card card-success">
                <div class="card-header bg-dark text-light">
                    <div class="d-sm-flex align-items-center justify-content-between">
                            <h4 class=""><i class="fas fa-list"></i> Listes Des Produits</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Cherche un produit" wire:model="search">
                        </div>
                        <div class="col-lg-2">
                            <select name="" id="" class="custom-select" wire:model="items">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>

                    <table class="table mt-2" id="">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $key => $product)
                                <tr>
                                    {{-- <td style="width:5%"> {{$loop->iteration}} </td> --}}
                                    <td style="width:5%"> {{$product->id}} </td>
                                    <td style="width:40%"> {{$product->name}} </td>
                                    <td style="width:30%">
                                        @if ($product->check_discount($product->id))
                                            <span style="font-size: 0.8rem;   text-decoration: line-through"> {{  number_format(  $product->price[$TypeVente],2,'.',' ' ) }} </span>
                                            <span class="badge rounded-pill bg-danger text-light ml-1">En remise</span> <br>
                                            {{  number_format(  $product->price[$TypeVente] -  ( ($product->price[$TypeVente] *  $product->price->remise) / 100 ) ,2,'.',' ')}} DA
                                        @else
                                       <div class="d-flex align-items-center ">
                                          {{ $product->price->prixVenteFinale != 0 ? number_format( $product->price->prixVenteFinale ,2,'.',' ') : number_format( $product->price[$TypeVente],2,'.',' ') }}
                                          <button class="btn btn-link" data-toggle="modal" data-target="#changePrixProduit{{$product->id}}"><i class="fas fa-pen fa-xs"></i></button>
                                          <div wire:ignore.self class="modal fade" id="changePrixProduit{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                <form wire:submit.prevent="changePrixVente({{$product->id}})"> 
                                                   <div class="modal-header">
                                                       <h5 class="modal-title" id="">Prix </h5>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true close-btn">×</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                         <div class="row my-auto">
                                                               <div class="col-lg-3 mt-2">
                                                                  <label for="" class="my-auto">Prix</label>
                                                               </div>
                                                               <div class="col">
                                                                  <input type="number" class="form-control" id="" wire:model.defer="prixVenteProduit">
                                                               </div>
                                                         </div>
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button type="submit" class="btn btn-outline-success close-modal">Confirmé</button>
                                                   </div>
                                                </form>
                                               </div>
                                           </div>
                                          </div>
                                           
                                       </div>
                                        @endif
                                    </td>
                                    <td style="width:15%">
                                        <input type="number" class="form-control mr-1" placeholder="Qtt" wire:model="qtt">

                                    </td>
                                    <td style="width:10%">
                                        <div class="d-flex">
                                            <button href="" class="btn btn-outline-success border-0 btn-block" wire:click="addProductToCard({{$product->id}})">
                                                <i class="fas fa-shopping-cart"></i>
                                          </button>
                                        </div>
                                    </td>
                                </tr>
                              @empty
                              <tr>
                                 <td colspan="5" class="text-center font-weight-bold">Aucun Produit Trouvé <small> <a href=" {{route('product.create')}} " class="btn btn-sm btn-outline-success">Ajouté un produit</a> </small> </td>
                              </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        Affiche {{($products->currentpage()-1)*$products->perpage()+1}} à {{$products->currentpage()* $items }} Du {{$products->total()}} Produits
                    </div>
                    {{$products->links('vendor.pagination.simple-bootstrap-4')}}

                </div>
            </div>


        </div>
        <div class="col-lg-5">
            <div class="card card-success">
                <div class="card-header bg-danger text-light">
                    <div class="d-sm-flex">
                    <h5 class=""><i class="fas fa-shopping-basket"></i> Panier d'achat</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Qtt</th>
                                <th>Prix Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($selectedProducts as $product)
                                <tr>
                                    <td style="width:40%"> {{$product->name}} </td>

                                    <td style="width:15%">
                                        {{$product->pivot->quantite}}
                                    </td>
                                    <td style="width:40%;font-size:0.8rem;font-weight:700">{{ number_format($product->pivot->prixVente,2,'.',' ')}} DA</td>
                                    <td style="width:5%">
                                        <div class="d-flex">
                                            <button class="btn border-0 text-success btn-block" data-toggle="modal" data-target="#{{'editQuantite'.$product->id}}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            <input type="hidden" value="{{$product->pivot->quantite}}" wire:model="oldQtt">

                                            <div wire:ignore.self class="modal fade" id="{{'editQuantite'.$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editQuantiteLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editQuantiteLabel">Changé Quantité</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true close-btn">×</span>
                                                            </button>
                                                        </div>
                                                    <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <div class="d-flex">
                                                                        <label for="" class="my-auto">Quantite</label>
                                                                        <input type="integer" class="form-control pl-3" id="" wire:model="editQuantite">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Ferme</button>
                                                            <button type="button" wire:click.prevent="changeQuantite({{$product->id}})" class="btn btn-primary close-modal">Changé</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button href="" class="btn border-0 text-danger btn-block" wire:click="removeProduct({{$product->id}},{{$product->pivot->quantite}} )">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center"><i class="fas fa-shopping-basket"></i> Aucune produit dans le panier</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <x-edit-quantite />
</div>

@section('scripts')

@endsection
