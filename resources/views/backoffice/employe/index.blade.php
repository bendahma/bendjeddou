@extends('layouts.adminTemplate')

@section('content')
    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                <h4 class=""> <i class="fas fa-users"></i> Employée</h4>
                <a href=" {{route('employee.create')}} " class="d-none d-sm-inline-block btn btn-outline-success shadow-sm"><i class="fas fa-plus mr-2"></i>Nouveau Employee</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom & Prenom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Salaire</th>
                            <th>Assuré</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $e)
                            <tr class="">
                                <td> {{$loop->iteration}} </td>
                                <td> {{$e->nom . ' ' . $e->prenom}} </td>
                                <td> {{$e->address}} </td>
                                <td> {{$e->telephone}} </td>
                                <td> {{$e->salaire}} </td>
                                <td>
                                   @if ($e->assure)
                                       Oui
                                    @else
                                       Non
                                   @endif
                                </td>
                                <td>
                                    <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                            <option selected disabled>Action</option>
                                            <option value=" {{url('/employee/'.$e->id.'/edit')}} ">Mettre à jours</option>
                                            <option value="{{route('employee.supprime',$e->id)}}">Supprime</option>
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
