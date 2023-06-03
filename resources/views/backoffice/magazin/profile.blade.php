@extends('layouts.adminTemplate')

@section('content')

    <div class="card card-default">
        <div class="card-header mb-0 pb-0">
            <h4  style="font-weight: 700; color:black">Les Informations du magazin</h4>
        </div>
        <div class="card-body">
            <form action="{{route('magazin.updateProfile',1)}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PATCH')
               <div class="row">
               <div class="col-lg-3 text-center">
                  <img src=" {{ isset($magazin) && !empty($magazin->logo) ?  asset('/storage/'.$magazin->logo) : asset('img/logo.png')}} "
                           class="rounded-circle" alt="" height="200px" width="200px">
               </div>
               <div class=" ml-3 col">
                    
                     <div class="row">

                        <div class="col">
                           <div class="form-group">
                                 {{-- <label for="">Nom</label> --}}
                                 <input type="text" class="form-control" id="" placeholder="Nom magazin" name="name" value="{{isset($magazin) ? $magazin->name : ''}}">

                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                                 {{-- <label for="">Prenom</label> --}}
                                 <input type="text" class="form-control" id="" placeholder="address du magazin" name="address" value="{{isset($magazin) ? $magazin->address : ''}}">

                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                                 {{-- <label for="">Prenom</label> --}}
                                 <input type="text" class="form-control" id="" placeholder="Commune du magazin" name="address" value="{{isset($magazin) ? $magazin->commune : ''}}">

                           </div>
                        </div>

                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                                 <input type="text" class="form-control" id="" placeholder="N° Téléphone Fix" name="fix" value="{{isset($magazin) ? $magazin->fix : ''}}">

                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                                 <input type="text" class="form-control" id="" placeholder="N° Fax" name="fax" value="{{isset($magazin) ? $magazin->fax : ''}}">

                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <input type="text" class="form-control" id="" placeholder="N° Téléphone Portable" name="telephone" value="{{isset($magazin) ? $magazin->telephone : ''}}">
                           </div>
                     </div>
                     </div>
                     <div class="row">

                        <div class="col">
                           <div class="form-group">
                              <input type="integer" class="form-control" id="" placeholder="Registre Commerce" name="registreCommerce" value="{{isset($magazin) ? $magazin->registreCommerce : ''}}">

                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <input type="integer" class="form-control" id="" placeholder="N° Fiscal" name="MF" value="{{isset($magazin) ? $magazin->NFiscal : ''}}">

                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <input type="integer" class="form-control" id="" placeholder="NIF" name="NIS" value="{{isset($magazin) ? $magazin->NIF : ''}}">
                           </div>
                        </div>



                  </div>
                     <div class="row mt-3">

                        <div class="col">
                           <div class="form-group">
                                 <input type="submit" value="Mettre à jours" class="btn btn-outline-success btn-block">
                           </div>
                        </div>

                        <div class="col">
                           <div class="form-group">
                                 <input type="reste" value="Supprime" class="btn btn-danger btn-block">
                           </div>
                        </div>
                     </div>
               </div>
            </div>
            </form>
        </div>
    </div>

@endsection
