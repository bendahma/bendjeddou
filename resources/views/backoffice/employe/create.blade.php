@extends('layouts.adminTemplate')

@section('content')

    <div class="card col-lg-8 card-default d-flex justify-content-center">
        <div class="card-header mb-0 pb-0">
            <h4  style="font-weight: 700; color:black">{{isset($employe) ? 'Modifier Les Informations Du l' : 'Ajouté Nouveau'}} employe</h4>
        </div>
        <div class="card-body">
            <form action="{{isset($employe) ? route('employee.update',$employe->id) : route('employee.store')}}" method="POST" enctype="multipart/form-data">
                  @if (isset($employe))
                      @method('PATCH');
                  @endif
               <div class="row">
               
               <div class=" ml-3 col">
                     @csrf
                     @if(isset($employe))
                        @method('PATCH')
                     @endif
                     <div class="row">
                        
                        <div class="col">
                           <div class="form-group">
                                 {{-- <label for="">Nom</label> --}}
                                 <input type="text" class="form-control" id="" placeholder="Nom" name="nom" value="{{isset($employe) ? $employe->nom : ''}}">
                                 
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                                 {{-- <label for="">Prenom</label> --}}
                                 <input type="text" class="form-control" id="" placeholder="Prenom" name="prenom" value="{{isset($employe) ? $employe->prenom : ''}}">
                                 
                           </div>
                        </div>
                        
                     </div>
                  
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                                 <input type="text" class="form-control" id="" placeholder="Adresse" name="address" value="{{isset($employe) ? $employe->address : ''}}">
                                 
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <input type="text" class="form-control" id="" placeholder="Téléphone" name="telephone" value="{{isset($employe) ? $employe->telephone : ''}}">
                           </div>
                     </div>
                     </div>
                     <div class="row">
                        
                        <div class="col">
                           <div class="form-group">
                              <input type="text" class="form-control" id="" placeholder="Salaire" name="salaire" value="{{isset($employe) ? $employe->salaire : ''}}">
                              
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <select name="assure" id="" class="custom-select">
                                 <option disabled selected>Assuré</option>
                                 <option value="1" {{isset($employe) && $employe->assure == 1 ? 'selected' : ''}} > Oui </option>
                                 <option value="0" {{isset($employe) && $employe->assure == 0 ? 'selected' : ''}} > Non </option>
                              </select>
                              
                           </div>
                        </div>
                     
                     
                  </div>
                     <div class="row mt-3">
                        
                        <div class="col">
                           <div class="form-group">
                                 <input type="submit" value="{{isset($employe) ? 'Mettre à jours' : 'Ajouté'}} employee" class="btn btn-outline-success btn-block">
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
