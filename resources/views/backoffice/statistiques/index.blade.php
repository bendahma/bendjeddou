@extends('layouts.adminTemplate')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <div class="">
      <h1 class="h3 mb-0 text-gray-800">Les revenus</h1>
      <small>Prennent en compte les charges du magazin</small>
   </div>
</div>

<div class="row">

   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-primary shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Revenu (Mois {{date('M')}})
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                     {{number_format($earning['monthlyEarning'],2,'.',' ')}} <small> Da </small> <br />
                     <small style="font-weight: 700">( {{number_format($netEarning['netMonthlyEarning'],2,'.',' ')}} Da
                        )</small>
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
      <div class="card border-primary shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Revenu (Janv - Mars)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                     {{number_format($earning['trimestreEarning'],2,'.',' ')}} <small> Da </small> <br>
                     <small style="font-weight: 700">( {{number_format($netEarning['netTrimestreEarning'],2,'.',' ')}}
                        Da )</small>

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
      <div class="card border-primary shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Revenu (Janv - Juin)</div>
                  <div class="row no-gutters align-items-center">
                     <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                           {{number_format($earning['semestreEarning'],2,'.',' ')}} <small> Da </small> <br>
                           <small style="font-weight: 700">( {{number_format($netEarning['netSemestreEarning'],2,'.','
                              ')}} Da )</small>


                        </div>
                     </div>
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
      <div class="card border-primary shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Revenu (Janv - Decembre)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                     {{number_format($earning['anneeEarning'],2,'.',' ')}} <small> Da </small> <br>
                     <small style="font-weight: 700">( {{number_format($netEarning['netAnneeEarning'],2,'.',' ')}} Da
                        )</small>


                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-xl-6 col-lg-6">
      @livewire('top-products')
   </div>
   <div class="col-xl-6 col-lg-6">
      <div class="card text-white bg-info shadow">
         <div class="card-header text-white bg-info py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-white">Revenue par jour</h6>
         </div>
         <div class="card-body">
            <table class="table text-white bg-info font-weight-bold" id="Table">
               <thead>
                  <tr>
                     <th>N°</th>
                     <th>Date</th>
                     <th>Montant</th>
                     <th>Dette</th>

                  </tr>
               </thead>
               <tbody>
                  @foreach ($dailyVente as $d)
                  <tr>
                     <td> {{$loop->iteration}} </td>
                     <td> {{$d->date}} </td>
                     <td> {{ number_format($d->montant,2,'.',' ')}} </td>
                     <td> {{ number_format($d->montantReste,2,'.',' ')}} </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection