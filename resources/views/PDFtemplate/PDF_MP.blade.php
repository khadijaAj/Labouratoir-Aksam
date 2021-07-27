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

    ol,
    ul,
    li,
 
    label,
 
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
        font-size: 9.8px;
        vertical-align: baseline
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
        font-size: 12px;

    }

    strong {
        font-weight: 900
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
    @page { margin: 100px 50px; }


    .pagenum:before {
        content: counter(page);
    }
        </style>

    <div style=" position: relative;
        padding: 4%;">
        <div style="  margin: 0;
        padding: 0;
        border: 0;
        weight:400px;
     
        ">
            <center>
                <div style="height: 50px;width:60%;margin-top:10px; margin-left:200px;background-color:#B5E0FA;border: 1px solid black;"> <br><strong>
                        <p style=" font-weight: 700;font-size: 14px;"><b> <br>Rapport d'analyse MP</p>
                    </strong></b></div><br>
            </center>



        </div>

        <div style="margin-top: -100px;margin-left: -200px;
        float: left;">
            <img height="90px;" src="images/logo.png" alt="">

        </div>

    </div>
    <br><br><br> <br><br><br> 
    <div class="footer">



    <div>

        <table style="margin-left:-207px;margin-top:30px;
  " class="table table-bordered ">
            <thead>

                <tr style="border:none;">
                    <th width="25">
                        <p>Date_Reception</p>
                    </th>
                    <th width="20">
                        Produit</th>
                    <th width="20">
                        N°Ech</th>
                    <th width="20">
                        N°Bon</th>
                    <th width="15">
                        Fournisseur</th>
                    <th width="15">
                        Origine</th>
                    <th width="15">
                        Navire</th>

                    @inject('mesure','App\Mesure')
                    @foreach($standards->nutriments as $nutriment)
                    @if($mesure->where('standardtype_id','=',1)->where('nutriment_id','=',$nutriment->id,)->value('unite')== "%" )

                    <th>{{ $nutriment->name }}</th>


                    @endif
                    @endforeach
                    <th width="1">
                        PS</th>
                    <th width="1">
                        CN</th>
                    <th width="1">
                        CF</th>
                    <th width="1">
                        CM</th>
                </tr>

            </thead>
            <tbody>
          
                @foreach($mprapports as $mprapport)
                <tr style="border:none;">
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $mprapport->date_reception}}
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $mprapport->produit->name}}
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $mprapport->Num}}
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $mprapport->Num_bon}}
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $mprapport->fournisseur->name}}
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $mprapport->origine->name}}
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $mprapport->navire->name}}
                    </td>
                    @inject('value','App\Value') {{-- inject before foreach --}}
                    @foreach($standards->nutriments as $nutriment)
                    @if($mesure->where('standardtype_id','=',1)->where('nutriment_id','=',$nutriment->id,)->value('unite') == "%" )

                    <td style="border:none;border-right: 1px solid #F2F4F3;">
                        {{ $value->where('mprapport_id','=',$mprapport->id,)->where('nutriment_id','=',$nutriment->id,)->value('value_surbrute') }}
                    </td>
                    @endif
                    @endforeach
                    <td style="border:none;border-right: 1px solid #F2F4F3;">
                        <center>{{ $mprapport->PS}}
                        </center>
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">
                        <center>@if ( $mprapport->conformite == "Conforme" )<input type="checkbox" checked="checked">
                            @else <input type="checkbox"> @endif
                        </center>
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">
                        <center>@if ( $mprapport->certificat == "1" )<input type="checkbox" checked="checked"> @else
                            <input type="checkbox"> @endif
                        </center>
                    </td>
                    <td style="border:none;border-right: 1px solid #F2F4F3;">{{ $mprapport->commentaire}}
                    </td>

                </tr>
                
          
                @endforeach
            </tbody>
         
        </table>

    </div>
   

</body>


</html>