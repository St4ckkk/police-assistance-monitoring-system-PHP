<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvmxuy8YpitE31oFtSfRr56h_xwK3OROQ&libraries=places"></script>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Caller</title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">PAMS</a>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        <h3>Police Assistance Monitoring</h3>
                    </li>
                    <li class="sidebar-item">
                        <a href="userDashboard.php" class="sidebar-link">
                            <i class="fa-solid fa-home"></i>
                            Home
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                            <i class="fa-regular fa-file-lines pe-2"></i>
                            Logs
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="userAddComplaint.php" class="sidebar-link">Report Incident</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="userReports.php" class="sidebar-link">Report History</a>
                            </li>
                        </ul>
                    </li>
                    <li a class="sidebar-item">
                        <a href="userDashboard.php" class="sidebar-link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Log Out
                        </a>
                    </li>
                    </li>

                </ul>
            </div>
        </aside>
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1>Report Incident</h1>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <div class="container">
                            <form action="" method="POST" enctype="multipart/form-data">


                                <br>


                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" name="location" id="search_input" placeholder="Location" required>

                                <label for="contact" class="form-label">Contact</label>
                                <input type="number" class="form-control" name="contact" id="contact" placeholder="09XX-XXX-XXXX" required>
                                <br>
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" id="date" placeholder="" required>

                                <div class="form-group">
                                    <label for="">Incident Type</label>
                                    <select name="incident" class="form-control" id="">
                                        <option value="">--Select Incident Type--</option>
                                        <option value="Motorcycle Incident">Motorcycle Incident</option>
                                        <option value="Fire Incident">Fire Incident</option>
                                        <option value="Unsafe Acts">Unsafe Acts</option>
                                        <option value="Drugs">Drugs</option>
                                        <option value="Workplace Hazards">Workplace Hazards</option>
                                        <option value="Minor Injury">Minor Injury</option>
                                        <option value="Fatalities">Fatalities</option>
                                        <option value="Others">--Others--</option>

                                    </select>
                                </div>
                                <br>
                                <label for="evidencePicture" class="form-label">Evidence Picture:</label>
                                <input type="file" id="evidencePicture" name="evidencePicture" accept="image/*" class="form-control" required>
                                <label for="callend" class="form-label">Special Instructions</label>
                                <textarea name="instruction" id="instruction" size="6" class="form-control"></textarea>
                                <input type="hidden" id="myInputField" name="status">
                                <hr>
                                <input class="btn btn-outline-success" type="submit" name="submit" value="Submit">


                            </form>
                        </div>


                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            var inputField = document.getElementById("myInputField");


            inputField.value = "OnGoing";
        });
    </script>

    <script type="text/javascript">
        var searchInput = 'search_input';

        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode'],
            });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getplaces();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>
<!--Add code-->
<?php
include 'database.php';

if (isset($_POST['submit'])) {
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $incident = $_POST['incident'];
    $instruction = $_POST['instruction'];
    $status = $_POST['status'];

    // Handle uploaded file
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["evidencePicture"]["name"]);

    if (move_uploaded_file($_FILES["evidencePicture"]["tmp_name"], $targetFile)) {
        // Insert data into the report table
        $sqlReport = "INSERT INTO report (location, contact, date, incident_type, instruction, status, evidence) VALUES ('$location', '$contact', '$date', '$incident', '$instruction', '$status', '$targetFile')";
        if ($conn->query($sqlReport)) {
?>
            <script>
                Swal.fire(
                    'Success',
                    'Report Submitted!',
                    'success'
                )
            </script>
<?php
        } else {
            echo "Error: " . $sqlReports . "<br>" . $conn->error;
            echo "Error: " . $sqlReport . "<br>" . $conn->error;
        }
    } else {
        // Handle file upload failure...
    }
}
?>