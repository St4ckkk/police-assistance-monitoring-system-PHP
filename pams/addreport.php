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

    <title>Police</title>
</head>
<style>
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

    .card {
        background-color: #007bff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 40px;
        text-align: center;
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
                        <a href="dashboard.php" class="sidebar-link">
                            <i class="bx bx-home"></i>
                            Home
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                            <i class="bx bx-file"></i>
                            Complaint Logs
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="callerinfo.php" class="sidebar-link">Complaints</a>
                            </li>
                        </ul>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="records.php" class="sidebar-link">Records</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                            <i class="bx bx-shield"></i>
                            Police
                        </a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="addreport.php" class="sidebar-link">Police Records</a>
                            </li>
                        </ul>
                    </li>
                    <li a class="sidebar-item">
                        <a href="logout.php" class="sidebar-link">
                            <i class="bx bx-log-out"></i>
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
                <h1>Police Records</h1>
            </nav>
            <!--Delete modal-->
            <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="delete_id" id="delete_id" class="form-control">

                                </div>
                                <div class="text-center">
                                    <button type="submit" name="deletedata" class="btn btn-primary">Delete data</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-white">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" name="fullname" id="fullname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="contact" id="contact" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rank</label>
                                    <input type="rank" name="rank" id="rank" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Badge Number</label>
                                    <input type="text" name="policebadge" id="policebadge" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Specialty</label>
                                    <select class="form-select" name="specialty" id="specialty" required>
                                        <option value="">-- Select Police Specialty --</option>
                                        <option value="Traffic Management">Traffic Management</option>
                                        <option value="Drug Enforcement">Drug Enforcement</option>
                                        <option value="Criminal Investigation">Criminal Investigation</option>
                                        <option value="Community Relations">Community Relations</option>
                                        <option value="Special Weapons and Tactics (SWAT)">Special Weapons and Tactics (SWAT)</option>
                                        <option value="K9 Unit">K9 Unit</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
                            <div class="container">
                                <div class="row g-2">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Full Name" name="fullname" id="fullname">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Contact Number" name="contact" id="contact">
                                    </div>
                                </div>
                                <br>
                                <div class="row g-2">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Rank" name="rank" id="rank">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Badge Number" name="policebadge" id="policebadge">
                                    </div>
                                </div>
                                <br>
                                <div class="row g-2">
                                    <div class="col">
                                        <select class="form-select" name="specialty" id="specialty" required>
                                            <option value="">-- Select Police Specialty --</option>
                                            <option value="Traffic Management">Traffic Management</option>
                                            <option value="Drug Enforcement">Drug Enforcement</option>
                                            <option value="Criminal Investigation">Criminal Investigation</option>
                                            <option value="Community Relations">Community Relations</option>
                                            <option value="Special Weapons and Tactics (SWAT)">Special Weapons and Tactics (SWAT)</option>
                                            <option value="K9 Unit">K9 Unit</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row g-2">
                                    <div class="col">
                                        <input class="btn btn-success w-100" type="submit" name="addPolice" value="Add Police">
                                    </div>
                                </div>
                                <br>

                                <table class="table table-white table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" hidden>ID</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Contact Number</th>
                                            <th scope="col">Rank</th>
                                            <th scope="col">Badge Number</th>
                                            <th scope="col">Specialty</th>
                                            <th scope="col">Assign Report</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        include 'database.php';



                                        $sql = "SELECT * FROM police";
                                        $query_run = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $report) {
                                        ?>
                                                <tr>
                                                    <td hidden><?= $report['id'] ?></td>
                                                    <td><?= $report['fullname'] ?></td>
                                                    <td><?= $report['contact'] ?></td>
                                                    <td><?= $report['rank'] ?></td>
                                                    <td><?= $report['policebadge'] ?></td>
                                                    <td><?= $report['specialty'] ?></td>
                                                    <td>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="police_id" value="<?= $report['id'] ?>">
                                                            <?php
                                                            // Check the status from the police table
                                                            $policeStatusSql = "SELECT status FROM police WHERE id='" . $report['id'] . "'";
                                                            $policeStatusQuery = mysqli_query($conn, $policeStatusSql);
                                                            $policeStatus = mysqli_fetch_assoc($policeStatusQuery)['status'];

                                                            if ($policeStatus == 'Assigned') {
                                                                echo '<span class="text-success">Assigned</span>';
                                                            } else {
                                                                $reportSql = "SELECT id, incident_type FROM report WHERE assignedpolice='None'";
                                                                $reportQuery = mysqli_query($conn, $reportSql);

                                                                if (mysqli_num_rows($reportQuery) > 0) {
                                                                    echo '<select name="report_id" class="form-select">';
                                                                    foreach ($reportQuery as $reportOption) {
                                                                        $selected = ($reportOption['id'] == $report['assignedpolice']) ? 'selected' : '';
                                                                        echo "<option value='" . $reportOption['id'] . "' $selected>" . $reportOption['incident_type'] . "</option>";
                                                                    }
                                                                    echo '</select>';
                                                                }
                                                            }
                                                            ?>


                                                    </td>

                                                    <td>
                                                        <button type="submit" name="assignReport" class="btn btn-primary">Assign</button>
                                                        <button type="button" class="btn btn-primary editbtn" name="editbtn"><i class="bx bx-edit"></i></button>
                                                        <button type="button" class="btn btn-danger deletebtn" name="deletebtn"><i class="bx bx-trash"></i></button>

                                                    </td>

                        </form>
                        </td>
                        </tr>
                <?php
                                            }
                                        }

                ?>

                </tbody>
                </table>
                </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.css" />
    <link rel="stylesheet" href="node_modules/font-awesome/css/all.min.css" />
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
<script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#fullname').val(data[1]);
            $('#contact').val(data[2]);
            $('#rank').val(data[3]);
            $('#policebadge').val(data[4]);
        });
    });
    $(document).ready(function() {
        $('.deletebtn').on('click', function() {

            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);



        });
    });
