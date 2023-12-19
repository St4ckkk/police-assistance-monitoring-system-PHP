<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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


    /* Responsive */

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
                                    <th scope="col">Assigned Police</th>
                                    <th scope="col">Instruction</th>
                                    <th scope="col">Action</th>
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
                                            <td><?= $report['fullname'] ?></td>
                                            <td><?= $report['instruction'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-info show-evidence-btn" data-toggle="modal" data-report-id="<?= $report['id'] ?>" data-evidence="<?= $report['evidence'] ?>">
                                                    <i class="fa-solid fa-eye"></i> See Evidence
                                                </button>
                                                <button type="button" class="btn btn-primary editbtn" name="editbtn"><i class="fa-solid fa-pen-to-square"></i></button>
                                                <button type="button" class="btn btn-danger deletebtn" name="deletebtn"><i class="fa-solid fa-trash"></i></button>

                                            </td>
                                            <td><?= $report['status'] ?></td>
                                            <div class="modal fade" id="evidenceModal<?= $report['id'] ?>" tabindex="-1" aria-labelledby="evidenceModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="evidenceModalLabel">Evidence</h5>
                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img id="evidenceImage<?= $report['id'] ?>" class="img-fluid" alt="Evidence">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" integrity="sha512-5SUkiwmm+0AiJEaCiS5nu/ZKPodeuInbQ7CiSrSnUHe11dJpQ8o4J1DU/rw4gxk/O+WBpGYAZbb8e17CDEoESw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
                $('#evidencePicture').val(data[5]);


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