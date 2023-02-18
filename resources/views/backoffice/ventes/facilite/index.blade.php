@extends('layouts.adminTemplate')

@section('content')
    <div class="">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                <h5 class=""> Liste des facilité</h5>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Facture</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Payé</th>
                            <th>Reste</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bonVenteParFacilite as $bonVente)
                            <tr>
                                <td> {{ $loop->iteration}} </td>
                                <td> {{ $bonVente->id}} </td>
                                <td> {{ $bonVente->client->getFullName()}} </td>
                                <td> {{ $bonVente->get_created_at_regular($bonVente->created_at)}} </td>
                                <td> {{ number_format($bonVente->montantTotal,2,'.',' ')}} </td>
                                <td> {{ number_format($bonVente->montantPayer,2,'.',' ')}} </td>
                                <td> {{ number_format($bonVente->montantReste,2,'.',' ')}} </td>
                                <td>
                                   <a href="{{route('facilite.versement',$bonVente->id)}}" class="btn btn-outline-success">Détails</a>
                                   @if($bonVente->montantReste > 0)
                                   <button class="btn btn-danger text-white" data-toggle="modal" data-target="#versement-{{$bonVente->id}}"> Versement</button>
                                   <div class="modal fade" id="versement-{{$bonVente->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                  <div class="modal-header">
                                                     <h5 class="modal-title" id="editQuantiteLabel">Montant verse</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true close-btn">×</span>
                                                     </button>
                                                  </div>
                                            <div class="modal-body">
                                                  <form method="POST" action="{{route('facilite.versement', $bonVente->id)}}">
                                                     @csrf
                                                     <div class="row my-auto">
                                                           <div class="col-lg-3 mt-2">
                                                              <label for="" class="my-auto">Montant Verse</label>
                                                           </div>
                                                           <div class="col">
                                                              <input type="integer" class="form-control" name="montantVerse" value="{{ $bonVente->montantTotal * 30% + 1500 }}">
                                                           </div>
  
                                                     </div>
                                                     <div class="modal-footer">
                                                        <button type="submit"  class="btn btn-outline-success close-modal">Confirmé</button>
                                                        <button type="button" class="btn btn-danger close-btn" data-dismiss="modal">Ferme</button>
        
                                                     </div>
                                                  </form>
                                                  </div>
                                                  
                                            </div>
                                         </div>
                                   </div>


                                   @endif
                                   <a href="{{route('facilite.telecharger',$bonVente->id)}}" class="btn btn-info " >Facture</button>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection