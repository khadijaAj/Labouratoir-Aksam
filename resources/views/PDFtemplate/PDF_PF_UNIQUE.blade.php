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
        font-size: 8.4px

    }

    body {
        height: 940px;
        width: 692px;
        margin: auto;
        font-family: 'Open Sans', sans-serif;
        font-size: 9px
    }

    strong {
        font-weight: 700
    }

    #container {
        position: relative;
        padding: 4%
    }

    #header {
        height: 90px
      
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

  
    #items {
        margin-top: 10px
    }

    #items>p {
        font-weight: 800;
        text-align: right;
        margin-bottom: 1%;
        font-size: 85%
    }




    #footer {
        margin: auto;
        position: absolute;
        left: 4%;
        bottom: 0.7%;
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
                    <h5 style="font-size:15px;margin-bottom:5px;">Aksam Lab</h3>
                    <br>  <br> 
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
                <p style="margin:0;margin-top:1%;font-size:95%;">Date d'exportation : {{ $date }}</p>
                <p style="margin:0;margin-top:1%;font-size:95%;">N° Rapport : {{ $rapport->id }}</p>
                <p style="margin:0;margin-top:1%;font-size:95%;">Identification : {{ $rapport->Identification}}</p>

            </div>
        </div>

        <hr style=" border: 2px solid green;
  border-radius: 1px;">
        <div>
            <center>
                <p style="font-size:16px;"><b><u>Rapport Produit fini</u></b></p>
            </center>
        </div>
      <br><br>
        <table align="center" width="100%"  border="0"> 
<tr >
<td style="padding-right: 35px;"><label style="font-size: 11px;" for="num">&nbsp;N° Echantillon : {{ $rapport->Num }}</label></td>
<td style="padding-right: 40px;"><label  style="font-size: 11px;" for="nom_ech">&nbsp; Echantillon : {{ $rapport->produit->name }}</label></td> <td> 
<td ><label  style="padding-left:3px;font-size: 11px;" for="n_bon">&nbsp;&nbsp;Date de fabrication : {{ $rapport->date_fabrication}}</label></td> <td> 

</tr> 


</tr> 
</table>
 
      
   

    </div> 

    <table style="border-left: 1px solid #F2F4F3;
    border-right: 1px solid #F2F4F3;border-bottom: 1px solid #F2F4F3;" class="table table-bordered  ">
        <thead>
            <tr style="border:none;">
                <th
                    style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    <center> Nature d'analyse</center></th>
                <th
                    style="padding-top: 12px; padding-bottom: 12px; text-align: left; padding: 8px;">
                    <center>  Valeur </center></th>
               
                
            </tr>
        </thead>
        <tbody>
            @inject('value','App\Value') {{-- inject before foreach --}}
            @inject('mesure','App\Mesure') {{-- inject before foreach --}}
            @foreach($standards->nutriments as $nutriment)
            @if ( $value->where('pfrapport_id','=',$rapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') !== NULL )

            <tr style="border:none;" >
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                    <center>{{ $nutriment->name }}</center>
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;" >
                    <center>{{ $value->where('pfrapport_id','=',$rapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}</center>
                </td>
                
            </tr>
            @else 
            <tr style="border:none;" >
                <td style="border:none;border-right: 1px solid #F2F4F3;">
                  
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;" >
                </td>
                
            </tr>
            @endif
           
            @endforeach
            @if ( $rapport->ACE !== NULL )

            <tr style="border:none;" >
                <td style="border:none;border-right: 1px solid #F2F4F3;background-color: #f0f5f5
;">
                    <center>Activité d'eau</center>
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;background-color: #f0f5f5
;" >
                    <center>{{ $rapport->ACE }}</center>
                </td>
           
            </tr>
            @endif
            @if ( $rapport->MSR !== NULL )

            <tr style="border:none;" >
                <td style="border:none;border-right: 1px solid #F2F4F3;background-color: #f0f5f5
;">
                    <center>Moisissure</center>
                </td>
                <td style="border:none;border-right: 1px solid #F2F4F3;background-color: #f0f5f5
;" >
                    <center>{{ $rapport->MSR }}</center>
                </td>
           
            </tr>
            @endif
        </tbody>
    </table>
   
    <div>
   
</div>
<br>
    <div id="footer  
 "><br><br>
<p>   <strong>AKSAM SARL:</strong> KM. 5,3, RP. 3475, Laghdira - Cercle Bir Jdid - El Jadida - Tél : 06 28 39 85 00 - Fax : 06 28 39 84 00 </p><br>
 <p style=" font-weight: 5px;">Rc : 223975 - PATENTE : 37985675 - IF : 40226585 - CNSS : 8553283 - ICE : 000204094000032 - Email : alfaksam@gmail.com  </p></div>
</body>


</html>