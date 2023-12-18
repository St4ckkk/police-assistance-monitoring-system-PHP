<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvmxuy8YpitE31oFtSfRr56h_xwK3OROQ&libraries=places"></script>
    <title>Document</title>
</head>
<body>
<input type="text" class="form-control" name="" id="search_input" placeholder="Location" required>
    
</body>
<script type="text/javascript">
        var searchInput = 'search_input';

        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)),{
                types: ['geocode'],
            });
            google.maps.event.addListener(autocomplete, 'place_changed', function(){
                var near_place = autocomplete.getPlace();
            });
        });
    </script>
</html>