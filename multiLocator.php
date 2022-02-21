<!DOCTYPE html P>
<html>
<head>
    <title></title>
</head>
<body>
<script
    src="https://maps.googleapis.com/maps/api/js?key=APIkey&callback=initMap&v=weekly"
    async
    ></script>
<script type="text/javascript">
    var markers = [
        {
            "lat": '18.641400',
            "lng": '72.872200'
        },
        {
            "lat": '18.750000',
            "lng": '73.416700'
        },
        {
            "lat": '18.964700',
            "lng": '72.825800'
        },
        {
            "lat": '18.523600',
            "lng": '73.847800'
        },
        {
            "lat": '19.182800',
            "lng": '72.961200'
        },
        {
            "lat": '18.750000',
            "lng": '73.033300'
        }
    ];
    window.onload = function () {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var geocoder = geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        for (var i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP
            });
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
                google.maps.event.addListener(marker, "dragend", function (e) {
                    var lat, lng, address;
                    geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            lat = marker.getPosition().lat();
                            lng = marker.getPosition().lng();
                            address = results[0].formatted_address;
                            alert("Latitude: " + lat + "\nLongitude: " + lng);
                        }
                    });
                });
            })(marker, data);
            latlngbounds.extend(marker.position);
        }
        var bounds = new google.maps.LatLngBounds();
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
    }
</script>
<div id="dvMap" style="width: 100%; height: 500px">
</div>
</body>
</html>
