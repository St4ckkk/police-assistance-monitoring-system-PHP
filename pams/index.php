<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            color: #343a40;
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

        .container {
            margin-top: 50px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #343a40;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        td {
            background-color: #fff;
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
        <h1 class="mb-4 mt-5">Welcome to the Police Assistance Monitoring System</h1>

        <!-- Subheading -->
        <p class="lead mb-4">Empowering communities through real-time incident reporting and monitoring.</p>

        <!-- Call-to-action Button -->
        <a href="userAddComplaint.php" class="btn btn-primary btn-lg">Report Incident</a>
    </div>

    <!-- Emergency Contact Information Container -->
    <div class="container">
        <!-- Emergency Contact Information Heading -->
        <h2>Emergency Contact Information</h2>

        <!-- Emergency Contact Information Table for South Cotabato -->
        <table class="table">
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
                    <td>Bureau of Fire Protection (NCR)</td>
                    <td>(02) 729-5166, (02) 410-6254, (02) 431-8859, (02) 407-1230</td>
                    <td>-</td>
                    <td>NCR</td>
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
                <!-- MMDA -->
                <tr>
                    <td>Metro Manila Development Authority (MMDA) Metrobase</td>
                    <td>136</td>
                    <td>-</td>
                    <td>NCR</td>
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
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>