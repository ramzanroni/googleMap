
<!DOCTYPE html>

<html>

<head>
    <title>Moveable Locator</title>
    <style type="text/css">
        #map {
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body> 
<h1>Single Map</h1> 
<div id="map"></div>
<ul id="geoData">
    <li>Latitude: <span id="lat-span"></span></li>
    <li>Longitude: <span id="lon-span"></span></li>
</ul>
<script>
function initMap() {
    var myLatLng = {lat: 23.7880817, lng: 90.3752245}; 
    var map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!',
          draggable: true
        });
      google.maps.event.addListener(marker, 'dragend', function(marker) {
        var latLng = marker.latLng;
        document.getElementById('lat-span').innerHTML = latLng.lat();
        document.getElementById('lon-span').innerHTML = latLng.lng();
     });
}
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAjbn_rb7xcavM74VhIUOLjnBFbURiZXc&callback=initMap&v=weekly"
    async
    ></script>
</body>
</html>