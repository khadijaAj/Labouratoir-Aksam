<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document Exporté - Aksam Labs</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

</head>
@inject('mesure','App\Mesure')
@inject('value','App\Value')
@foreach ($enrapports as $enrapport)
<body>

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
    header {
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
        border: none;
        font-size: 8.5px
    }

    body {
        height: 840px;
        width: 692px;
        margin: auto;
        font-family: 'Open Sans', sans-serif;
        font-size: 8.5px
    }

    strong {
        font-weight: 700
    }

    #container {
        position: relative;
        padding: 0%
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
        bottom: 1%;
        right: 4%;
        border-top: solid grey 1px;
    }
    </style>


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
                    <h5 style="font-size:15px;">Aksam Lab</h5>
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
                <br><br>
                <p style="margin:0;margin-top:1%;font-size:85%;">Date de réception : {{ $date }}</p>
                <p style="margin:0;margin-top:1%;font-size:85%;">Date de rapport : {{ $date }}</p>

            </div>
        </div>
<br>
        <hr style=" border: 2px solid green;
  border-radius: 1px;">
        <div>
            <center>
                <p style="font-size:16px; font-weight: bold;"><b><u>BULLETIN D'ANALYSE FOURRAGES</u></b></p>
            </center>
        </div>

        <div id="container">
            <table align="center" width="100%" border="0">
            
                <tr>
                <td style="font-size:12px;text-align:left;">Commercial : @if(!is_null($enrapport->commercial)) {{ $enrapport->commercial->name }} @else @endif </td>
                <td style="font-size:12px;text-align:right;">Identifiant :  {{ $enrapport->Identifiant }}</td>
                </tr>

            </table>
            <br>
            <table align="center" width="100%" border="0">
            
            <tr>
            <td style="font-size:12px;text-align:left;">Client : {{ $enrapport->client->name }} </td>
            <td style="font-size:12px;text-align:right;">N° d'échantillon :  {{ $enrapport->num_ech }}</td>
            </tr>

        </table>
        <br>
        <table align="center" width="100%" border="0">
            
            <tr>
            <td style="font-size:12px;text-align:left;">Ref Client : {{ $enrapport->client->Reference }}  </td>
            <td style="font-size:12px;text-align:right;">Type d'échantillon : {{ $enrapport->produit->name }}</td>
            </tr>

        </table>
        <hr style=" border: 1px solid green;
  border-radius: 1px;">
    <table align="center" width="100%" border="0">
            
            <tr>
            <td style="font-size:12px;text-align:left;">Matière séche : {{ $enrapport->xml->DM }} &nbsp; % </td>  
            <td style="font-size:12px;text-align:right;">Matière minérale : {{ $enrapport->xml->Ash }}  &nbsp; % MS </td>  

        </tr>

        </table>
        <br>
        <table align="center" width="100%" border="0">
            
            <tr>
            @php
                $i=$enrapport->xml->Ash;
                $MO=1000-$i*10;
            @endphp
            <td style="font-size:12px;text-align:left;">Matière organique : {{ $MO }} &nbsp; g/Kg MS </td>  
            <td style="font-size:12px;text-align:right;">pH : {{ $enrapport->xml->pH }} </td>  

        </tr>

        </table>
       
       
        </div>

    </div>


    <table cellSpacing='0' cellPadding='0' style="border-left: 1px solid #F2F4F3;
    border-right: 1px solid #F2F4F3;border-bottom: 1px solid #F2F4F3;" class="table table-bordered  ">
        <thead>
            <tr style="border:none;background-color:#22b14c;color: #ffffff;">
                <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    <center>Nutriment</center>
                </th>
                <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    <center>Méthode d'analyse</center>
                </th>
                <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    <center>Valeur</center>
                </th>
                <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    <center>Unité</center>
                </th>
                <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    <center>Valeurs indicatives</center>
                </th>
            </tr>
        </thead>
        <tbody>
        @inject('value','App\Value') {{-- inject before foreach --}}
            @inject('mesure','App\Mesure') {{-- inject before foreach --}}
            @foreach($standards->nutriments as $nutriment)
            @if ($nutriment->name !== 'PH' && $nutriment->name !== 'Matière minérale' && $nutriment->name !== 'Matière organique' && $nutriment->name !== 'Matière séche' )


            <tr style="border:none;">
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                {{ $nutriment->name }}</td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                <center>{{ $mesure->where('standardtype_id','=',$standards->id,)->where('nutriment_id','=',$nutriment->id,)->value('methode') }}</center>

                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                    <center> {{ $value->where('enrapport_id','=',$enrapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}</center>
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                    <center>  {{ $mesure->where('standardtype_id','=',4)->where('nutriment_id','=',$nutriment->id)->value('unite') }}</center>
                </td>
<td style="border:none;border-right: 1px solid #F2F4F3;">

                </td>
              
            </tr>
            @endif
           @endforeach
            <tr style="border:none;">
                <td  colspan="5"  style="border:none;border-right: 1px solid #FFFFFF;border-left: 1px solid #FFFFFF;border-bottom: 1px solid #FFFFFF;border-top: 1px solid #F2F4F3;
;">
        Les nutriments calculés sont basés sur les equation de prédiction de l'INRA 2007 et 2018
                </td>
              

            </tr>
            <tr style="border:none;">
                <td  colspan="4"  style="border:none;border-right: 1px solid #FFFFFF;border-left: 1px solid #FFFFFF;border-bottom: 1px solid #FFFFFF;border-top: 1px solid #F2F4F3;
;">
        <b>Interpreation :  {{ $enrapport->Interpretation }} </b>
                </td>
                <td    style="border:none;border-right: 1px solid #FFFFFF;border-left: 1px solid #FFFFFF;border-bottom: 1px solid #FFFFFF;border-top: 1px solid #F2F4F3;
;">
        <b>Prix TTC : 250DH</b>
                </td>

            </tr>
        </tbody>
    </table>

    <div>

    </div>
    <div id="footer"><br>
    <table align="center" width="100%" border="0">
            
            <tr>
            <td style="text-align:left;"><img src="images/logo.png" height="50px;" alt=""></td>  
            <td style="font-size:8px;text-align:left;"><br>Les informations et commentaires sont transmis pour application dans les conditions normalesd'utilisation sous la réseve de l'exhaustivé et de l'authenticité des informations communiquées par l'éleveur. Ils ne peuvent tenir compte du stockage de l'ensilage, du compotement silo (chauffage, etc), et des autres particularités propres à chaque élevage.<br> </p>
</td>  
            <td style="font-size:8.8px;text-align:left;"><br>Référence :<br> {{ $date }}<br>
            <br> Date d'impression: <br> {{ $date }}</td>  

        </tr>

        </table>
   
                

                
            </div>

           
        </div>
</body>
@endforeach

</html>
