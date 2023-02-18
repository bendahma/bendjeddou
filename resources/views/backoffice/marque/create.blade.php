@extends('layouts.adminTemplate')

@section('content')

    <div class="card card-default">
        <div class="card-header mb-0 pb-0">
            <h6  style="font-weight: 700; color:black">{{isset($marque) ? 'Mettre à jours' : 'Ajouté Nouvelle'}} Marque</h6>
        </div>
        <div class="card-body">
            <form action="{{isset($marque) ? route('marque.update',$marque->id) : route('marque.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($marque))
                    @method('PATCH')
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" required class="form-control" id="" placeholder="Nom du marque" name="name" value="{{isset($marque) ? $marque->name : ''}}">
                            @error('name')
                                <div class="" style="color:red;font-size:0.8rem;font-weight:700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="submit" value="{{isset($marque) ? 'Mettre à jours la' : 'Ajouté Nouvelle'}} Marque" class="btn btn-outline-success btn-block">
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
