<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="map.css">
    <title>Document</title>
</head>
<body>
    <div id="map"></div>
    <script>
function initMap() {
    var location = {lat: 6.283640, lng: 124.852150};
    var map = new google.maps.Map(document.getElementById('map'), {

        zoom: 12,
        center: location
    }); 
    var marker = new google.maps.Marker({
        position:location,
        map: map
    });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/
js?key=AIzaSyCdGv5cjpA0dMUCSolCf89tl_vgccGvsu0&callback=initMap"></script>
 
</body>
</html>



</script>
</body>
</html>

