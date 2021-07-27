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
<li class="nav-item">
    <a href="/standards">
        <i class="la la-key"></i>
        <p>Standards Rapports</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b><i class="la la-users"></i>
        Utilisateurs</b></div>
@endsection

@section('content')
<div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

</div>

<div>
    <br>
    <div class="form-row align-items-left" style="float:left;">

        <div class="col-auto">
            <button type="submit" style="border-radius: 20px ;background-color:#3A9341;" class="btn mb-2"><a
                    style="color: #ffffff; text-decoration: none; " href="{{ route('users.create') }}">Ajouter un utilisateur</a></button>
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
                            <center>Actions</center>
                        </th>

                    </tr>
                </center>
            </thead>
            <tbody>
                @foreach ($users as $user)

                <tr>
                    <th scope="row">
                        <center>{{ $user->id }}</center>
                    </th>

                    <td>
                        <center>{{ $user->name }}</center>
                    </td>
                    <td>
                        <center>{{ $user->Reference }}<center>
                    </td>
                    <td>
                        <center>{{ $user->type }}<center>
                    </td>
              
                    <td>
                        <center>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                                <a href="{{ route('users.show',$user->id) }}"><i style="color:#000;"
                                        class="la la-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                                <a href="{{ route('users.edit',$user->id) }}"><i style="color:#3EB805;"
                                        class="la la-edit"></i></a>

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-link" type="submit"><i style="color:#C1130B;"
                                        class="la la-trash-o"></i></button>
                            </form>
                        </center>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    @endsection