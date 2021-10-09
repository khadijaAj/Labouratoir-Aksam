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
    a,
    abbr,
    img,
    ins,
    strong,
    sub,
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
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
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
        border-spacing: 0
    }

    body {
        height: 840px;
        width: 592px;
        margin: auto;
        font-family: 'Open Sans', sans-serif;
        font-size: 12px
    }

    strong {
        font-weight: 700
    }

    #container {
        position: relative;
        padding:    1%;
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
        border: solid grey 1px
    }

    #items {
    }

    #items>p {
        font-weight: 700;
        text-align: right;
        margin-bottom: 1%;
        font-size: 65%
    }



    #items>table th:first-child {
        text-align:right;
        left:50px

    }

    #items>table th {
        font-weight: 100;
        padding: 1px 1px
    }

    #items>table td {
        padding: 1px 1px
    }

    #items>table th:nth-child(2),
    #items>table th:nth-child(4) {
        width: 45px
    }

    #items>table th:nth-child(3) {
        width: 80px
    }

    #items>table th:nth-child(5) {
        width: 50px
    }

    #items>table tr td:not(:first-child) {
        text-align: right;
        padding-right: 1%
    }

    #items table td {
        border-right: solid grey 1px
    }

    #items table tr td {
        padding-top: 3px;
        padding-bottom: 3px;
        height: 10px
    }

    #items table tr:nth-child(1) {
        border: solid grey 1px
    }

    #items table tr th {
        border-right: solid grey 1px;
        padding:1px
    }

    #items table tr:nth-child(2)>td {
        padding-top: 2px
    }

#row{
    padding:2px;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left; 
    background-color: #3F8E41; 
    color: white; 
    border: 1px solid #ddd;

}
    #footer {
        margin: auto;
        position: absolute;
        left: 4%;
        bottom: 4%;
        right: 4%;
        border-top: solid grey 1px;
    }

    #footer p {
        margin-top: 1%;
        font-size: 65%;
        line-height: 140%;
        text-align: center
    th
    }
    </style>


    <div id="container" style=" position: relative;
        padding: 4%;">
        <div id="header" style="margin: 0; padding: 0; border: 0; font-size: 100%;font: inherit; vertical-align: baseline;">

            <div id="logo" style="width: 70%;
        float: left;">
                <img src="images/logo.png" alt="">
                <div style="margin-top:-110px; margin-left:143px; ">
                    <br>
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

        <hr style=" border: 2px solid green; border-radius: 1px;">
        <div>
            <br><br>
            <center>
                <p style="font-size:20px;"><b>Liste des {{ $title }}</b></p>
            </center>
        </div>
        <br> <br>


        <div style="left:50px ; margin-right:0px">
            <p style=" font-weight: 800;text-align: right;margin-bottom: 1%;font-size: 80%;"><b>Total des elements :
                {{ $count }}</b></p>
            <table class="table table-bordered" style="left:500px;margin-right:0px; ;margin-bottom: 1%;font-size:55%;">
                <tr id="row">
                    <th >Nom</th>
                    <th>Code</th>
                    <th>Type </th>
                    <th> Province</th>
                    <th> Adresse</th>
                    <th> N° Téléphone </th>
                    <th>  Email</th>
                    <th>Famille Client</th>
                    <th>Mode de régelement</th>
                    <th> Mode de livraison</th>
                    <th> Salle de Traite</th>
                </tr>
                @foreach($elements as $data)
                <tr>

                    <td style="  border: 1px solid #ddd; ">{{ $data->name }}</td>
                    <td style="  border: 1px solid #ddd;">{{ $data->code }}</td>
                    <td style="  border: 1px solid #ddd;">{{ $data->type }}</td>
                    <td style="  border: 1px solid #ddd;">{{ $data->province }}</td>
                    <td style="  border: 1px solid #ddd;">{{ $data->adresse}}</td>
                    <td style="  border: 1px solid #ddd;">{{ $data->tele }}</td>
                    <td style="  border: 1px solid #ddd;">{{ $data->email }}</td>
                    <td style="  border: 1px solid #ddd;">{{ $data->familleCl}}</td>
                    <td style="  border: 1px solid #ddd;">{{ $data->modeReglement }}</td>
                    <td style="  border: 1px solid #ddd;">{{ $data->modelivraison }}</td>
                    <td style="  border: 1px solid #ddd;">{{ $data->salleTraite }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div id="footer" style="margin: auto;position: absolute;left: 4%;bottom: 4%;right: 4%;">
            <br> <br>
           <center> <img src="images/logo.png" height="50px;" alt=""></center>
        </div>
</body>

</html>