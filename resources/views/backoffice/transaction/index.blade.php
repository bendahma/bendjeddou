@extends('layouts.adminTemplate')

@section('content')
    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                <h5 class="font-weight-bold"> <i class="fas fa-user"></i> Lists des Factures du {{$fournisseur->name}} </h5>
                <a href=" {{route('transaction.create',$fournisseur->id)}} " class="d-none d-sm-inline-block btn btn-outline-success shadow-sm"><i class="fas fa-plus mr-2"></i>Nouvelle Transaction</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>N° Facture</th>
                            <th>Date facture</th>
                            <th>Montant facture</th>
                            <th>Montant Payer</th>
                            <th>Montant Reste</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $t)
                            <tr class="{{$t->montantReste > 0 ? 'bg-danger': ''}}">
                                <td> {{$loop->iteration}} </td>
                                <td> {{$t->numeroFacture}} </td>
                                <td> {{$t->dateFacture}} </td>
                                <td> {{ number_format($t->montantTotal,2,'.',' ')}} DA </td>
                                <td> {{ number_format($t->montantPayer,2,'.',' ')}} DA </td>
                                <td> {{ number_format($t->montantReste,2,'.',' ')}} DA </td>
                                <td>
                                    <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                            <option selected disabled>Action</option>
                                            <option value=" {{url('/backoffice/fournisseur/'.$fournisseur->id.'/transaction/'.$t->id.'/edit')}} ">Mettre à jours</option>
                                            <option value=" {{url('/backoffice/transaction/'.$t->id.'/supprime')}} ">Supprime</option>

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
