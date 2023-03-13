<div>
       <div class="card shadow mb-4">
       <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold ">Les Produits Les Plus Vendu</h6>
       </div>
       <!-- Card Body -->
       <div class="card-body">
        <div class="row">
            <div class="col-lg-2">
                <select name="" id="" class="custom-select" wire:model="items">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-lg-3">
                <select name="" id="" class="custom-select" wire:model="sellOrder">
                    <option value="DESC">Plus vendu</option>
                    <option value="ASC">Moin Vendu</option>
                </select>
            </div>
        </div>
          <table class="table mt-1 font-weight-bold">
             <thead>
             <tr>
                <th>Réf</th>
                <th>Produit</th>
                <th>Quantité vendu</th>
             </tr>
             </thead>
             <tbody>
                @forelse ($products as $product)
                <tr>
                   <td style="width:10%"> {{$product->refProduit}} </td>
                   <td style="width:70%"> {{$product->name}} </td>
                   <td> {{$product->qtt}} </td>
                </tr>
                @empty
                <tr>
                   <td colspan="3" class="text-center">Aucun produit est disponible</td>
                </tr>
                @endforelse
             </tbody>
          </table>
          <div>
            Affiche {{($products->currentpage()-1)*$products->perpage()+1}} à {{$products->currentpage()* $items }} Du {{$products->total()}} Produits
        </div>
        {{$products->links('vendor.pagination.bootstrap-4')}}

       </div>
       </div>
</div>
