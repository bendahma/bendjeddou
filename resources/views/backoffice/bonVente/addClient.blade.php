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

       
       
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4 class="pt-1" style="font-weight: 700">Facture N° {{ $bonVente->id }} </h4>
                </div>
            </div>
            <div class="card-body">
              <form action="{{ route('bonVente.saveClient') }}" method="POST" >
                @csrf
                @method('PATCH')
                <input type="hidden" name="bonVente" value="{{ $bonVente->id }}">
               <div class="row mt-2">
                   <div class="col-lg-3">
                        <div class="form-group">
                            <h4 class="text-muted">Client</h4>
                            <select name="client_id" required id="" class="custom-select">
                                <option>Selectionné un client</option>
                                @foreach ($clients as $client)
                                    <option value="{{$client->id}}">
                                        {{$client->firstName . " " . $client->lastName}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                   </div>
                   
               </div>

               <div class="row mt-2">
                   <div class="col-lg-3">
                        <div class="form-group">
                            <input type="submit" value="Ajouté client" class="btn btn-success btn-block">
                        </div>
                   </div>
               </div>

            </form>
            </div>
        </div>

  </div>
@endsection