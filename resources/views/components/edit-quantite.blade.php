<div>
  <div class="modal fade" id="editQuantite" tabindex="-1" role="dialog" aria-labelledby="editQuantiteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editQuantiteLabel">Modifier quantité du produit séléctionné</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="d-flex">
                <label for="" class="my-auto">Quantité</label>
                <input type="number" class="form-control" wire:model="newQuantite">

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Ferme</button>
          <button type="button" class="btn btn-primary" wire.click="changeQuantite()">Confirmé</button>
        </div>
      </div>
    </div>
  </div>
</div>