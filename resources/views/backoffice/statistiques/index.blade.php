@extends('layouts.adminTemplate')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <div class="">
      <h1 class="h3 mb-0 text-gray-800">Les revenus</h1>
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
                        {{number_format($globalEarning['globalMonthlyEarning'],2,'.',' ')}} Da   
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
                        {{number_format($globalEarning['globalTrimestreEarning'],2,'.',' ')}}
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
                              {{number_format($globalEarning['globalSemestreEarning'],2,'.','')}} Da 
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
                        {{number_format($globalEarning['globalAnneeEarning'],2,'.',' ')}} Da
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

   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div class="">
         <h1 class="h3 mb-0 text-gray-800">Bénéfice Net</h1>
      </div>
   </div>
   
   <div class="row">

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bénéfice Net (Mois {{date('M')}})
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{number_format($netEarning['netMonthlyEarning'],2,'.',' ')}} <small> Da </small> <br />
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
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bénéfice Net (Janv - Mars)</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{number_format($netEarning['netTrimestreEarning'],2,'.',' ')}} <small> Da </small> <br>
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
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bénéfice Net (Janv - Juin)</div>
                     <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                           <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                              {{number_format($netEarning['netSemestreEarning'],2,'.',' ')}} <small> Da </small> <br>
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
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bénéfice Net (Janv - Decembre)</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{number_format($netEarning['netAnneeEarning'],2,'.',' ')}} <small> Da </small> <br>
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

   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div class="">
         <h1 class="h3 mb-0 text-gray-800">Magazin </h1>
      </div>
   </div>
   <div class="row">

      <div class="col-xl-4 col-md-6 mb-4">
         <div class="card border-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Montant des produits reste</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{number_format($montantOnHold,2,'.',' ')}} DA <small> ({{ $produitsReste . ' artciles' }}) </small>  <br />
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

   <div class="col-xl-6 col-lg-8">
      <div class="card shadow">
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Revenue par jour</h6>
         </div>
         <div class="card-body">
            <table class="table font-weight-bold" id="Table">
               <thead>
                  <tr>
                     <th>N°</th>
                     <th>Date</th>
                     <th>Montant Vente</th>
                     <th>Montant Net</th>
                     <th>Dette</th>

                  </tr>
               </thead>
               <tbody>
                  @foreach ($dailyVente as $d)
                  <tr>
                     <td> {{$loop->iteration}} </td>
                     <td> {{$d->date}} </td>
                     <td> {{ number_format($d->montant,2,'.',' ')}} </td>
                     <td> {{ number_format($d->montantNetTotal,2,'.',' ')}} </td>
                     <td> {{ number_format($d->montantReste,2,'.',' ')}} </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <div class="">
      <h1 class="h3 mb-0 text-gray-800">Les charges du magazin</h1>
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
                     {{number_format($frais['monthlyFrais'],2,'.',' ')}} Da   
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
                     {{number_format($frais['trimestreFrais'],2,'.',' ')}}
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
                           {{number_format($frais['semestreFrais'],2,'.','')}} Da 
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
                     {{number_format($frais['anneeFrais'],2,'.',' ')}} Da
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
@endsection