</script>

</html>
<?php
include 'database.php';

if (isset($_POST['deletedata'])) {

    $id = $_POST['delete_id'];

    $query = "DELETE FROM police WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
?>
        <script>
            let timerIntervals
            Swal.fire({
                title: 'Deleting Data',
                html: 'I will close in <b></b> milliseconds.',
                timer: 500,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerIntervals = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerIntervals)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    location.href = "addreport.php"
                }
            })
        </script>



<?php

    }
}

?>

<?php
include 'database.php';

if (isset($_POST['addPolice'])) {
    $fullname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $rank = $_POST['rank'];
    $policebadge = $_POST['policebadge'];
    $specialty = $_POST['specialty']; // Added line for specialty

    $query = "INSERT INTO police (fullname, contact, rank, policebadge, specialty) VALUES ('$fullname', '$contact', '$rank', '$policebadge', '$specialty')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
?>
        <script>
            let timerIntervalss
            Swal.fire({
                title: 'Adding Police',
                html: 'It will close in <b></b> milliseconds.',
                timer: 500,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerIntervalss = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerIntervalss)
                    location.href = "addreport.php";
                }
            });
        </script>
<?php
    } else {
        // Handle the case where the query fails
        echo '<script>alert("Error adding police");</script>';
    }
}
?>

<?php
include 'database.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $rank = $_POST['rank'];
    $policebadge = $_POST['policebadge'];
    $specialty = $_POST['specialty']; // Added line for specialty

    $query = "UPDATE police 
              SET fullname='$fullname', contact='$contact', rank='$rank', policebadge='$policebadge', specialty='$specialty' 
              WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
?>
        <script>
            let timerIntervalsss
            Swal.fire({
                title: 'Updating Data',
                html: 'It will close in <b></b> milliseconds.',
                timer: 300,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerIntervalsss = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerIntervalsss)
                    location.href = "addreport.php";
                }
            });
        </script>
<?php
    } else {
        // Handle the case where the query fails
        echo '<script>alert("Error updating police data");</script>';
    }
}
?>


<?php
include 'database.php';
if (isset($_POST['assignReport'])) {
    $policeId = $_POST['police_id'];
    $reportId = $_POST['report_id'];

    // Check the current status of the police
    $policeStatusSql = "SELECT status FROM police WHERE id='" . $policeId . "'";
    $policeStatusQuery = mysqli_query($conn, $policeStatusSql);
    $policeStatus = mysqli_fetch_assoc($policeStatusQuery)['status'];

    // Check if the police status is already 'Assigned'
    if ($policeStatus == 'Assigned') {
        echo '<script>alert("This police officer is already assigned.");</script>';
    } else {
        // Update the assignedpolice column in the report table
        $assignReportQuery = "UPDATE report SET assignedpolice='$policeId' WHERE id='$reportId'";
        $assignReportQueryRun = mysqli_query($conn, $assignReportQuery);

        if ($assignReportQueryRun) {
            // Update the status column in the police table to 'Assigned'
            $updatePoliceStatusQuery = "UPDATE police SET status='Assigned' WHERE id='$policeId'";
            $updatePoliceStatusQueryRun = mysqli_query($conn, $updatePoliceStatusQuery);

            if ($updatePoliceStatusQueryRun) {
                echo '<script>
                    let timerIntervalsss;
                    Swal.fire({
                        title: "Assigning Police",
                        html: "It will close in <b></b> milliseconds.",
                        timer: 300,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const b = Swal.getHtmlContainer().querySelector("b");
                            timerIntervalsss = setInterval(() => {
                                b.textContent = Swal.getTimerLeft();
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerIntervalsss);
                            location.href = "addreport.php";
                        }
                    });
                </script>';
            } else {
                // Handle error in updating police status
                echo '<script>alert("Error updating police status");</script>';
            }
        } else {
            // Handle error in assigning report
            echo '<script>alert("Error assigning report");</script>';
        }
    }
}
