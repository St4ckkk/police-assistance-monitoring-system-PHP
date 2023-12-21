<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="icon.ico" type="image/x-icon">
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

    <style>
        body {
            position: relative;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            color: #343a40;
            background-image: url('tupi-mps.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        body::before {
            content: "";
            background: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
        }


        nav {
            background-color: #007bff;
            padding: 15px 0;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

        h1 {
            font-weight: bold;
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #007bff;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .container {
            margin-top: 10px;
        }

        table {
            width: 100%;
            max-width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #343a40;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        .table-transparent {
            background-color: rgba(0, 0, 0, 0.3);
            color: #fff;
            /* Set text color to white */
        }

        .table-transparent th {
            background-color: #007bff;
            color: #fff;
        }
    </style>

    <!-- Page Title -->
    <title>Police Assistance Monitoring System</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home</a>
            <a class="navbar-brand" href="#">Contact 911</a>
        </div>
    </nav>

    <!-- Main Content Container -->
    <div class="container text-center">
        <!-- Main Heading -->
        <h1 class="mb-4 mt-5">Welcome to Tupi Police Assistance Monitoring System</h1>

        <!-- Subheading -->
        <p class="lead mb-4 text-white">Empowering communities through real-time incident reporting and monitoring.</p>

        <!-- Call-to-action Button -->
        <a href="userAddComplaint.php" class="btn btn-primary btn-lg">Report Incident</a>
    </div>

    <!-- Emergency Contact Information Container -->
    <div class="container">
        <!-- Emergency Contact Information Heading -->
        <h2 class="text-white">Emergency Contact Information</h2>

        <!-- Emergency Contact Information Table for South Cotabato -->
        <table class="table-hover table-striped table-condensed table-bordered table-transparent ">
            <thead>
                <tr>
                    <th>AGENCY</th>
                    <th>HOTLINE</th>
                    <th>TRUNK & DIRECT LINE</th>
                    <th>AREA</th>
                </tr>
            </thead>
            <tbody>
                <!-- National Emergency Hotline -->
                <tr>
                    <td>NATIONAL EMERGENCY HOTLINE</td>
                    <td>911</td>
                    <td>-</td>
                    <td>Nationwide</td>
                </tr>
                <!-- NDRRMC Trunklines -->
                <tr>
                    <td>NDRRMC</td>
                    <td>(02) 911-1406, (02) 912-2665, (02) 912-5668</td>
                    <td>-</td>
                    <td>Nationwide</td>
                </tr>
                <!-- PNP Hotline -->
                <tr>
                    <td>Philippine National Police (PNP) Hotline Patrol</td>
                    <td>117 or send TXT PNP to 2920</td>
                    <td>-</td>
                    <td>Nationwide</td>
                </tr>
                <!-- Bureau of Fire Protection (NCR) -->
                <tr>
                    <td>Tupi Bureau of Fire Protection</td>
                    <td>(083) 226-1251 (Landline) 0921-490-6628(Smart)</td>
                    <td>-</td>
                    <td>National Highway, Tupi</td>
                </tr>
                <!-- PAGASA -->
                <tr>
                    <td>Philippine Atmospheric, Geophysical and Astronomical Services Administration (PAGASA)</td>
                    <td>(02) 433-8526</td>
                    <td>-</td>
                    <td>Nationwide</td>
                </tr>
                <!-- DOTC -->
                <tr>
                    <td>Department of Transportation and Communications (DOTC)</td>
                    <td>7890 or 0918-8848484</td>
                    <td>-</td>
                    <td>Nationwide</td>
                </tr>
                <!-- DPWH -->
                <tr>
                    <td>Department of Public Works and Highways (DPWH)</td>
                    <td>(02) 304-3713</td>
                    <td>-</td>
                    <td>Nationwide</td>
                </tr>
                <!-- RED CROSS -->
                <tr>
                    <td>Red Cross</td>
                    <td>143, (02) 911-1876</td>
                    <td>-</td>
                    <td>Nationwide</td>
                </tr>
                <tr>
                    <td>New Police Station, Tupi, South Cotabato</td>
                    <td>0909 828 1201</td>
                    <td>-</td>
                    <td>Tupi, South Cotabato</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.css" />
    <link rel="stylesheet" href="node_modules/font-awesome/css/all.min.css" />

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>