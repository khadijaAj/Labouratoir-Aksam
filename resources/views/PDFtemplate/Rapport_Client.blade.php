<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document Exporté - Aksam Labs</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

</head>



    <style>
    html,
    body,
    div,
    span,
  
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
 
    var,
    b,
    u,
    i,
    center,

    table,
  
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
  
    footer,
    header
 {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
        display: block
    }

    body {
        line-height: 1
    }

    ol,
    ul {
        list-style: none
    }

    blockquote,
    q {
        quotes: none
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
        content: '';
        content: none
    }

    table {
        border-collapse: collapse;
        
        border-spacing: 0;
        border : none;
    }

    body {
        height: 840px;
        width: 692px;
        margin: auto;
        font-family: 'Open Sans', sans-serif;
        font-size: 10px
    }

    strong {
        font-weight: 700
    }

    #container {
        position: relative;
        padding: 4%
    }

    #header {
        height: 80px
    }

    #header>#reference {
        float: right;
        text-align: right
    }

    #header>#reference h3 {
        margin: 0
    }

    #header>#reference h4 {
        margin: 0;
        font-size: 85%;
        font-weight: 600
    }

    #header>#reference p {
        margin: 0;
        margin-top: 2%;
        font-size: 85%
    }

    #header>#logo {
        width: 70%;
        float: left
    }

    #fromto {
        height: 160px
    }

    #fromto>#from,
    #fromto>#to {
        width: 45%;
        min-height: 90px;
        margin-top: 30px;
        font-size: 85%;
        padding: 1.5%;
        line-height: 120%
    }

    #fromto>#from {
        float: left;
        width: 45%;
        background: #efefef;
        margin-top: 30px;
        font-size: 85%;
        padding: 1.5%
    }

    #fromto>#to {
        float: right;
        border: solid white 1px
    }

    #items {
        margin-top: 10px
    }

    #items>p {
        font-weight: 700;
        text-align: right;
        margin-bottom: 1%;
        font-size: 65%
    }




    #footer {
        margin: auto;
        position: absolute;
        left: 4%;
        bottom: 4%;
        right: 4%;
        border-top: solid grey 1px;
    }

   
    </style>
            @foreach ($rapports as $rapport)
            <body>

<div id="container" style=" position: relative;
        padding: 4%;">
        <div id="header" style="  margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;">

            <div id="logo" style="width: 70%;
        float: left;">
                <img src="images/logo.png" alt="">

                <div style="margin-top:-110px; margin-left:143px;
       ">
                    <br> <br> <br>
                    <h5 style="">Aksam Lab</h5>
                    <br>
                    <h5 style="font-size:10px;margin-bottom:5px;">Km 42,6 , Laghdira-cercle Bir Jdid <br>24152 El Jadida
                        - Maroc.
                    </h5>
                    <h5 style="font-size:10px;">Téléphone: +212 661-966607
                        <br> Email: Contact@aksam.ma
                    </h5>
                </div>
            </div>

            <div id="reference" style=" float: right;
        text-align: left;">
                <br>
                <p style="margin:0;margin-top:1%;font-size:85%;">Date d'exportation : {{ $date }}</p>
            </div>
        </div>

        <hr style=" border: 2px solid green;
  border-radius: 1px;">
        <div>
            <center>
                <p style="font-size:16px;"><b><u>Rapport D'analyse client</u></b></p>
            </center>
        </div>
      
<div id="container"> 
<table align="center" width="100%"  border="0"> 
<tr >
<td style="padding-right: 32px;"><label style="font-size: 11px;" for="num">N° : {{ $rapport->Num }}</label></td>
<td style="padding-right: 23px;"><label  style="font-size: 11px;" for="client">Client : {{ $rapport->client->name }}</label></td> <td> 
<td ><label  style="font-size: 11px;" for="echantillon">Echantillon : {{ $rapport->produit->name}}</label></td> <td> 

</tr> 


</tr> 
</table>
<table align="center" width="100%" cellpadding="40" cellspacing="60" border="0"> 
 

