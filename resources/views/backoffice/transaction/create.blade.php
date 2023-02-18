@extends('layouts.adminTemplate')

@section('content')

    <div class="card card-default">
        <div class="card-header mb-0 pb-0">
            <h4  style="font-weight: 700; color:black">{{isset($transaction) ? 'Modifier La ' : 'Ajouté Nouveau'}} Transaction</h4>
        </div>
        <div class="card-body">
            <form action="{{isset($transaction) ? route('transaction.update',[$fournisseur->id,$transaction->id]) : route('transaction.store',$fournisseur->id)}}" method="POST" enctype="multipart/form-data">
            {{-- <form action="{{route('transaction.store',$fournisseur->id)}}" method="POST"> --}}
                @csrf
                @if(isset($transaction))
                    @method('PATCH')
                @endif
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <small class="font-weight-bold text-danger">Numero Facture</small>
                            <input type="text" class="form-control" id="" placeholder="numero Facture" name="numeroFacture" value="{{isset($transaction) ? $transaction->numeroFacture : ''}}">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <small class="font-weight-bold text-danger">Date Facture</small>
                            <input type="date" class="form-control" id="" placeholder="date Facture" name="dateFacture" value="{{isset($transaction) ? $transaction->dateFacture : ''}}">
                            {{-- <label for="">DateFacture</label> --}}

                        </div>
                    </div>


                    <div class="col">
                        <div class="form-group">
                            <small class="font-weight-bold text-danger">Montant Total</small>
                            <input type="text" class="form-control" id="" placeholder="montant Total" name="montantTotal" value="{{isset($transaction) ? $transaction->montantTotal : ''}}">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <small class="font-weight-bold text-danger">Montant Payer</small>
                            <input type="text" class="form-control" id="" placeholder="montant Payer" name="montantPayer" value="{{isset($transaction) ? $transaction->montantPayer : ''}}">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <small class="font-weight-bold text-danger">Montant Reste</small>
                            <input type="text" class="form-control" id="" placeholder="montant Reste" name="montantReste" value="{{isset($transaction) ? $transaction->montantReste : ''}}">

                        </div>
                    </div>

                </div>


                <input type="hidden" name="fournisseur_id" value="{{ $fournisseur->id }}">

                <div class="row mt-3">

                    <div class="col">
                        <div class="form-group">
                            <input type="submit" value="{{isset($transaction) ? 'Mettre à jours' : 'Ajouté'}} transaction" class="btn btn-outline-success btn-block">
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
