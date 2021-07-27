<!doctype html>
<html>

<head>

    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
    <!-- /.Logo -->
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <br>
                <a href="/home" class="logo"></a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-controls="sidebar" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>

    <!-- /.Logo -->

            <!-- /.Navigation_Bar -->

            <nav class="navbar navbar-header navbar-expand-lg" style="background-color:#3A9341;color:#FFF; ">
                <div class="container-fluid">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" style="color:#FFFFFF;" href="/home">Tableau de bord<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:#FFFFFF;" href="/matieres_premieres">Analyses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:#FFFFFF;" href="/produits">Donnée technique</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:#FFFFFF;" href="/commerciaux">Partenaires</a>
                        </li>

                    </ul>


                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                        <li class="nav-item ">
                            <a class="nav-link" style="color:#FFFFFF;" href="/users">
                                <i class="la la-lock"> </i>Administration
                            </a>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false"> <img src="../../images/profile_image.jpg" alt="user-img" width="36"
                                    class="img-circle"><span style="color:#FFFFFF;">{{ Auth::user()->name }}</span></span> </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <div class="user-box">
                                        <div class="u-img"><img src="./images/profile_image.jpg" alt="user"></div>
                                        <div class="u-text">
                                            <h4>Username</h4>
                                            <p class="text-muted">{{ Auth::user()->email }}</p><a href="#"
                                                class="btn btn-rounded btn-secondary btn-sm">View Profile</a>
                                        </div>
                                    </div>
                                </li>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i class="la la-power-off"></i> Logout</a>
                            </ul>

                        </li>
                    </ul>
                </div>
            </nav>
        </div> 
		<!-- /.Navigation Bar -->



		<!-- /.Sidebar -->
        <div class="sidebar">
          
            <div class="scrollbar-inner sidebar-wrapper">

<br>
                <ul class="nav">
                    @yield('links')
                </ul>
            </div>
        </div> 
		<!-- /.Sidebar -->

		<!-- /.MainPanel -->
        <div class="main-panel">
            
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <!-- /.Card -->
                                <div class="card-header">
                                    <div class="card-title">
                                        @yield('Page_infos')
                                    </div>
                                </div>
                                <div class="card-body">

                                    @yield('content')

                                </div> <!-- /.Card Body -->


                            </div><!-- /.Card -->
                        </div>
                    </div><!-- /.Row -->


                </div>
            </div><!-- /.Content -->

        </div><!-- /.MainPanel -->

    </div>



</body>
<script>
function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>


</script>
<script src="{{ asset('js/core/popper.min.js')}}"></script>
<script src="{{ asset('js/core/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{ asset('js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
<script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{ asset('js/file.min.js')}}"></script>


</html>