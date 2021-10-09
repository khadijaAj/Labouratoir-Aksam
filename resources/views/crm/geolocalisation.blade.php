@extends('layouts.app')

@section('title', 'Prospecteurs - Aksam Labs')

@section('links')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<li class="nav-item  ">
    <a href="/prospecteurs">
        <i class="la la-user-plus"></i>
        <p>Prospecteurs</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/commandes">
        <i class="la la-cart-arrow-down"></i>
        <p>Commandes</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/vrapports">
        <i class="la la-eyedropper"></i>
        <p>Rapport Visite</p>
    </a>
</li>
<li class="nav-item ">
    <a href="/formules">
    <i class='la la-file-text'></i>
        <p>Demande de Formule</p>
    </a>
</li>
<li class="nav-item active ">
    <a href="/geolocalisation ">
    <i class='la la-map-pin'></i>
        <p>Géolocalisation</p>
    </a>
</li>
@endsection

@section('Page_infos')
<div class="card-title"><b><i class='la la-map-pin'></i>
        Cartes</b></div>
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
    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
    // Initialize the map.
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8,
    center: { lat: 31.794525 , lng:-7.0849336 },
  });
  const geocoder = new google.maps.Geocoder();
  const infowindow = new google.maps.InfoWindow();

  document.getElementById("submit").addEventListener("click", () => {
    geocodePlaceId(geocoder, map, infowindow);
  });
}

// This function is called when the user clicks the UI button requesting
// a geocode of a place ID.
function geocodePlaceId(geocoder, map, infowindow) {
  const placeId = document.getElementById("place-id").value;

  geocoder
    .geocode({ placeId: placeId })
    .then(({ results }) => {
      if (results[0]) {
        map.setZoom(11);
        map.setCenter(results[0].geometry.location);

        const marker = new google.maps.Marker({
          map,
          position: results[0].geometry.location,
        });

        infowindow.setContent(results[0].formatted_address);
        infowindow.open(map, marker);
      } else {
        window.alert("No results found");
      }
    })
    .catch((e) => window.alert("Geocoder failed due to: " + e));
}
     
    </script>
    
  </head>
  <body>
  <div class="input-group mb-2">

            <div class="input-group-prepend">
                <div class="input-group-text " style="background-color:#FAFAFA;"><i class="la la-search"> </i></div>
            </div>
            <input type="text"  class="form-control"
                style="border: 1px solid #ced4da" name="search" id="search" placeholder="Chercher ...">

        </div>
  


    <div id="floating-panel">
      <!-- Supply a default place ID for a place in Brooklyn, New York. -->
      <input id="place-id" type="text" value="" />
      <i<input id="submit" type="button" value="S" />
    </div>
    <div id="map"></div>
    <div class="col-auto">
        <br>
        <button type="submit" style=";background-color:#3A9341; float:left;" class="btn mb-2"><a
                style="color: #ffffff; text-decoration: none; " href="{{route('geolocalisations.create')}}">Ajouter</a></button>
    </div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8uSXhnce5AOpMX9fmKzcsi19NBEBh_dM&callback=initMap&libraries=places="
      async
    ></script>
  </body>
@endsection
