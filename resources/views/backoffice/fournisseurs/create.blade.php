@extends('layouts.adminTemplate')

@section('content')

    <div class="card card-default">
        <div class="card-header mb-0 pb-0">
            <h4  style="font-weight: 700; color:black">{{isset($fournisseur) ? 'Modifier Les Informations Du ' : 'Ajouté Un Nouveau'}} Fournisseur</h4>
        </div>
        <div class="card-body">
            <form action="{{isset($fournisseur) ? route('fournisseur.update',$fournisseur->id) : route('fournisseur.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($fournisseur))
                    @method('PATCH')
                @endif
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Code Fournisseur</label>
                            <input type="text" class="form-control" id="" placeholder="Code fournisseur" name="codeFournisseur" value="{{isset($fournisseur) ? $fournisseur->codeFournisseur : ''}}">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nom et Prenom</label>
                            <input type="text" class="form-control" id="" placeholder="Nom et Prenom" name="name" value="{{isset($fournisseur) ? $fournisseur->name : ''}}">
                            @error('raisonSociale')
                                <div class="" style="color:red;font-size:0.8rem;font-weight:700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Téléphone</label>
                            <input type="text" class="form-control" id="" placeholder="Téléphone" name="telephone" value="{{isset($fournisseur) ? $fournisseur->telephone : ''}}">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">

                    <div class="col">
                        <div class="form-group">
                            <input type="submit" value="{{isset($fournisseur) ? 'Mettre à jours le ' : 'Ajouté un '}} fournisseur" class="btn btn-outline-success btn-block">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <input type="reste" value="Supprime" class="btn btn-danger btn-block">
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
