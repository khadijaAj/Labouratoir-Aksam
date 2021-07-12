<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document Exporté - Aksam Labs</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

</head>

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


    <div id="container" style=" position: relative;
        padding: 4%;">
        <div id="header" style="  margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        ">
            <center>
                <div style="height: 50px;width:60%;
  margin-top:10px; margin-left:200px;border: 1px solid black;"> <br><strong>
                        <h4 style="font-size: 20px;"><b>Rapport D'analyse client</b>
                    </strong></b></div>
            </center>



        </div>

        <div id="logo" style="margin-top: -100px;
        float: left;">
            <img height="100px;" src="images/logo.png" alt="">

        </div>

    </div>


    <br> <br><br>
    <div id="container">

        <table class="table " style="float: left;
  width: 25%;
  height: 45px;
  margin: 15px;">
            <thead>
                <tr>
                    <th
                        style="padding-top: 12px; padding-bottom: 12px; text-align: left; color: #FFFFFF;;background-color: #94CE82;     border: 0px solid #FFFFFF;;padding: 8px;">
                        <center><strong> N° </strong></center>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="table-light">
                        <center> {{ $rapport->Num }}</center>
                    </th>


                </tr>
            </tbody>
        </table>
        <table class="table table-hover" style="float: left;
  width: 25%;
  height: 45px;
  margin: 15px;">
            <thead>
                <tr>
                    <th class="table-light"
                        style="padding-top: 12px; padding-bottom: 12px; text-align: left; ;background-color: #94CE82;color : #FFFFFF;     border: 1px solid #FFFFFF;;padding: 8px;">
                        <center><strong> Client </strong></center>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th  class="table-light"style=" border-right: 1px solid #FFFFFF;;border-left: 1px solid #FFFFFF;;border-bottom: 1px solid #FFFFFF;;">
                        <center> {{ $rapport->client->name }}</center>
                    </th>


                </tr>
            </tbody>
        </table>
        <table class="table table-hover" style="float: left;
  width: 25%;
  height: 45px;
  margin: 15px;">
            <thead>
                <tr>
                    <th
                        style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #94CE82;color: #FFFFFF;   border: 1px solid #FFFFFF;;padding: 8px;">
                        <center>Echantillon</center>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="table-light">
                        <center>{{ $rapport->produit->name}}</center>
                    </th>


                </tr>
            </tbody>
        </table>

        <table class="table table-hover" style="float: left;
  width: 25%;
  height: 65px;
  margin: 15px;">
            <thead>
                <tr>
                    <th
                        style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #94CE82;color: #FFFFFF;   border: 1px solid #FFFFFF;;padding: 8px;">
                        <center>Cout </center>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="table-light" scope="row">
                        <center> {{ $rapport->Cout}} </center>
                    </th>


                </tr>
            </tbody>
        </table>

    </div>
    <br> <br><br>
    <div id="container">

        <table class="table table-hover" style="float: left;
  width: 25%;
  height: 45px;
  margin: 15px;">
            <thead>
                <tr>
                    <th
                        style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #94CE82;color: #FFFFFF;padding: 8px;">
                        <center>Référence Client</center>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th  class="table-light" scope="row">
                        <center>{{ $rapport->client->Reference }}</center>
                        </center>
                    </th>


                </tr>
            </tbody>
        </table>
        <table class="table table-stripped" style="float: left;
  width: 25%;
  height: 45px;
  margin: 15px;">
            <thead>
                <tr>
                    <th
                        style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #94CE82;color: #FFFFFF;  border: 1px solid #F8F8F8;padding: 8px;">
                        <center>Date de reception</center>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="table-light">
                        <center> {{ $rapport->date_reception}}</center>
                    </th>


                </tr>
            </tbody>
        </table>
        <table class="table table-hover" style="float: left;
  width: 25%;
  height: 45px;
  margin: 15px;">
            <thead>
                <tr>
                    <th
                        style="padding-top: 12px; padding-bottom: 12px; text-align: left;background-color: #94CE82;color: #FFFFFF;  border: 1px solid #FFFFFF;padding: 8px;">
                        <center> Date d'analyse
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="table-light" >
                        <center> {{ $rapport->date_analyse}}</center>
                    </th>


                </tr>
            </tbody>
        </table>



    </div>

    <br><br><br><br>  <br><br><br><br>


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
 "><br>
<p>   <strong>AKSAM SARL:</strong> KM. 5,3, RP. 3475, Laghdira - Cercle Bir Jdid - El Jadida - Tél : 06 28 39 85 00 - Fax : 06 28 39 84 00 </p><br>
 <p style=" font-weight: 5px;">Rc : 223975 - PATENTE : 37985675 - IF : 40226585 - CNSS : 8553283 - ICE : 000204094000032 - Email : alfaksam@gmail.com  </p></div>
</body>


</html>