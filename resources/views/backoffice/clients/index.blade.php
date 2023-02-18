@extends('layouts.adminTemplate')

@section('content')
    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                <h5 class=""> <i class="fas fa-users mr-1"></i> Clients</h5>
                <a href=" {{route('client.create')}} " class="d-none d-sm-inline-block btn btn-outline-success shadow-sm"><i class="fas fa-plus mr-2"></i>Nouveau Client</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Téléphone</th>
                            <th>Adresse</th>
                            <th>Dette</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$client->id}} </td>
                                <td> {{$client->firstName}} </td>
                                <td> {{$client->lastName}} </td>
                                <td> {{$client->mobile}} </td>
                                <td> {{$client->address}} </td>
                                <td> {{number_format($client->get_client_global_dette(),2,'.',' ')}} </td>
                                <td>
                                   <a href=" {{url('/backoffice/client/'.$client->id.'/edit')}} "><i class="fas fa-user-edit text-xl"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection