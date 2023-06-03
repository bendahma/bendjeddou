@extends('layouts.adminTemplate')

@section('content')
    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4 class="">Lists des produits du category :<span style="font-weight: bold"> {{ strtoupper($category->name) }} </span></h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="showProductsTable">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Marque</th>
                            <th>Price d'Achat</th>
                            <th>Prix de vente </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td width="40%">{{strtoupper($product->name)}}</td>
                                <td>{{strtoupper($product->marque->name)}}</td>
                                <td>
                                    {{  number_format($product->price->prixAchat,2,'.',' ')}} DA
                                </td>
                                <td>
                                    @if ($product->price->discount == true)
                                        <span style="font-size: 0.8rem;   text-decoration: line-through"> {{  number_format(  $product->price->prixVenteGros,2,'.',' ' ) }} </span>
                                        <span class="badge rounded-pill bg-danger text-light ml-1">En remise</span> <br>
                                        {{ number_format(  $product->price->prixDetails -  ( ($product->price->prixDetails *  $product->price->remise) / 100 ) ,2,'.',' ')}} DA
                                    @else
                                        {{ number_format($product->price->prixDetails,2,'.',' ')}} DA

                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
