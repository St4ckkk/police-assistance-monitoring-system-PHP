<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css" />
    <link rel="stylesheet" href="node_modules/datatables.net-dt/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="node_modules/font-awesome/css/all.min.css" />
    <link href='node_modules/boxicons/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
    <script src="node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <title>Report Incident</title>
</head>
<style>
    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        background-color: white;
        color: #333;
    }

    h3 {
        font-size: 1.53475rem;
        color: #3A98B9;
    }

    a {
        cursor: pointer;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        color: #3A98B9;
    }

    li {

        list-style: none;
    }

    /* Layout skeleton */

    .wrapper {
        align-items: stretch;
        display: flex;
        width: 100%;
    }

    #sidebar {
        max-width: 264px;
        min-width: 264px;
        transition: all 0.35s ease-in-out;
        box-shadow: 0 0 35px 0 rgba(226, 200, 183, 0.199);
        z-index: 1111;
    }

    /* Sidebar collapse */

    #sidebar.collapsed {
        margin-left: -264px;
    }

    .main {
        display: flex;
        flex-direction: column;
        margin-top: 10px;
        min-height: 100vh;
        width: 100%;
        overflow: hidden;
        transition: all 0.35s ease-in-out;
        color: #333;
    }

    .sidebar-logo {
        padding: 1.15rem 1.5rem;
    }

    .sidebar-logo a {
        color: #007bff;
        font-size: 2.25rem;
        font-weight: 600;
    }

    .sidebar-nav {
        padding: 0;
    }

    .sidebar-header {
        color: #007bff;
        font-size: .75rem;
        padding: 1.5rem 1.5rem .375rem;
    }

    a.sidebar-link {
        padding: .625rem 1.625rem;
        color: #200E3A;
        position: relative;
        display: block;
        font-size: 1rem;
    }

    .sidebar-link[data-bs-toggle="collapse"]::after {
        border: solid;
        border-width: 0 .075rem .075rem 0;
        content: "";
        display: inline-block;
        padding: 2px;
        position: absolute;
        right: 1.5rem;
        top: 1.4rem;
        transform: rotate(-135deg);
        transition: all .2s ease-out;
        color: #200E3A;
    }

    .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
        transform: rotate(45deg);
        transition: all .2s ease-out;
    }

    .sidebar-nav li i {
        color: #200E3A;
    }

    .content {
        flex: 1;
        max-width: 100vw;
        width: 100vw;
    }

    label {
        color: #333;
    }

    form {
        color: beige;
        margin: auto;
    }


    /* Responsive */

    @media (min-width:768px) {
        .content {
            width: auto;
        }
    }
</style>

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
                        <a href="index.php" class="sidebar-link">
                            <i class="bx bx-home"></i>
                            Home
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                            <i class="bx bx-file"></i>
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
                            <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location" id="search_input" placeholder="Location" required>
                                </div>

                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="number" class="form-control" name="contact" id="contact" placeholder="09XX-XXX-XXXX" required>
                                </div>

                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" id="date" placeholder="" required>
                                </div>

                                <div class="mb-3">
                                    <label for="incident" class="form-label">Incident Type</label>
                                    <select name="incident" class="form-control" id="incident" required>
                                        <option value="">-- Select Incident Type --</option>
                                        <option value="Theft">Theft</option>
                                        <option value="Motorcycle Incident">Motorcycle Incident</option>
                                        <option value="Fire Incident">Fire Incident</option>
                                        <option value="Unsafe Acts">Unsafe Acts</option>
                                        <option value="Drugs">Drugs</option>
                                        <option value="Workplace Hazards">Workplace Hazards</option>
                                        <option value="Minor Injury">Minor Injury</option>
                                        <option value="Fatalities">Fatalities</option>
                                        <option value="Assault">Assault</option>
                                        <option value="Vandalism">Vandalism</option>
                                        <option value="Burglary">Burglary</option>
                                        <option value="Domestic Violence">Domestic Violence</option>
                                        <option value="Robbery">Robbery</option>
                                        <option value="Car Accident">Car Accident</option>
                                        <option value="Natural Disaster">Natural Disaster</option>
                                        <option value="Harassment">Harassment</option>
                                        <option value="Kidnapping">Kidnapping</option>
                                        <option value="Sexual Assault">Sexual Assault</option>
                                        <option value="Cybercrime">Cybercrime</option>
                                        <option value="Hate Crime">Hate Crime</option>
                                        <option value="Forgery">Forgery</option>
                                        <option value="Embezzlement">Embezzlement</option>
                                        <option value="Fraud">Fraud</option>
                                        <option value="Identity Theft">Identity Theft</option>
                                        <option value="Stalking">Stalking</option>
                                        <option value="Trespassing">Trespassing</option>
                                        <option value="Disorderly Conduct">Disorderly Conduct</option>
                                        <option value="Public Intoxication">Public Intoxication</option>
                                        <option value="Arson">Arson</option>
                                        <option value="Kidnapping">Kidnapping</option>
                                        <option value="Extortion">Extortion</option>
                                        <option value="White Collar Crime">White Collar Crime</option>
                                        <option value="Terrorism">Terrorism</option>
                                        <option value="Corruption">Corruption</option>
                                        <option value="Bribery">Bribery</option>
                                        <option value="Animal Cruelty">Animal Cruelty</option>
                                        <option value="Environmental Violation">Environmental Violation</option>
                                        <option value="Human Trafficking">Human Trafficking</option>
                                        <option value="Forgery">Forgery</option>
                                        <option value="Other Crime">Other Crime</option>
                                        <option value="Others">-- Others --</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="evidencePicture" class="form-label">Evidence Picture:</label>
                                    <input type="file" id="evidencePicture" name="evidencePicture" accept="image/*" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <input type="hidden" name="status" value="OnGoing">
                                    <input type="hidden" name="assignedpolice" value="None">
                                    <label for="incidentDetails" class="form-label">Provide Specific Incident Details</label>
                                    <textarea name="instruction" id="incidentDetails" rows="4" class="form-control"></textarea>
                                </div>

                                <hr>

                                <input class="btn btn-success w-100" type="submit" name="submit" value="Submit">
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
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
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
    $assignedpolice = $_POST['assignedpolice'];

    // Handle uploaded file
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["evidencePicture"]["name"]);

    if (move_uploaded_file($_FILES["evidencePicture"]["tmp_name"], $targetFile)) {
        // Insert data into the report table
        $sqlReport = "INSERT INTO report (location, contact, date, incident_type, instruction, status, evidence, assignedpolice) VALUES ('$location', '$contact', '$date', '$incident', '$instruction', '$status', '$targetFile', '$assignedpolice')";
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