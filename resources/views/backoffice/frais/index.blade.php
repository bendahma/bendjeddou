@extends('layouts.adminTemplate')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   {{-- <h1 class="h3 mb-0 text-gray-800">Statistique des revenus</h1> --}}
   {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
 </div>

 <!-- Content Row -->
 <div class="row">

   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-primary shadow h-100 py-2">
       <div class="card-body">
         <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Les charges (Mois {{date('M')}})</div>
             <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                  {{ number_format($montant['mois'],2,'.',' ')}} Da
             </div>
           </div>
           <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
           </div>
         </div>
       </div>
     </div>
   </div>

   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-success shadow h-100 py-2">
       <div class="card-body">
         <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Les charges (Janvier - Mars)</div>
             <div class="h5 mb-0 font-weight-bold text-gray-800">
               {{ number_format($montant['tri'],2,'.',' ')}} Da

             </div>
           </div>
           <div class="col-auto">
             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
           </div>
         </div>
       </div>
     </div>
   </div>

   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-info shadow h-100 py-2">
       <div class="card-body">
         <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Les charges (Janvier - Juin)</div>
             <div class="row no-gutters align-items-center">
               <div class="col-auto">
                 <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                  {{ number_format($montant['semestre'],2,'.',' ')}} Da

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

   <!-- Pending Requests Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-warning shadow h-100 py-2">
       <div class="card-body">
         <div class="row no-gutters align-items-center">
           <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Les charges (Jan - Decembre)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
               {{ number_format($montant['annee'],2,'.',' ')}} Da
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

    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                <h4 class="">Les charges du magazin</h4>
                <a href=" {{route('frais.create')}} " class="d-none d-sm-inline-block btn btn-outline-success shadow-sm"><i class="fas fa-plus mr-2"></i>Nouveau charge</a> 
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Montant</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($frais as $f)
                            <tr>
                              <td> {{$loop->iteration}} </td>
                              <td> {{$f->dateFrais}} </td>
                              <td> {{$f->typeFrais != 'autre' ? $f->typeFrais : $f->autreFraisType }} </td>
                              <td> {{ number_format($f->montant,'2','.',' ') }} Da</td>
                                <td>
                                    <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                            <option selected disabled>Action</option>
                                            <option value=" {{url('/frais/'.$f->id.'/edit')}} ">Mettre à jours</option>
                                            <option value="{{route('frais.supprime',$f->id)}}">Supprime</option>
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