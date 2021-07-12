<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<br>
	<div class="container" style="weight:70%;">
		<div class="logo">
            <div>			<img  height="220px;"src="images/header.png"></div>
		</div>
		<hr>
        <br>
        <h6 style=" float: right;"> Date D'exportation :   date("Y/m/d")</h6>
        <br>


    <center><h3>Liste des {{ $title }}</h3></center>

<br>
<table class="table table-striped">
  <thead>
    <tr >
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Reference</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($commerciaux as $commercial)
            <tr>
                <th scope="row">
                    <center>{{ $commercial->id }}</center>
                </th>


                <td>
                    <center>{{ $commercial->name }}</center>
                </td>
                <td>
                    <center>{{ $commercial->Reference }}</center>
                </td>
                
    </tr>
    @endforeach
  </tbody>
</table>
	</div>
