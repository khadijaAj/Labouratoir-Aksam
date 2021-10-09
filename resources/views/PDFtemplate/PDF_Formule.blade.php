<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formule-PDF</title>
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
            #footer {
        
    }
        </style>
   
  
    </head>
    <body>
        <header style="margin :10px;">
            <div style="position:absolute; left:0pt; width:250pt;">
                <img src="images/logo.png" alt="">
            </div>
            <div style="margin-left:70%;  ">
               <div id="company" style="margin:10px;">
                 <h2 class="name" style="font-size:15px;">AKSAM(Alf Kessab Al Maghreb)</h2>
                <div>Km 42,6 , Laghdira-cercle Bir Jdid <br>24152 El Jadida - Maroc.</div>
                <div>Téléphone: +212 661-966607</div>
                 <div>Email: Contact@aksam.ma</div>
            </div>
            </div>
            <hr style=" border: 2px solid green;border-radius: 1px; width:100%;"> 
</header>
@foreach($formules as $formule)
<div id="reference" style=" float: right;text-align: left;">
                <br><p style="margin:0;margin-top:1%;font-size:85%;">Date d'exportation : {{ $date }}</p>
 </div>
  <br>  
<div id="container">
<div style="margin-left:75%;">
               <div id="company" style="margin:10px;">
                 <h3 class="name" style="font-size:15px;"> Client : {{ $formule->client->name }}</h3>
                <div>Date de creation : {{ $formule->date_creation}}</div>
            </div> 
  </div>

<br>

<div class="table-responsive">
    <table class="table "  id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color:#FAFAFA;">
            <tr>
                <th>
                    <center>Ensilage</center>
                </th>
                <th>
                    <center>Foin</center>
                </th>
                <th>
                    <center>Paille</center>
                </th>
                <th>
                    <center>Fourrage</center>
                </th>
                <th>
                    <center>Aliment</center>
                </th>
                <th>
                    <center>Trx soja</center>
                </th>
                <th>
                    <center>Coque Soja</center>
                </th>
                <th>
                    <center>CMV</center>
                </th>
                <th>
                    <center>Mais broyé</center>
                </th>
                <th>
                    <center>PSB</center>
                </th>
                <th>
                    <center>Bicarbonate</center>
                </th>
                <th>
                    <center>Niveau Ensilage</center>
                </th>
                <th>
                    <center>Niveau Production</center>
                </th>
                <th>
                    <center>Autre</center>
                </th>
                <th>
                    <center>Valeur MS</center>
                </th>
               

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <center>{{ $formule->ensilage}}</center>
                </td>

                <td>
                    <center>{{ $formule->foin}}</center>
                </td>

                <td>
                    <center>{{ $formule->paille}}</center>
                </td>
                <td>
                    <center>{{ $formule->fourrage}}</center>
                </td>
                <td>
                    <center>{{ $formule->aliment}}</center>
                </td>

                <td>
                    <center>{{ $formule->trxSoja}}</center>
                </td>

                <td>
                    <center>{{ $formule->coqueSoja}}</center>
                </td>
                <td>
                    <center>{{ $formule->cmv}}</center>
                </td>
                <td>
                    <center>{{ $formule->maisbroye}}</center>
                </td>

                <td>
                    <center>{{ $formule->psb}}</center>
                </td>
                <td>
                    <center>{{ $formule->bicarbonate}}</center>
                </td>
                <td>
                    <center>{{ $formule->niveauensilage }}</center>
                </td>
                <td>
                    <center>{{ $formule->niveauproduction }}</center>
                </td>
                <td>
                    <center>{{ $formule->autre}}</center>
                </td>

                <td>
                    <center>{{ $formule->valeurms}}</center>
                </td>
                
            </tr>


</tbody>
</table> 
  
</div>


<center>    <div id="footer" style="  position:absolute;
   bottom:0;
   width:100%;
   height:100px;   
 "><hr style=" border: 2px solid green;border-radius: 1px; width:100%;"> <br><br>
<p>   <strong>AKSAM SARL:</strong> KM. 5,3, RP. 3475, Laghdira - Cercle Bir Jdid - El Jadida - Tél : 06 28 39 85 00 - Fax : 06 28 39 84 00 </p><br>
 <p style=" font-weight: 5px;">Rc : 223975 - PATENTE : 37985675 - IF : 40226585 - CNSS : 8553283 - ICE : 000204094000032 - Email : alfaksam@gmail.com  </p></div>
 </center>
</body>
@endforeach

</html>