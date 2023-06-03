@extends('layouts.adminTemplate')

@section('content')
    <div class="container">
        <div class="card card-default">
            <div class="card-header mb-0 pb-0">
                <h4  style="font-weight: 700; color:black"><i class="fas fa-laptop mr-1"></i>  {{isset($product) ? 'Modifier les informations du' : 'Ajouté un '}}  produit</h4>
            </div>
            <div class="card-body">
                <form action="{{isset($product) ? route('product.update',$product->id) : route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($product))
                        @method('PATCH')
                    @endif

                   <div class="row mt-5">
                        <div class="col-lg-2">
                            <div class="form-group">
                              <small class="text-muted">Réference du produit</small>

                                <input type="text" class="form-control" id="name" required placeholder="Référence du produit" name="refProduit" value="{{ isset($product) ? $product->refProduit : ''}}">
                                @error('refProduit')
                                    <div class="" style="color:red;font-size:0.8rem;font-weight:700">
                                        @error('refProduit')
                                            <div class="" style="color:red;font-size:0.8rem;font-weight:700">Référence Déjà exists</div>
                                        @enderror
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                                <div class="form-group">
                                 <small class="text-muted">Nom du produit</small>
                                    <input type="text" class="form-control" required id="name" placeholder="Nom du produit" name="name" value="{{ isset($product) ? $product->name : ''}}">
                                    @error('name')
                                        <div class="" style="color:red;font-size:0.8rem;font-weight:700">Produit Déja exists</div>
                                    @enderror
                                </div>
                        </div>
                       <div class="col">
                            <div class="form-group">
                                <small class="text-muted">Marque</small>
                                <select name="marque_id" required id="" class="custom-select">
                                    <option>Selectionné une marque</option>
                                    @foreach ($marques as $marque)
                                        <option value="{{$marque->id}}" @if( isset($product) AND $product->marque_id == $marque->id) {{'selected'}} @endif>
                                            {{$marque->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                       </div>
                       <div class="col">
                            <div class="form-group">
                                <small class="text-muted">Chatégory</small>
                                <select name="category_id" id="" class="custom-select" required>
                                    <option >selectionné une catégorie</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if( isset($product) AND $product->category_id == $category->id) {{'selected'}} @endif>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                       </div>

                   </div>

                    <div class="row mt-5">
                        <div class="col">
                            <div class="form-group">
                              <small class="text-muted">Prix d'Achat</small>
                              <input type="number" required class="form-control" id="" placeholder="Prix d'achat " name="prixAchat" value="{{isset($product) ? $product->price->prixAchat : ''}}">
                                @error('price')
                                    <div class="" style="color:red;font-size:0.8rem;font-weight:700">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                 <small class="text-muted">Prix du gros</small>
                                    <input type="number" class="form-control" required id="" placeholder="Prix du gros" name="prixVenteGros" value="{{isset($product) ? $product->price->prixVenteGros : ''}}">
                                    @error('price')
                                        <div class="" style="color:red;font-size:0.8rem;font-weight:700">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted">Prix du détails</small>
                                    <input type="number" class="form-control" required id="" placeholder="Prix du détails" name="prixDetails" value="{{isset($product) ? $product->price->prixDetails : ''}}">
                                    @error('prixDetails')
                                        <div class="" style="color:red;font-size:0.8rem;font-weight:700">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted">Prix du facilité</small>
                                    <input type="number" class="form-control" required id="" placeholder="Prix du facilité" name="prixFacilite" value="{{isset($product) ? $product->price->prixFacilite : ''}}">
                                    @error('prixFacilite')
                                        <div class="" style="color:red;font-size:0.8rem;font-weight:700">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        <div class="col">
                            <div class="form-group">
                              <small class="text-muted">Quantité dans le stock</small>
                                <input type="number" class="form-control" name="quantiteStock" required placeholder="Quantitté dans stock" value="{{isset($product) ? $product->stock->quantiteReste : ''}}">
                                @error('quantiteStock')
                                    <div class="" style="color:red;font-size:0.8rem;font-weight:700">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                   <div class="row mt-5">
                       <div class="col-lg-3">
                            <div class="form-group">
                                <input type="submit" value="{{isset($product) ? 'Mettre à jours le' : 'Ajouté un'}} produit" class="btn btn-outline-success btn-block">
                            </div>
                       </div>
                       <div class="col-lg-3">
                            <div class="form-group">
                                <input type="reset" value="Cancel" class="btn btn-danger btn-block">
                            </div>
                       </div>
                   </div>

                </form>
            </div>
        </div>

    </div>

@endsection
