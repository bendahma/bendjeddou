<div>
    <div class="alert alert-light border border-success shadow">
        <div class="text-dark pt-1">
            <h3> <span> <i class="fas fa-cash-register fa-3x mr-1"></i> </span>
                <span class="font-weight-bold" style="font-size:3.8rem;font-family: 'Economica', sans-serif;color:black">
                {{number_format($bonVente->montantTotal,2,'.',' ')}}
                </span> DA
                {{-- @if($remiseExist) --}}
                    <span class="font-weight-bold" style="font-size:2.9rem;font-family: 'Economica', sans-serif;color:rgb(196, 191, 191);text-decoration:line-through">
                        {{-- {{number_format( $montantTotalBonVenteSansRemise,2,'.',' ')}}  --}}
                        {{-- <span style="font-size:1.5rem"> DA </span> --}}
                    </span>
                {{-- @endif --}}
            </h3>
        </div>
    </div>
    <div class="alert alert-light border border-success shadow">
        <div class="row">
            <div class="col">
                <div >
                    <span style="font-size:0.8rem;font-weight:700;"> Montant Total </span>
                    <h5>
                        <span class="font-weight-bold" style="font-size:1.5rem;font-family: 'Economica', sans-serif;color:black">
                        {{number_format($bonVente->montantTotal,2,'.',' ')}}
                        </span> DA
                    </h5>
                </div>
            </div>

            <div class="col">
                <div style="color:rgb(33, 223, 105)">
                    <span style="font-size:0.8rem;font-weight:700;"> Montant Paye</span>
                    <h5>
                         <span class="font-weight-bold" style="font-size:1.5rem;font-family: 'Economica', sans-serif;">
                           {{number_format($bonVente->montantPayer,2,'.',' ')}}
                        </span> DA
                    </h5>

                </div>
            </div>
            <div class="col">
                <div style="color:rgb(247, 5, 5)">
                    <span style="font-size:0.8rem;font-weight:700;"> Montant Reste</span>
                    <h5>
                        <span class="font-weight-bold" style="font-size:1.5rem;font-family: 'Economica', sans-serif;">
                        {{number_format($bonVente->montantReste,2,'.',' ')}}
                        </span> DA
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