<tr> 
<td  ><label  style="font-size: 11px;" for="ref_client">Référence Client : {{ $rapport->client->Reference }}</label></td> 
<td ><label style="font-size: 11px;"  for="date_reception">&nbsp;	&nbsp;	Date de reception : {{ $rapport->date_reception}}</label></td> 
<td ><label style="font-size: 11px;" for="date_analyse">	&nbsp;	&nbsp;	&nbsp;	&nbsp;Date d'analyse  : {{ $rapport->date_analyse}}</label></td> 
</tr> 
<tr> 

</tr> 
</table>  
    
   

    </div>   
   
    <p style=" font-weight: 700;text-align: right;margin-bottom: 1%;font-size: 14px;">Coût D'analyse : {{ $rapport->Cout}}</p>

    </div> 

    <table style="border-left: 1px solid #F2F4F3;
    border-right: 1px solid #F2F4F3;border-bottom: 1px solid #F2F4F3;" class="table table-bordered  ">
        <thead>
            <tr style="border:none;">
                <th
                    style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    Nature d'analyse</th>
                <th
                    style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    Sur brute</th>
                <th
                    style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    Sur séche</th>
                <th
                    style="padding-top: 12px; padding-bottom: 12px; text-align: left;padding: 8px;">
                    Unité</th>
                <th
                    style="padding-top: 12px; padding-bottom: 12px; text-align: left;  padding: 8px;">
                    Incertitude</th>
                <th
                    style="padding-top: 12px; padding-bottom: 12px; text-align: left;padding: 8px;">
                    Méthode</th>
                <th
                    style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    Cible</th>
            </tr>
        </thead>
        <tbody>
            @inject('value','App\Value') {{-- inject before foreach --}}
            @inject('mesure','App\Mesure') {{-- inject before foreach --}}
            @foreach($standards->nutriments as $nutriment)
            @if ($value->where('crapport_id','=',$rapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surseche') !== NULL || $value->where('crapport_id','=',$rapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') !== NULL )

            <tr style="border:none;" >
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                    <center>{{ $nutriment->name }}</center>
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;" >
                    <center>{{ $value->where('crapport_id','=',$rapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}</center>
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                    <center> {{ $value->where('crapport_id','=',$rapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surseche') }}</center>
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                    <center>  {{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('unite') }}</center>
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                    <center> {{ $nutriment->incertitude }}</center>
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                    <center>{{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('methode') }}</center>
                </td  >
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                    <center>{{ $nutriment->cible }}</center>
                </td>
            </tr>
            @else
            <tr id="rows" >
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                   
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
   
    <div>
    <table  class="table " style="
 
  height: 45px;
  ">
<tr>
   
  <th style="border-right: 1px solid #F2F4F3;border-left: 1px solid #F2F4F3;"> <center>Résponsable laboratoire</center> </th>
  <th style="border-right: 1px solid #F2F4F3;"> <center>DQP </center></th>

</tr>
<tr id="rows" >
                <td style="border-right: 1px solid #F2F4F3;border-left: 1px solid #F2F4F3;border-bottom: 1px solid #F2F4F3;">
                    <center>HASNI NOURA</center>
                </td>
                <td style="border-right: 1px solid #F2F4F3;border-bottom: 1px solid #F2F4F3;">
                    <center>EL HASSNAOUI SABAH</center>
                </td>
</tr>
</table>
</div>
<center><strong>validé le : {{ $date }}</strong></center>
    <div id="footer" style="  position:absolute;
   bottom:0;
   width:100%;
   height:100px;   
 "><br><br>
<p>   <strong>AKSAM SARL:</strong> KM. 5,3, RP. 3475, Laghdira - Cercle Bir Jdid - El Jadida - Tél : 06 28 39 85 00 - Fax : 06 28 39 84 00 </p><br>
 <p style=" font-weight: 5px;">Rc : 223975 - PATENTE : 37985675 - IF : 40226585 - CNSS : 8553283 - ICE : 000204094000032 - Email : alfaksam@gmail.com  </p></div>
 
</body>
@endforeach

</html>