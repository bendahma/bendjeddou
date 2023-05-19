<div>
    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <div class="d-flex">
                        <i class="fas fa-file-invoice h4 mr-2"></i>
                        <h4 class="">Listes des factures</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-3">
                        <input type="text" placeholder="Recerche ..." class="form-control" wire:model="search">
                    </div>
                    <div class="col-lg-2">
                        <input type="date" class="form-control" wire:model="dateBon">
                    </div>
                    <div class="col-lg-2">
                        <select class="custom-select" wire:model="client">
                            <option selected>Listes Des Clients</option>
                            @foreach ($clients as $c)
                                <option value=" {{$c->id}} "> {{ $c->firstName . ' ' . $c->lastName }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <select class="custom-select" wire:model="paiement">
                            <option selected>Paiement</option>
                            <option value="complet">Complet</option>
                            <option value="dette">En Dette</option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <select class="custom-select" wire:model="perPage">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col">
                    <button class="btn btn-outline-success btn-block" wire:click='videRecherche()'>Vide recherche</button>
                    </div>
                </div>
                <table class="table" id="">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Facture</th>
                            <th>Client</th>
                            <th>Montant Total</th>
                            <th>Montant Payer</th>
                            <th>Montant Reste</th>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bon as $b)
                            <tr class=" {{$b->montantReste <  0 ? 'bg-danger text-light' : ''}} " >
                                <td> {{$loop->iteration}} </td>
                                <td> {{$b->id}} </td>
                                <td class="text-uppercase"> {{isset($b->client) ? $b->client->firstName . ' ' . $b->client->lastName : ''}} </td>
                                <td> {{number_format($b->montantTotal,2,'.',' ')}} DA </td>
                                <td> {{number_format($b->montantPayer,2,'.',' ')}} DA </td>
                                <td> {{number_format($b->montantReste,2,'.',' ')}} DA </td>
                                <td class="">
                                    <div class="d-flex">
                                            <a class="btn {{$b->montantReste <  0 ? '' : 'text-dark'}} btn-outline-warning border-1 mr-1 col" href=" {{route('bonVente.details',$b->id)}} ">
                                                <i class="fas fa-bars mr-1"></i> Detail
                                            </a>
                                            @if ($b->montantReste >  0)
                                                <button class="btn btn-outline-success border-1" data-toggle="modal" data-target="#exampleModal">
                                                    <span style="font-weight:700;color:black"><i class="fas fa-money-bill-wave"></i> Versement</span>
                                                </button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                          <form action=" {{route('bonVente.versement',$b->id)}} " method="POST">
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

                                    </div>
                                </td>
                            </tr>
                        @empty
                        <tr>
                           <td colspan="7" class="text-center h5">
                              Aucun facture se trouve pour le moment
                           </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    Affiche {{($bon->currentpage()-1)*$bon->perpage()+1}} à {{$bon->currentpage()* $perPage }} Du {{$bon->total()}} Facture
                </div>
                {{$bon->links('vendor.pagination.simple-bootstrap-4')}}

            </div>
        </div>
    </div>
</div>
