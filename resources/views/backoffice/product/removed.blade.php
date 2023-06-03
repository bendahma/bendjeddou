@extends(Auth::user()->role == 'admin' ? 'layouts.adminTemplate' : (Auth::user()->role == 'manager' ? 'layouts.managerTemplate' : ''))

@section('content')
    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <h4 class="text-dark">Produits supprimé</h4>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Name</th>
                            <th>Marque</th>
                            <th>Catgeory</th>
                            <th>Prix d'achat</th>
                            <th>Prix de vente</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->marque->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->price->prixAchat}}</td>
                                <td>{{$product->price->prixVenteGros}}</td>
                                <td>
                                    <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                        <option selected disabled>Action</option>
                                        <option value="{{url('/backoffice/product/'.$product->id.'/edit')}}">Mettre à jours</option>
                                        <option value="{{url('/backoffice/product/restore/'.$product->id)}}">Récupérer</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
