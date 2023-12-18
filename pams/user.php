<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="user.css"> <title>Document</title>
</head>
<body>
<div class="container">
        <h1>Police Report / Complaint Form</h1>
        <form action="submit_report.php" method="post">
            <label for="reportType">Report Type:</label>
            <select id="reportType" name="reportType">
                <option value="crime">Crime Report</option>
                <option value="complaint">Complaint</option>
                <option value="complaint">Vehicular Accident</option>
            </select>

            <label for="incidentDetails">Incident Details:</label>
            <textarea id="incidentDetails" placeholder="Please be specific" name="incidentDetails" rows="4" cols="50" required></textarea>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <div class="mt-3"></div>
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
    <br>
            <label for="evidence">Evidence (if any):</label>
            <input type="file" id="evidence" name="evidence">
    <br><br>
            <input type="submit" value="Submit Report">
        </form>
    </div>

<script async defer src="https://maps.googleapis.com/maps/api/
js?key=AIzaSyDDvXWY4WaUPxsylE40rFtya9eHabMc62M&callback=initMap"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>