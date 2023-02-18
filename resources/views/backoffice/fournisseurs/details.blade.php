@extends('layouts.adminTemplate')

@section('content')
    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                <h4 class="">Fournisseur</h4>
                <a href=" {{route('fournisseur.create')}} " class="d-none d-sm-inline-block btn btn-outline-success shadow-sm"><i class="fas fa-plus mr-2"></i>Nouveau Fournissuer</a> 
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Code Fournissuer</th>
                            <th>Nom & Prenom</th>
                            <th>Téléphone</th>
                            <th>Credit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fournisseurs as $f)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$f->codeFournisseur}} </td>
                                <td> {{$f->name}} </td>
                                <td> {{$f->telephone}} </td>
                                <td> {{ number_format($f->credit,2,'.',' ')}} DA </td>
                                <td>
                                    <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                            <option selected disabled>Action</option>
                                            <option value=" {{url('/backoffice/fournisseur/'.$f->id.'/')}} ">Détails</option>
                                            <option value=" {{url('/backoffice/fournisseur/'.$f->id.'/edit')}} ">Mettre à jours</option>
                                            <option value="{{url('/backoffice/fournisseur/'.$f->id.'/supprime')}}">Supprime</option>
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