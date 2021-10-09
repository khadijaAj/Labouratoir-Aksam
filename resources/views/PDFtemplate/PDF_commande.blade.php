<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>commande</title>
        <style>
            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            h1,h2,h3,h4,h5,h6,p,span,div { 
                font-family: DejaVu Sans; 
                font-size:10px;
                font-weight: normal;
            }
            header{
              margin: 20px;
            }
            th,td { 
                font-family: DejaVu Sans; 
                font-size:10px;
            }
            .panel {
                margin-bottom: 20px;
                background-color: #fff;
                border: 1px solid transparent;
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }
            .panel-default {
                border-color: #ddd;
            }
            .panel-body {
                padding: 15px;
            }
            table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 0px;
                border-spacing: 0;
                border-collapse: collapse;
                background-color: transparent;
            }
            thead  {
                text-align: left;
                display: table-header-group;
                vertical-align: middle;
            }
            th, td  {
                border: 1px solid #ddd;
                padding: 6px;
            }
            .well {
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            }
          
             .flex-container {
  display: flex;
 ;
}

        
    
        </style>
   
  
    </head>
    <body>
        <header>
            <div style="position:absolute; left:0pt; width:250pt;">
                <img src="images/logo.png" alt="">
            </div>
            <div style="margin-left:300pt;">
               <div id="company" style="margin:10px;">
                 <h2 class="name" style="font-size:15px;">AKSAM(Alf Kessab Al Maghreb)</h2>
                <div>Km 42,6 , Laghdira-cercle Bir Jdid <br>24152 El Jadida - Maroc.</div>
                <div>Téléphone: +212 661-966607</div>
                 <div>Email: Contact@aksam.ma</div>
            </div>
            </div>
            <hr style=" border: 2px solid green;border-radius: 1px; width:100%;"> 
</header>
<main>
@foreach ($commandes as $commande)
            <div style="clear:both; position:relative;" class='flex-container ' style="display: flex;">
                <div style=" width:200pt;"class="flex-child">
                    <h4 style=" margin-left:10px; font-size:10px;"><b>Adresse de facturation:</b></h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                              NOM: {{$commande->client->name }}<br />
                             ADRESSE: {{$commande->client->adresse}}<br />
                              N° TELEPHONE: {{$commande->client->tele}} <br />
                           EMAIL :     {{$commande->client->email}}<br />
                        </div>
                    </div>
                </div>
                <div style= "margin-top:40px; margin-left: 400px;width:200pt;clear:both; position:relative;" class="flex-child">
                <h4 style=" margin-top:10px; font-size:10px;" hidden>ghbghyt</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                                 Réference :  {{$commande->reference }}<br />
                                  Date :   {{$commande->date}}<br />
                                  Condition de régelement :{{$commande->conditionReglement}} jours 
                           <br/>
                        </div>
                    </div>
                </div>
            </div>

<table  class="table table-bordered" border="0">
        <thead>
          <tr style="border-collapse: collapse;">
            <th class="desc"><center>Produit</center></th>
            <th class="qty"><center>Qty</center></th>
            <th class="prixu"><center>Prix unitaire </center></th>
            <th class="taxe"><center>TVA</center></th>
            <th class="total"><center>Prix total</center></th>
          </tr>
        </thead>
        <tbody>
    <!-- Initialisation du total général à 0 -->
    @php $prixtotal = 0 @endphp
    @php $subtotal=0 @endphp
    @php $ttc=0 @endphp
    @php $grandprix=0 @endphp


<!-- On parcourt les produits du panier en session : session('basket') -->
    @foreach($commande->detailscommande as  $item)
    
    <!-- On incrémente le total général par le total de chaque produit du panier -->
    @php $prixtotal += ($item->quantity) * ($item->produit->prixu) @endphp<!--prix total sans tva pour chaque produit-->
    @php $subtotal += $prixtotal @endphp
    @php $ttc +=  $prixtotal*$item->produit->taxe @endphp
    @php $grandprix =$ttc +$subtotal @endphp
   

    <tr>
            <td class="desc"><center>{{$item->produit->name}}</center></td>
            <td class="qty"><center>{{$item->quantity}}  {{$item->unite}}</center></td>
            <td class="prixu"><center>{{$item->produit->prixu}}</center></td>
            <td class="taxe"><center>{{$item->produit->taxe *100}}%</center></td>
            <td class="totla"><center>{{ $prixtotal }} DH</center></td>
           <!-- Le total du produit = prix * quantité -->
            
         </tr>
    @endforeach

     </tbody>
    </table>
    <div style="margin-left:70%; width=100px;   margin-top:20px;border:none;">
                    <h5>Total:</h5>
                    <table class="table table-hover">
                        <tbody>
                            <tr  style="">
                                <td  style="" ><b>Total net :</b></td>
                                <td  style="">{{$subtotal}} DH</td>
                            </tr>
                           
                                <tr  style="">
                                    <td  style=""><b>TTC</b></td>
                                    <td  style="">{{$ttc}} DH</td>
                                </tr>
                            
                            <tr  style="">
                                <td   style=""><b>TOTAL</b></td>
                                <td  style="color:green;">{{ $grandprix }} DH</td>
                            </tr>
                        </tbody>
                    </table>
  </div>
        </main>
@endforeach
<center>    <div id="footer" style="  position:absolute;
   bottom:0;
   width:100%;
   height:100px;   
 "><hr style=" border: 2px solid green;border-radius: 1px; width:100%;"> <br><br>
<p>   <strong>AKSAM SARL:</strong> KM. 5,3, RP. 3475, Laghdira - Cercle Bir Jdid - El Jadida - Tél : 06 28 39 85 00 - Fax : 06 28 39 84 00 </p><br>
 <p style=" font-weight: 5px;">Rc : 223975 - PATENTE : 37985675 - IF : 40226585 - CNSS : 8553283 - ICE : 000204094000032 - Email : alfaksam@gmail.com  </p></div>
 </center>
</body>
</html>
        <!-- Page count -->
  