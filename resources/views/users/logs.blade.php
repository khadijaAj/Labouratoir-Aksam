@extends('layouts.app')

@section('title', 'Journalisation - Aksam Labs')

@section('links')

<li class="nav-item">
    <a href="/users">
        <i class="la la-users"></i>
        <p>Utilisateurs</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/logs">
        <i class="la la-save"></i>
        <p>Journalisation</p>
    </a>
</li>
<li class="nav-item">
    <a href="/standards">
        <i class="la la-key"></i>
        <p>Standards Rapports</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-save"></i>
        Journalisation</b></div>
@endsection

@section('content')
<div>
    <br>
    <div class="form-row align-items-left" style="float:left;">

        <div class="col-auto">
            <button type="submit" style="border-radius: 20px ;background-color:#3A9341;" class="btn mb-2"><a
                    style="color: #ffffff; text-decoration: none; " href="#">Exporter Le Journal</a></button>
            <br><br>
        </div>
    </div>
    <div class="table-responsive">

        <table id="logs" class="table">

            <thead style="background-color:#FAFAFA;">
                <tr>
                    <th>
                        <center>#</center>
                    </th>
                    <th>
                        <center>Opération</center>
                    </th>
                    <th>
                        <center>Réalisateur</center>
                    </th>
                    <th>
                        <center>Date</center>
                    </th>


                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">
                        <center>1</center>
                    </th>

                    <td>
                        <center>Table cell</center>
                    </td>
                    <td>
                        <center>Table cell</center>
                    </td>
                    <td>
                        <center>Table cell</center>
                    </td>


                </tr>
                <tr>
                    <th scope="row">
                        <center>2</center>
                    </th>

                    <td>
                        <center>Table cell</center>
                    </td>
                    <td>
                        <center>Table cell</center>
                    </td>
                    <td>
                        <center>Table cell</center>
                    </td>


                </tr>
                <tr>
                    <th scope="row">
                        <center>3</center>
                    </th>
                    <td>
                        <center>Table cell</center>
                    </td>
                    <td>
                        <center>Table cell</center>
                    </td>
                    <td>
                        <center>Table cell</center>
                    </td>


                </tr>
            </tbody>
        </table>

    </div>
    @endsection