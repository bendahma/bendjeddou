<div>
    <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header bg-dark text-light">
                <div class="d-sm-flex align-items-center justify-content-between">
                        <h4 class=""><i class="fas fa-list"></i> Stockage des produits</h4>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Cherche un produit" wire:model="search">
                    </div>
                    <div class="col-lg-3">
                        <select name="" id="" class="custom-select" wire:model="stockStat">
                            <option selected>Produit status</option>
                            <option value="0">In-Stock</option>
                            <option value="1">Out of STock</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <select name="" id="" class="custom-select" wire:model="stockStat">
                            <option selected>Trié Par</option>
                            <option value="">Nom Produit</option>
                            <option value="">Date Stockage</option>
                            <option value="">Quantité plus bas</option>
                            <option value="">Quantité plus Haut</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <select name="" id="" class="custom-select" wire:model="items">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>

                <table class="table mt-2" id="">
                    <thead>
                        <tr class="text-center text-sm">
                            <th>N°</th>
                            <th>Produit</th>
                            <th>Reste</th>
                            <th>Date de Stockage</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class=" {{$product->stock->outOfStock == true || $product->stock->quantiteReste == 0 ? 'bg-danger' : ''}} {{$product->stock->quantiteReste < 30 ? 'bg-warning' : ''}}">
                                <td style="width:5%;text-align:center"> {{$loop->iteration}} </td>
                                <td style="width:30%;text-align:center">{{$product->name}} </td>
                                <td style="width:10%;font-size:1.3rem;font-weight:700;text-align:center">{{$product->stock->quantiteReste}} </td>
                                <td style="width:20%;text-align:center">{{$product->stock->fillDate}} </td>
                                <td style="width:10%;text-align:center">{{$product->stock->quantite}} </td>
                                <td style="width:10%;text-align:center">{{$product->stock->quantiteTotal}} </td>
                                <td>
                                    <div class="">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button data-toggle="modal" data-target="#exampleModal{{$product->id}}" class="btn btn-success btn-block">
                                                    +
                                                </button>
                                            </div>
                                            <div class="col-lg-6">
                                                <button data-toggle="modal" data-target="#exampleModalMinus{{$product->id}}" class="btn btn-block" style="background-color: #9f0303;color:white;">
                                                    -
                                                </button>
                                            </div>
                                           
                                           
                                            <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Produit stocker</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <form action="{{url('/backoffice/stock/'.$product->id.'/add')}}" method="POST" >
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form--group">
                                                                        <label for="">Quantite</label>
                                                                        <input type="text" class="form-control" name="quantite" placeholder="Quantité à stocker">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form--group">
                                                                        <label for="">Date</label>
                                                                        <input type="date" name="date" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-outline-success">Confirmé</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>

                                                  </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="exampleModalMinus{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="ModalLabel">Produit stocker</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <form action="{{url('/backoffice/stock/'.$product->id.'/remove')}}" method="POST" >
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form--group">
                                                                        <label for="">Quantité retirée</label>
                                                                        <input type="text" class="form-control" name="quantite" placeholder="Quantité à stocker">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-outline-success">Confirmé</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>

                                                  </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    Affiche {{($products->currentpage()-1)*$products->perpage()+1}} à {{$products->currentpage()* $items }} Du {{$products->total()}} entries
                </div>
                {{$products->links('vendor.pagination.bootstrap-4')}}

            </div>
        </div>


    </div>
</div>
