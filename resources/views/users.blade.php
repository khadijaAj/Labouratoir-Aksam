@extends('layouts.app')

@section('title', 'Utilisateurs - Aksam Labs')

@section('links')
<li class="nav-item active">
    <a href="/users">
        <i class="la la-users"></i>
        <p>Utilisateurs</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/logs">
        <i class="la la-save"></i>
        <p>Journalisation</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-users"></i>
        Utilisateurs</b></div>
@endsection

@section('content')
<div>
    <br>
    <div class="form-row align-items-left" style="float:left;">

        <div class="col-auto">
            <button type="submit" style="border-radius: 20px ;background-color:#3A9341;" class="btn mb-2"><a
                    style="color: #ffffff; text-decoration: none; " href="/adduser">Ajouter un utilisateur</a></button>
            <br><br>
        </div>
    </div>
    <div class="table-responsive">

        <table id="users" class="table">

            <thead style="background-color:#FAFAFA;">
                <center>
                    <tr>
                        <th>
                            <center>#</center>
                        </th>
                        <th>
                            <center>Nom</center>
                        </th>
                        <th>
                            <center>Référence</center>
                        </th>
                        <th>
                            <center>Type</center>
                        </th>
                        <th>
                            <center>Log</center>
                        </th>
                        <th>
                            <center>Actions</center>
                        </th>

                    </tr>
                </center>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">
                        <center>1</center>
                    </th>

                    <td>
                        <center>Abdelghani BARAKA</center>
                    </td>
                    <td>
                        <center>125412<center>
                    </td>
                    <td>
                        <center>Administrateur<center>
                    </td>
                    <td>
                        <center><i class="la la-download"></i></center>
                    </td>
                    <td>
                        <center><i style="color:#3EB805;" class="la la-edit"></i> &nbsp;&nbsp;<i style="color:#C1130B;"
                                class="la la-trash-o"></i></center>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <center>2</center>
                    </th>

                    <td>
                        <center>Salah HASNAOUI</center>
                    </td>
                    <td>
                        <center>122322<center>
                    </td>
                    <td>
                        <center>Administrateur<center>
                    </td>
                    <td>
                        <center><i class="la la-download"></i></center>
                    </td>
                    <td>
                        <center><i style="color:#3EB805;" class="la la-edit"></i> &nbsp;&nbsp;<i style="color:#C1130B;"
                                class="la la-trash-o"></i></center>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <center>3</center>
                    </th>

                    <td>
                        <center>Najoua BARAKA</center>
                    </td>
                    <td>
                        <center>143412<center>
                    </td>
                    <td>
                        <center>Utilisateur<center>
                    </td>
                    <td>
                        <center><i class="la la-download"></i></center>
                    </td>
                    <td>
                        <center><i style="color:#3EB805;" class="la la-edit"></i> &nbsp;&nbsp;<i style="color:#C1130B;"
                                class="la la-trash-o"></i></center>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    @endsection