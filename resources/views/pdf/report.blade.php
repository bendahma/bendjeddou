<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="w-full flex justify-between items-center" style="display: flex;justify-content: space-between; align-items: center;  width: 100%; ">
        <div class="">
            {{-- <img src="{{ asset('img/logo.svg') }}" alt="Logo"> --}}
        </div>
        <div class="">
            <h1  style="font-size: 1.25rem; line-height: 1rem; font-weight: 700; text-align: center; width: 100%; ">BENDJEDDOU ÉLECTROMÉNAGER</h1>
            <h1 style="font-size: 1rem; line-height: 1rem; font-weight: 700; text-align: center; width: 100%; ">Rue Grande Maghreb Cité Zaaf Rabah</h1>
            <h1 style="font-size: 1rem; line-height: 1rem; font-weight: 700; text-align: center; width: 100%; ">Azzada Skikda</h1>
            <h1 style="font-size: 0.5rem; line-height: 1rem; font-weight: 700; text-align: center; width: 100%; "> {{ $magazin->telephone  }} / {{ $magazin->fix }} / {{ $magazin->fax }}</h1>
        </div>
        <div class="">
            {{-- <img src="{{ asset('img/logo.svg') }}" alt="Logo"> --}}
        </div>
    </div>
   
    <div class="" style="display: flex;justify-content: center; align-items: center;  width: 100%; ">
        <h1 class="" style="border: 2px dotted darkred;  padding: 2rem 0 1rem 0; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);  font-size: 2.5rem; line-height: 1rem; font-weight: 700; text-align: center; width: 100%; color:darkred;">FACTURE</h1>
    </div>
    <div style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
        <table style="width: 100%; ">
            <tbody>
                <tr>
                    <td>
                        <div style="border: 1px solid black; border-radius: 0.25rem;">
                            <table style="padding: 1rem 0.25rem;">
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold;">Numéro Facture</td>
                                        <td> : {{ $bonVente->id }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Date le</td>
                                        <td> : {{ $bonVente->get_created_at($bonVente->created_at) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td></td>
                    <td >
                        @if( $bonVente->client->id != null)
                            <div style="border: 1px solid black; border-radius: 0.25rem;">
                                <table style="padding: 1rem 0.25rem;">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: bold;">N° client</td>
                                            <td> : {{ $bonVente->client->id }} </td>
                                        </tr>
                                    
                                        <tr>
                                            <td style="font-weight: bold;">Nom &amp; Prenom</td>
                                            <td> : {{ $bonVente->client->firstName . " " . $bonVente->client->lastName }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
       
    
      
    </div>
    

    <br>

    <div  style="width: 100%">
        
        
            <table style="color:000000; width:100%" style="width: 100%; border-collapse: collapse;">
                    <tr style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">
                        <td style="font-weight:bold" style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">Réf produit</td>
                        <td style="font-weight:bold"style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">Désignation Produit</td>
                        <td style="font-weight:bold" style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">Quantité</td>
                        <td style="font-weight:bold" style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">PU HT</td>
                        <td style="font-weight:bold" style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">Montat H.T</td>
                        
                    </tr>
            
                    @foreach ($bonVente->products as $product)
                        <tr style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">
                            <td  style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">{{ $product->refProduit }}</td>
                            <td style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">{{ $product->name }}</td>
                            <td style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">{{ $product->pivot->quantite }}</td>
                            <td style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">{{ number_format(floatval($product->pivot->montantTotal) / floatval($product->pivot->quantite),2,'.',' ') }}</td>
                            <td style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">{{ number_format($product->pivot->montantTotal,2,'.',' ') }} Da</td>
                        </tr>
                    @endforeach
                    <tr >
                        <td ></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">

                            <table style="color:000000; width:100%" style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td></td>
                                    <td >{{ number_format($bonVente->montantTotal,2,'.',' ') }} Da </td>
                                </tr>
                                {{-- <tr>
                                    <td>TVA :</td>
                                    <td style="font-weight: bolder; font-size:1rem">{{ number_format((($bonVente->montantTotal*19)/100),2,'.',' ') }} Da </td>
                                </tr>
                                <tr>
                                    <td>Remise :</td>
                                    <td style="font-weight: bolder; font-size:1rem">0 Da </td>
                                </tr>
                                <tr>
                                    <td>Total :</td>
                                    <td style="font-weight: bolder; font-size:1rem">{{ number_format(($bonVente->montantTotal + (($bonVente->montantTotal*19)/100)),2,'.',' ') }} Da  </td>
                                </tr> --}}
                            </table>
                        </td>
                    </tr>
            </table>

    </div>
    
    <br><br>
    
    <div style="width: 100%;">
       <span style="font-size:1rem; padding:10px 0;">Arrête la présente facture à la somme de : </span> <br>
       <span style="font-weight: bold;"> {{ $motantLettre }}  </span> Dinars Algérien
    </div>

    <br><br>

    <div  style="width: 100%;">
        <div style="">
            <table >
                <tbody >
                    <tr >
                        <td style="font-weight:bold">Montant Paie : </td>
                        <td>{{ number_format($bonVente->montantPayer,2,'.',' ') }} Da</td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr >
                        <td style="font-weight:bold">Montant Reste : </td>
                        <td>{{ number_format($bonVente->montantReste,2,'.',' ') }} Da </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
       
    </div>

    <br><br>

    <div style="width: 100%; text-align:right;">
        <span style="font-size:1.75rem; font-weight:bolder; padding:10px 0; padding-right:5rem; text-decoration:underline" >Le gérant</span> 
     </div>
</body>
</html>