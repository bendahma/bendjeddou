@extends('layouts.adminTemplate')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Montant du facture</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{number_format($bonVente->montantTotal,2,'.',' ') . ' DA'}}
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @if ($bonVente->montantReste <> 0)
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Montant Payer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{number_format($bonVente->montantPayer,2,'.',' ') . ' DA'}}
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-money-check fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-danger bg-danger  shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Montant {{$bonVente->montantReste < 0 ? 'Rembourser' : 'Reste'}} </div>
                        <div class="h5 mb-0 font-weight-bold text-light">
                            {{number_format($bonVente->montantReste,2,'.',' ') . ' DA'}}
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-danger shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Date Du Facture</div>
                        <div class="mb-0 text-sm font-weight-bold text-gray-800">
                            <?php \Carbon\Carbon::setLocale('fr'); ?>
                             {{ $bonVente->created_at  }} <br>
                             {{' (' . $bonVente->created_at->diffForHumans().')'}}
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="far fa-calendar-alt fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Client</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase text-xl">
                            {{ !is_null($bonVente->client) ? $bonVente->client->firstName . " " . $bonVente->client->lastName : ''}}
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Numero Téléphone</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          {{ !is_null($bonVente->client) ? $bonVente->client->mobile : '' }}
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

        </div>

        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4 class="pt-1" style="font-weight: 700">Facture N° {{ $bonVente->id }}</h4>
                    <div class="">
                      @if ($bonVente->client == null)
                      <a href=" {{route('bonVente.addClient',$bonVente->id)}} " class="d-none d-sm-inline-block btn btn-outline-warning text-dark shadow-sm"><i class="fas fa-user-alt mr-2"></i>Ajouter le client</a>
                      @endif
                      <a href=" {{route('bonVente.telecharge',$bonVente->id)}} " class="d-none d-sm-inline-block btn btn-outline-success shadow-sm"><i class="fas fa-cloud-download-alt mr-2"></i>Téléchargé la facture</a>
                      @if ($bonVente->montantReste < 0)
                        <a href=" {{route('bonVente.rembourse',$bonVente->id)}} " class="d-none d-sm-inline-block btn btn-outline-warning text-dark shadow-sm"><i class="fas fa-hand-holding-usd mr-2"></i>Montant Rembourser</a>
                      @endif
                      @if ($bonVente->montantReste > 0)
                        <button class="btn btn-outline-success border-1" data-toggle="modal" data-target="#exampleModal">
                            <span style="font-weight:700;color:black"><i class="fas fa-money-bill-wave"></i> Versement</span>
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action=" {{route('bonVente.versement',$bonVente->id)}} " method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Compléte Montant Du Bon</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="" class="text-dark pt-2">Montant Verse</label>
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control" name="montantVerse">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Confirmé" class="btn btn-outline-success">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Ferme</button>
                                    </div>
                                </form>

                            </div>
                            </div>
                        </div>
                      @endif
                      <a href=" {{route('bonVente.remove',$bonVente->id)}} " class="d-none d-sm-inline-block btn btn-danger shadow-sm"><i class="fas fa-trash-alt mr-2"></i>Supprime le bon</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Produit</th>
                            <th>P.U</th>
                            <th>Quantité</th>
                            <th>P.T</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bonVente->products as $b)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$b->name}} </td>
                                <td> {{number_format($b->pivot->montantTotal / $b->pivot->quantite,2,'.',' ')}} DA  </td>
                                <td> {{$b->pivot->quantite}}  </td>
                                <td> {{number_format($b->pivot->montantTotal,2,'.',' ')}} DA  </td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-outline-warning text-dark border-1 mr-1 col" data-toggle="modal" data-target="#EditQuantiteModel{{$b->id}}">
                                            <i class="far fa-keyboard mt-1"></i> Modifier
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="EditQuantiteModel{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="EditQuantiteModelLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="EditQuantiteModelLabel">Modifier Quantité Du Produit</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form action=" {{route('bonVente.editQuantite',[$bonVente->id,$b->id])}} " method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label for="" class="my-auto">Quantité</label>
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" name="quantite" class="form-control" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-outline-success" value="Confirme">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-danger text-light border-1 mr-1 col" href=" {{route('bonVente.removeProduct',[$bonVente->id,$b->id])}} ">
                                            <i class="far fa-trash-alt mr-1"></i> Supprimé
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="font-weight: 700;font-size:1.2rem"> {{number_format($sumQtt,0,'',' ')}}</td>
                        <td style="font-weight: 700;font-size:1.2rem"> {{number_format($bonVente->montantTotal,2,'.',' ')}} DA </td>
                        <td></td>                    </tr>
                </table>

            </div>
        </div>

    </div>
@endsection