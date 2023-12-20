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
    <title>Complaints Records</title>
</head>
<style>
    .container {
        display: flex;
        /* Use flexbox to align items in a row */
        margin-top: 5vh;
        margin-bottom: 5vh;
    }

    .status {
        border: 1px solid #ccc;
        padding: 10px;
        margin: 5px;
    }

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

    .card {
        background-color: #007bff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 40px;
        text-align: center;
    }

    /* Modal Styles with Transitions */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 50px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.9);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        max-height: 80vh;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Fade-in transition */
    .modal.fade-in {
        display: block;
        opacity: 1;
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

                <div class="modal-body">
                    <form method="POST">
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
                            <label>Instruction</label>
                            <input type="text" name="instruction" id="instruction" class="form-control">
                        </div>
                        <div class="modal-footer">

                            <button type="submit" name="update" class="btn btn-primary">update data</button>
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
                <h1>Records</h1>
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
                                    <th scope="col">Evidence</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include 'database.php';



                                $sql = "SELECT * FROM records";
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
                                            <td>
                                                <img src="<?= $report['evidence'] ?>" alt="" style="max-width: 300px; max-height: 300px;" class="img-fluid">
                                            </td>
                                            <!-- Image Modal -->
                                            <div id="imageModal" class="modal">
                                                <span class="close">&times;</span>
                                                <img class="modal-content" id="imgModal">
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
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });

        var modal = document.getElementById("imageModal");
        var img = document.getElementById("imgModal");
        var span = document.getElementsByClassName("close")[0];


        function openModal(src) {
            modal.style.display = "block";
            img.src = src;
            setTimeout(() => {
                modal.classList.add("fade-in");
            }, 30);
        }


        span.onclick = function() {
            modal.classList.remove("fade-in");
            setTimeout(() => {
                modal.style.display = "none";
            }, 300);
        };

        // Close the modal if the user clicks outside the modal content
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.remove("fade-in");
                setTimeout(() => {
                    modal.style.display = "none";
                }, 300);
            }
        };

        $(document).ready(function() {
            $('#myTable img').on('click', function() {
                var src = $(this).attr('src');
                openModal(src);
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
                $('#instruction').val(data[4]);


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
    <link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.css" />
    <link rel="stylesheet" href="node_modules/font-awesome/css/all.min.css" />
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
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
    $instruction = $_POST['instruction'];

    $query = "UPDATE reports SET location='$location', contact='$contact', date='$date', instruction='$instruction' WHERE id='$id'";
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
                    location.href = "callerinfo.php"
                }
            })
        </script>



<?php

    } else {
    }
}

?>
<!--Delete php code-->

<?php
include 'database.php';

if (isset($_POST['deletedata'])) {

    $id = $_POST['delete_id'];

    $query = "DELETE FROM reports WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
?>
        <script>
            let timerIntervals
            Swal.fire({
                title: 'Updating Data',
                html: 'I will close in <b></b> milliseconds.',
                timer: 2000,
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
                    location.href = "callerinfo.php"
                }
            })
        </script>



<?php

    }
}

?>