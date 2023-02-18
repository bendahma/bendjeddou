@extends('layouts.adminTemplate')

@section('content')

    <div class="card card-default">
        <div class="card-header mb-0 pb-0">
            <h4  style="font-weight: 700; color:black">{{isset($frais) ? 'Modifier Les Informations Du ' : 'Ajouté une Nouvelle'}} Charge</h4>
        </div>
        <div class="card-body">
            <form action=" {{ isset($frais) ? route('frais.update',$frais->id) : route('frais.store')}} " method="POST" enctype="multipart/form-data">
                 @csrf
                  @if (isset($frais))
                      @method('PATCH');
                  @endif
              
               
               <div class="">
                    
                     <div class="row">
                        
                        <div class="col">
                           <div class="form-group">
                              <label for="">Type Du Charge</label>
                                <select name="typeFrais"  class="custom-select" id="frais">
                                    <option selected disabled>Choisi le type du frais payé</option>
                                    <option value="Allocation du magasin" {{isset($frais) && $frais->typeFrais == 'Allocation du magasin' ? 'selected' : '' }} >Allocation du magasin</option>
                                    <option value="Electricité" {{isset($frais) && $frais->typeFrais == 'Electricité' ? 'selected' : '' }}>Electricité</option>
                                    <option value="Eaux" {{isset($frais) && $frais->typeFrais == 'Eaux' ? 'selected' : '' }}>Eaux</option>
                                    <option value="Téléphone / Internet" {{isset($frais) && $frais->typeFrais == 'Téléphone / Internet' ? 'selected' : '' }}>Téléphone / Internet</option>
                                    <option value="Maintenance" {{isset($frais) && $frais->typeFrais == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                                    <option value="autre"  {{isset($frais) && $frais->typeFrais == 'autre' ? 'selected' : '' }}>Autre</option>
                                </select>
                                 
                           </div>
                        </div>
                        <div class="d-none" id="autreFrais">
                           <div class="col">
                              <div class="form-group">
                                 <label for="">Type De Frais</label>
                                 <input type="text" class="form-control" name="autreFraisType" placeholder="Autre frais" 
                                          value=" {{isset($frais) && $frais->typeFrais == 'autre' ? $frais->autreFraisType : '' }} ">
                              </div>
                           </div>
                        </div>
                       
                        <div class="col">
                           <div class="form-group">
                                 <label for="">Date Du Paiement</label>
                                 <input type="date" class="form-control" name="dateFrais" value="{{isset($frais) ? $frais->dateFrais : '' }}">
                                 
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                                 <label for="">Montant Paie</label>
                                 <input type="text" class="form-control" name="montant" value="{{isset($frais) ? $frais->montant : '' }}">
                                 
                           </div>
                        </div>
                        
                     </div>
                  
                   
                     <div class="row mt-3">
                        
                        <div class="col">
                           <div class="form-group">
                                 <input type="submit" value="{{isset($frais) ? 'Mettre à jours' : 'Ajouté'}} charge" class="btn btn-outline-success btn-block">
                           </div>
                        </div>
                     
                        <div class="col">
                           <div class="form-group">
                                 <input type="reste" value="Supprime" class="btn btn-danger btn-block">
                           </div>
                        </div>
                     </div>
               </div>
            
            </form>
        </div>
    </div>

@endsection


@section('scripts')
    <script type="text/javascript">
        document.getElementById('frais').addEventListener('change',()=>{
            var el = document.getElementById('frais');
            var e = el.options[el.selectedIndex].value;
            if(e == 'autre') { document.getElementById('autreFrais').classList.remove("d-none") }
            else {document.getElementById('autreFrais').classList.add("d-none")};
        });
    </script>
@endsection