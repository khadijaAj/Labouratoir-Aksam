@extends('layouts.app')

@section('title','Cartes - Aksam Labs')

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
<div class="card-title"><b><i class="la la-map-pin"></i>
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
<body>
<form action="{{route('geolocalisations.store')}}" method="post" id="boxmap">
           @csrf
           
              <div class="form-group col-md-6"> 
              <label for="client">Adresse Client</label>
              <select   id="address-input"  class="custom-select mr-sm-2" name="client_id">
              <option selected value="">Choisir un client...</option>
              @foreach( $clients as $client)
              <option id="address-input" value="{{ $client['id'] }}">{{ $client['adresse'] }}</option>
              @endforeach
              </select>
              </div>
              <div class="form-group col-md-6"  >
                    <label for="lat" >lat</label>
                    <input type="text" id="lat" name="lat" placeholder="lat" class="form-control"  value="{{old('lat')}}">
                </div>
                <div class="form-group col-md-6"  >
                    <label for="lng">lng</label>
                    <input type="text" id="long" name="long" placeholder="lng" class="form-control" value="{{old('long')}}">
                </div>
            
            </form>
    <h3>Google Maps</h3>
    <div id="map"></div>

 </div>
</form>
</body>
<script>
/* script */
function initMap(){

   var latlng = new google.maps.LatLng(31.791702,-7.09262);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
   });

        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
    // this function will work on marker move event into map 
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}
function bindDataToForm(address,lat,lng){
   document.getElementById('location').value = address;
   document.getElementById('lat').value = lat;
   document.getElementById('lng').value = lng;
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8uSXhnce5AOpMX9fmKzcsi19NBEBh_dM&callback=initMap&libraries=places&v=weekly&channel=2"
      async
    ></script>
 
    @endsection