@extends('layouts.adminTemplate')

@section('content')
    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                <h4 class=""> <i class="fas fa-users"></i> Utilisateurs</h4>
                <a href=" {{route('users.create')}} " class="d-none d-sm-inline-block btn btn-outline-success shadow-sm"><i class="fas fa-plus mr-2"></i>Nouvelle utilisateur</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Non et Prenom</th>
                            <th>Nom d'utilisateur</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            <tr class="">
                                <td> {{$loop->iteration}} </td>
                                <td> {{$u->name}} </td>
                                <td> {{$u->username}} </td>
                                <td> {{$u->role}} </td>
                                <td>
                                    <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                            <option selected disabled>Action</option>
                                            <option value=" {{route('users.edit',$u->id)}} ">Mettre à jours</option>
                                            <option value="{{url('/users/'.$u->id.'/supprime')}}">Supprime</option>
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
