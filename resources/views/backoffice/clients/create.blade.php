@extends('layouts.adminTemplate')

@section('content')

    <div class="card card-default">
        <div class="card-header mb-0 pb-0">
            <h4  style="font-weight: 700; color:black">{{isset($client) ? 'Modifier Les Informations Du ' : 'Ajouté Nouveau'}} Client</h4>
        </div>
        <div class="card-body">
            <form action="{{isset($client) ? route('client.update',$client->id) : route('client.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($client))
                    @method('PATCH')
                @endif
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            {{-- <label for="">Nom</label> --}}
                            <input type="text" class="form-control" id="" placeholder="Nom" name="firstName" value="{{isset($client) ? $client->firstName : ''}}">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{-- <label for="">Prenom</label> --}}
                            <input type="text" class="form-control" id="" placeholder="Prenom" name="lastName" value="{{isset($client) ? $client->lastName : ''}}">

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{-- <label for="">Adresse</label> --}}
                            <input type="text" class="form-control" id="" placeholder="Adresse" name="address" value="{{isset($client) ? $client->address : ''}}">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{-- <label for="">Mobile</label> --}}
                            <input type="text" class="form-control" id="" placeholder="Numero Portable" name="mobile" value="{{isset($client) ? $client->mobile : ''}}">

                        </div>
                    </div>

                </div>




                <div class="row mt-3">

                    <div class="col">
                        <div class="form-group">
                            <input type="submit" value="{{isset($client) ? 'Mettre à jours' : 'Ajouté'}} client" class="btn btn-outline-success btn-block">
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

@section('scripts')
    <script type="text/javascript">
        document.getElementById('modePaiement').addEventListener('change',()=>{
            var el = document.getElementById('modePaiement');
            var e = el.options[el.selectedIndex].text;
            console.log(e);
            if(e == 'Banque') document.getElementById('banq').classList.remove("d-none");
            if(e == 'Algerié Post (CCP)') document.getElementById('banq').classList.add("d-none");
        });
    </script>
@endsection
