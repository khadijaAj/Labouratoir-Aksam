function initMap() {
     
    // The location of Uluru
     // const uluru ={ lat: 	33.589886, lng: 	-7.603869 };
   
    // The map, centered at Uluru
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center :{
          lat :31.794525 ,
          lng: -7.0849336
        },
      });
      // The marker, positioned at Uluru
      var marker = new google.maps.Marker({
        position:{
          lat :31.794525 ,
          lng: -7.0849336
        }, 
        map: map,
        draggable :true
      });
      
const infowindow = new google.maps.InfoWindow();

  infowindow.setContent("<b>القاهرة</b>");

const marker = new google.maps.Marker({ map, position: cairo });

marker.addListener("click", () => {
infowindow.open(map, marker);
});
}
