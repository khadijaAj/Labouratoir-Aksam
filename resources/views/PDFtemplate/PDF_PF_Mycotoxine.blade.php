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
    a,
    img,
    small,
    strong,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    form,
    label,
    legend,
    table,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 15px;

        vertical-align: baseline
    }
    h4{
        font-size: 14.6px;
    }
    aside,
    details,
    footer,
    header,
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

    table {
        border-collapse: collapse;

        border-spacing: 0;
        border: none;
    }

    body {
        height: 840px;
        width: 690px;
        margin: auto;
        font-family: 'Open Sans', sans-serif;
        font-size: 10px;
        
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
        font-weight: 600
    }

    #header>#reference p {
        margin: 0;
        margin-top: 2%;
        
    }

    #header>#logo {
        width: 70%;
        float: left
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

    <div style=" position: relative;
        padding: 4%;">
        <div id="header" style="  margin: 0;
        padding: 0;
        border: 0;
        weight:400px;
        font-size: 100%;
        font: inherit;
        ">
            <center>
                <div style="height: 70px;width:60%;
  margin-top:10px; margin-left:200px;background-color:#B5E0FA;border: 1px solid black;"> <br><strong>
                        <p style="font-size: 20px;"><b> <br>Rapport d'analyse PF Mycotoxine <br></p><br>
                    </strong></b><br></div>
            </center>



        </div>

        <div style="margin-top: -100px;margin-left: -200px;
        float: left;">
            <img height="90px;" src="images/logo.png" alt="">

        </div>

    </div>
    <br><br><br> <br><br><br> <br><br><br>
    <div>
        <table style="margin-left:-107px;
  " class="table table-bordered ">
            <thead>
     
                <tr style="border:none;">
                    <th width="40" >
                        <p>Date_fabrication</p>
                    </th>
                    <th width="40" >
                        Produit</th>
                    <th  width="20" >
                        N° Echantillon</th>
                    <th  width="20">
                    Identification</th>
                   
                     
                    @inject('mesure','App\Mesure') 
                    @foreach($standards->nutriments as $nutriment)
                      @if ($mesure->where('standardtype_id','=',1)->where('nutriment_id','=',$nutriment->id,)->value('unite') == "ppb"  )

                  <th >{{ $nutriment->name }}</th>
                 
              
              @endif
              @endforeach
         
              <th >Commentaire</th>

            </thead>
            <tbody>
            @foreach($pfrapports as $pfrapport)
                <tr style="border:none;">
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $pfrapport->date_fabrication}}
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $pfrapport->produit->name}}
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $pfrapport->Num}}
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $pfrapport->Identification}}
                    </td>
  
                    @inject('value','App\Value') {{-- inject before foreach --}}
                    @foreach($standards->nutriments as $nutriment)
                    @if ($mesure->where('standardtype_id','=',1)->where('nutriment_id','=',$nutriment->id,)->value('unite') == "ppb"  )

                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $value->where('pfrapport_id','=',$pfrapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}
                    </td>
                    @endif
                    @endforeach
              
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $pfrapport->Commentaire}}
                    </td>

                </tr>


            @endforeach
            </tbody>
        </table>
    </div>
</body>


</html>