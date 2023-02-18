@extends('layouts.adminTemplate')

@section('content')
    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                <h4 class="">Listes des clients</h4>
                <a href=" {{route('client.create')}} " class="d-none d-sm-inline-block btn btn-outline-success shadow-sm"><i class="fas fa-plus mr-2"></i>Nouveau Client</a> 
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Code Client</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Téléphone</th>
                            <th>Dette</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$client->codeClient}} </td>
                                <td> {{$client->firstName}} </td>
                                <td> {{$client->lastName}} </td>
                                <td> {{$client->mobile}} </td>
                                <td> {{number_format($client->get_client_global_dette(),2,'.',' ')}} DA</td>
                                <td>
                                    <a href=" {{route('vente.selectProduct',$client->id)}} " class="btn btn-outline-primary btn-block"> 
                                        sélectionner des produits
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection

{{-- 
    
    <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
        <option selected disabled>Action</option>
        <option value="{{url('/backoffice/product/'.$product->id)}}">Details</option>
        <option value="{{url('/backoffice/product/'.$product->id.'/edit')}}">Edit</option>
        <option value="{{url('/backoffice/product/remove/'.$product->id)}}">Remove</option>
        <option value="{{url('/backoffice/product/delete/'.$product->id)}}">Delete</option>
    </select>
--}}