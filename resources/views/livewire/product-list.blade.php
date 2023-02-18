<div>
    <div class="card card-success">
        <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h5 class=""><i class="fas fa-archive mr-1"></i> Lists Des Produits</h5>
                <a href=" {{route('product.create')}} " class="d-none d-sm-inline-block btn btn-outline-success shadow-sm"><i class="fas fa-plus mr-2"></i>Nouveau Produit</a>
                </div>
            </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-1">
                    <select name="" id="" class="custom-select" wire:model="items">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="col"></div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" placeholder="Cherche un produit" wire:model="search">
                </div>
            </div>

            <table class="table mt-2" id="">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        {{-- <th>Marque</th>
                        <th>Category</th> --}}
                        <th>Prix <br> d'achat</th>
                        <th>Prix <br> du Gros</th>
                        <th>Prix <br> du Détails</th>
                        <th>Prix <br> du Facilité</th>
                        <th>Quantité <br> vendu</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td style="width:20%"> {{$product->name}} </td>
                            {{-- <td style="width:15%">{{$product->marque->name}}</td>
                            <td style="width:15%">{{$product->category->name}}</td> --}}
                            <td style="width:15%"> {{ number_format($product->price->prixAchat,2,'.',' ')}}</td>
                            <td style="width:15%"> {{ number_format($product->price->prixVenteGros,2,'.',' ')}}</td>
                            <td style="width:15%">
                                @if ($product->price->discount == true)
                                    <span style="font-size: 0.8rem;   text-decoration: line-through"> {{  number_format(  $product->price->prixDetails,2,'.',' ' ) }} </span>
                                    <span class="badge rounded-pill bg-danger text-light ml-1">En remise - {{ $product->price->remise }} % </span> <br>
                                    {{ number_format(  $product->price->prixDetails -  ( ($product->price->prixDetails *  $product->price->remise) / 100 ) ,2,'.',' ')}}
                                @else
                                    {{ number_format($product->price->prixDetails,2,'.',' ')}}

                                @endif

                            </td>
                            <td style="width:15%"> {{ number_format($product->price->prixFacilite,2,'.',' ')}}</td>
                            <td style="width:15%"> {{ $product->nomber_vente() }}</td>

                            <td>
                                <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                    <option selected disabled>Action</option>
                                    <option value="{{url('/backoffice/product/'.$product->id.'/edit')}}">Modifier</option>
                                    <option value="{{url('/backoffice/product/remove/'.$product->id)}}">Suspendu</option>
                                </select>
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
            {{$products->links('vendor.pagination.bootstrap-4')}}

        </div>
    </div>
</div>
