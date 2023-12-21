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
    <title>Complaint History</title>
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

    .table th,
    .table td {
        text-align: center;
    }




    .status-column.status-verified {
        color: #28a745;
    }

    .status-column.status-done {
        color: #28a745;
    }

    .status-column.status-processing {
        color: #dc3545;
    }

    @media (min-width:768px) {
        .content {
            width: auto;
        }
    }
</style>

<body>
    <!--Edit modal-->
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
                            <label>Location</label>
                            <input type="text" name="location" id="location" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" name="contact" id="contact" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Incident Type</label>
                            <input type="text" name="incident" id="incident" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="evidencePicture" class="form-label">Evidence Picture:</label>
                            <input type="file" id="evidencePicture" name="evidencePicture" accept="image/*" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Instruction</label>
                            <textarea name="instruction" id="instruction" size="6" class="form-control" style="color: #333;"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
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
                <h1>Report History</h1>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <table class="table table-white table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" hidden>ID</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Incident Type</th>
                                    <th scope="col">Other Details</th>
                                    <th scope="col">Assigned Police</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include 'database.php';


                                $sql = "SELECT report.id, report.location, report.contact, report.date, report.incident_type, report.evidence, report.instruction, report.status, police.fullname
                                FROM report
                                LEFT JOIN police ON report.assignedpolice = police.id";
                                $query_run = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $report) {
                                ?>
                                        <tr>
                                            <td hidden><?= $report['id'] ?></td>
                                            <td><?= $report['location'] ?></td>
                                            <td><?= $report['contact'] ?></td>
                                            <td><?= $report['date'] ?></td>
                                            <td><?= $report['incident_type'] ?></td>
                                            <td><?= $report['instruction'] ?></td>
                                            <td><?= $report['fullname'] ?></td>

                                            <td class="status-column <?= $report['status'] === 'Verified' ? 'status-verified' : ($report['status'] === 'Done' ? 'status-done' : 'status-processing') ?>">
                                                <?= $report['status'] ?>
                                                <?php if ($report['status'] === 'Verified') : ?>
                                                    <i class="bx bx-check-circle"></i>
                                                <?php endif; ?>
                                            </td>

                                        </tr>
                                <?php
                                    }
                                }

                                ?>

                            </tbody>

                        </table>

                    </div>
                </div>
            </main>
        </div>
    </div>
    <link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.css" />
    <link rel="stylesheet" href="node_modules/font-awesome/css/all.min.css" />
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="script.js"></script>
    <script>
        function openEvidenceModal(reportId, evidence) {
            console.log(evidence);
            $('#evidenceImage' + reportId).attr('src', evidence);
            $('#evidenceModal' + reportId).modal('show');
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.show-evidence-btn').on('click', function() {
                // Get the report ID and evidence directly from data attributes
                const reportId = $(this).data('report-id');
                const evidence = $(this).data('evidence');

                // Call the function with both report ID and evidence
                openEvidenceModal(reportId, evidence);
            });
        });
    </script>


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
                $('#location').val(data[1]);
                $('#contact').val(data[2]);
                $('#date').val(data[3]);
                $('#incident').val(data[4]);
                $('#instruction').val(data[5]);
                $('#evidencePicture').val(data[6]);


            });
        });
    </script>
    <script>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>
<!--upadate code-->
<?php
include 'database.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $incident = $_POST['incident'];
    $instruction = $_POST['instruction'];
    // Handle uploaded file
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["evidencePicture"]["name"]);
    $uploadOk = 1;

    // Check if a new file is uploaded
    if ($_FILES["evidencePicture"]["name"]) {
        if (move_uploaded_file($_FILES["evidencePicture"]["tmp_name"], $targetFile)) {
            // File uploaded successfully
            $evidence = $targetFile;
        } else {
            // Handle file upload failure...
            $uploadOk = 0;
        }
    }

    if ($uploadOk) {
        // Update data in the database
        $query = "UPDATE report SET 
            location='$location', 
            contact='$contact', 
            date='$date', 
            incident_type='$incident', 
            instruction='$instruction', 
            evidence='$evidence'";

        // Update evidence field only if a new file is uploaded
        if ($_FILES["evidencePicture"]["name"]) {
            $query .= ", evidence='$targetFile'";
        }

        $query .= " WHERE id='$id'";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
?>
            <script>
                let timerInterval
                Swal.fire({
                    title: 'Updating Data',
                    html: 'I will close in <b></b> milliseconds.',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        location.href = "userReports.php"
                    }
                })
            </script>
<?php
        } else {
            // Handle query execution failure...
        }
    }
}
?>

<!--Delete php code-->

<?php
include 'database.php';

if (isset($_POST['deletedata'])) {

    $id = $_POST['delete_id'];

    $query = "DELETE FROM report WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
?>
        <script>
            let timerIntervals;
            Swal.fire({
                title: "Auto close alert!",
                html: "I will close in <b></b> milliseconds.",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerIntervals = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerIntervals);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    location.href = "userReports.php"

                }
            });
        </script>
<?php

    }
}

?>