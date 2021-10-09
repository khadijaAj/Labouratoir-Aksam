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
<main>
@foreach($vrapports as $vrapport)
<div style="clear:both; position:relative; margin-top:5%;margin-bottom:none;" class='flex-container ' style="display: flex;">
                <div style=" width:200pt;"class="flex-child">
                    
                    <div class="panel panel-default" style="margin-top:5%;margin-bottom:none;">
                    <h5><center><b>Client</b></center></h5>
                        <div class="panel-body">
                              NOM: {{$vrapport->client->name }}<br />
                             ADRESSE: {{$vrapport->client->adresse}}<br />
                              N° TELEPHONE: {{$vrapport->client->tele}} <br />
                           EMAIL :     {{$vrapport->client->email}}<br />
                        </div>
                    </div>
                </div>
                <div style= "margin-top:40px;  margin-left: 400px;width:200pt;clear:both; position:relative;" class="flex-child">

                    <div class="panel panel-default" style="margin-top:5%;margin-bottom:none;">
                    <h5><center><b>Commercail<b></center></h5>
                        <div class="panel-body">
                             
                              NOM:
                             <br />
                             <br />
                            <br />
                        </div>
                        </div>
                    </div>
                </div>

<div class="panel panel-default" style="margin-top:none;margin-top:none;width:100%;clear:both; position:relative;">
    <div class="panel-body">
      <div>Numéro de visite : {{$vrapport->num}}</div>
      <div>Famille client: {{$vrapport->client->familleCl}}</div>
      <div>Salle Traite: {{$vrapport->client->salleTraite}}</div>
</div> 
       <br/>
</div>
</div>
<div id="reference" style=" float: right;
        text-align: left;">
                <br>
                <p style="margin:0;margin-top:1%;font-size:95%;">Date de visite: {{$vrapport->date_debut }}</p>
            </div>
    <div class="bs-example">
              <p><b>Gamme {{ $vrapport->typevisite }}<b></p>
</div>
        <hr>
        
                <div class="table-responsive">
                <table class="table table-bordered" style="margin:20px;">
                        <thead>
                            <tr>
                                <th>
                                    <center>Libellé</center>
                                </th>
                                <th>
                                    <center>Valeur</center>
                                </th>
                                
                            </tr>
                        </thead>
                      @if($vrapport['typevisite']=='OV')
                        <tbody >
                      
                       @foreach($vrapport->elevages as $item)
                        <tr>
                                <td>
                                @if($item->standardsov()->exists())
                                   <center>{{ $item->standardsov->libelle}}</center>
                                  </td>
                                 @endif
                                   
                                <td>
                                    <center>{{$item->value_cr}}</center>
                               </td>
                    
                            </tr>
                        @endforeach
                        </tbody>
                        @elseif($vrapport['typevisite']=='BV')
                        <tbody >
                       @foreach($vrapport->elevages as $item)
                        <tr>
                                <td>
                                @if($item->standardsbv()->exists())
                                   <center>{{ $item->standardsbv->libelle}}</center>
                                  </td>
                                 @endif
                                <td>
                                    <center>{{$item->value_cr}}</center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <tbody >
                       @foreach($vrapport->elevages as $item)
                        <tr>
                                <td>
                                @if($item->standardsvl()->exists())
                                   <center>{{ $item->standardsvl->libelle}}</center>
                                  </td>
                                 @endif
                                   
                                <td>
                                    <center>{{$item->value_cr}}</center>
                                </td>
                                
                    
                            </tr>
                            @endforeach
                        </tbody>
                    @endif

</table>
</div>
@endforeach
</main>

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