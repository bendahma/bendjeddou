<div>
    <!-- Button trigger modal -->
  <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addClientModel">
    Ajouté
  </button>

  <!-- Modal -->
  <div wire:ignore.self  class="modal fade" id="addClientModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouté un client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="addClient">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" id="" placeholder="Nom" wire:model ="nomClient" >

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" id="" placeholder="Prenom" wire:model ="prenomClient"  >
                            </div>
                        </div>

                    </div>


                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouté</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ferme</button>
                    </div>
             </form>

      </div>
    </div>
  </div>



</div>
