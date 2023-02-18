@extends('layouts.adminTemplate')

@section('content')



    <div class="container">
       
<div class="row">

   <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Montant total du facture</div>
                  <div class="h4 mb-0 font-weight-bold text-gray-800">
                     {{ number_format($bonVente->montantTotal,2,'.',' ')}} DA
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
               </div>
               </div>
            </div>
         </div>
   </div>
   <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-success bg-success shadow-lg h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-gray-100 text-uppercase mb-1">Montant Payé</div>
                  <div class="h4 mb-0 font-weight-bold text-gray-100">
                     {{ number_format($bonVente->montantPayer,2,'.',' ')}} DA
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
               </div>
               </div>
            </div>
         </div>
   </div>
   <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-danger bg-danger shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-gray-100 text-uppercase mb-1">Montant Reste</div>
                  <div class="h4 mb-0 font-weight-bold text-gray-100">
                        {{ number_format($bonVente->montantReste,2,'.',' ')}} DA
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
               </div>
               </div>
            </div>
         </div>
   </div>
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
                <h5 class="font-weight-bold"> <i class="fas fa-user"></i> Lists des versement d'achat N°{{$bonVente->id}} </h5>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Date</th>
                            <th>Montant</th>
                           
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bonVente->versements as $versement)
                            <tr class="">
                                <td> {{$loop->iteration}} </td>
                                <td> {{$versement->DateVersement}} </td>
                                <td> {{ number_format($versement->montantVersement,2,'.',' ')}} DA </td>
                                <td>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
