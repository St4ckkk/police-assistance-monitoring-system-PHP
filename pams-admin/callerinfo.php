<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Caller Info</title>
</head>
<style>
    .container {
  display: flex; /* Use flexbox to align items in a row */
  margin-top: 5vh;
  margin-bottom: 5vh;
}
    .status {
  border: 1px solid #ccc;
  padding: 10px;
  margin: 5px;
}

/* Styles for the completed reports card */
.card {
  border: 1px solid #ccc;
  padding: 10px;
  margin: 5px;
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
                            <label>Incident_Type</label>
                            <input type="text" name="incident" id="incident" class="form-control">
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
    <!--Delete modal-->
    <div class="modal fade" id="ups" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <input type="hidden" name="delete_ids" id="delete_ids" class="form-control">

                            <input type="hidden" id="myInputField" name="status">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="done" class="btn btn-primary">Report Done</button>
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
                                <a href="addcaller.php" class="sidebar-link">Report Incident</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="callerinfo.php" class="sidebar-link">Reports</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="records.php" class="sidebar-link">Records</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="addreport.php" class="sidebar-link">Add Report</a>
                            </li>
                        </ul>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="reports.php" class="sidebar-link">Reports</a>
                            </li>
                        </ul>
                    <li a class="sidebar-item">
                        <a href="logout.php" class="sidebar-link">
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
                <h1>Reports</h1>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <div class="container">
                        <div class="card col-md-3">
                            <h5>All Reports:</h5>
                            <?php
                        include 'database.php';

                        $dash_category_query = "SELECT * FROM reports";
                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                        if ($category_total = mysqli_num_rows($dash_category_query_run)) {
                            echo '<h4 class="mb-0"> ' . $category_total . ' </h4>';
                        } else {
                            echo '<h4 class="mb-0">0</h4>';
                        }
                        ?>
                        </div>
                        <div class="status card col-md-3">
                            <h5>Ongoing Reports:</h5>
                            <?php
                        include 'database.php';

                        $dash_category_query = "SELECT * FROM reports WHERE status='OnGoing' ";
                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                        if ($category_total = mysqli_num_rows($dash_category_query_run)) {
                            echo '<h4 class="mb-0"> ' . $category_total . ' </h4>';
                        } else {
                            echo '<h4 class="mb-0"> 0 </h4>';
                        }
                        ?>
                        </div>
                        <div class="card col-md-3">
                            <h5>Completed Reports:</h5>
                            <?php
                        include 'database.php';

                        $dash_category_query = "SELECT * FROM reports WHERE status='Done' ";
                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                        if ($category_total = mysqli_num_rows($dash_category_query_run)) {
                            echo '<h4 class="mb-0"> ' . $category_total . ' </h4>';
                        } else {
                            echo '<h4 class="mb-0">0</h4>';
                        }
                        ?>
                        </div>
                        </div>
                        <table class="table table-dark table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Incident_Type</th>
                                    <th scope="col">Instruction</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include 'database.php';



                                $sql = "SELECT * FROM reports";
                                $query_run = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $report) {
                                ?>
                                        <tr>
                                            <td><?= $report['id'] ?></td>
                                            <td><?= $report['location'] ?></td>
                                            <td><?= $report['contact'] ?></td>
                                            <td><?= $report['date'] ?></td>
                                            <td><?= $report['incident_type'] ?></td>
                                            <td><?= $report['instruction'] ?></td>

                                            <td>     
                                                <button type="button" class="btn btn-danger deletebtn" name="deletebtn"><i class="fa-solid fa-trash"></i></button>
                                                <button type="button" class="btn btn-primary editbtn" name="editbtn"><i class='bx bx-edit-alt'></i></button>
                                                <button type="button" class="btn btn-success up" name="up"><i class='bx bx-check' ></i></button>
                                            </td>
                                            <td><?= $report['status'] ?></td>
                                            <td>
                                            <a href="maps.php?location=<?= urlencode($report['location']) ?>">See Map Location</a>
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
    <script>
  $(document).ready( function () {
    $('#mytable').DataTable();
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


            });
        });
    </script>
        <script>
        $(document).ready(function() {
            $('.up').on('click', function() {

                $('#ups').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_ids').val(data[0]);


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
document.addEventListener("DOMContentLoaded", function() {

    var inputField = document.getElementById("myInputField");
    
 
    inputField.value = "Done";
});
</script>
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" integrity="sha512-5SUkiwmm+0AiJEaCiS5nu/ZKPodeuInbQ7CiSrSnUHe11dJpQ8o4J1DU/rw4gxk/O+WBpGYAZbb8e17CDEoESw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
    $incident = $_POST['incident'];
    $instruction = $_POST['instruction'];

    $query = "UPDATE reports SET location='$location', contact='$contact', date='$date', incident_type='$incident', instruction='$instruction' WHERE id='$id'";
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

<?php
include 'database.php';

if (isset($_POST['done'])) {

    $id = $_POST['delete_ids'];
    $status = $_POST['status'];

    $query = "UPDATE report SET status='$status' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

    } else {
    }
}

?>

<?php
include 'database.php';

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $incident = $_POST['incident'];
    $instruction = $_POST['instruction'];

    $query = "UPDATE report SET location='$location', contact='$contact', date='$date', incident_type='$incident', instruction='$instruction' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
?>
        <script>
            let timerIntervalss
            Swal.fire({
                title: 'Updating Data',
                html: 'I will close in <b></b> milliseconds.',
                timer: 2000,
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

<?php
include 'database.php';

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $incident = $_POST['incident'];
    $instruction = $_POST['instruction'];

    $query = "UPDATE records SET location='$location', contact='$contact', date='$date', incident_type='$incident', instruction='$instruction' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
?>
        <script>
            let timerIntervalsss
            Swal.fire({
                title: 'Updating Data',
                html: 'I will close in <b></b> milliseconds.',
                timer: 2000,
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


<?php
include 'database.php';

if (isset($_POST['done'])) {

    $id = $_POST['delete_ids'];
    $status = $_POST['status'];

    $query = "UPDATE reports SET status='$status' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
?>
        <script>


        </script>



<?php

    } else {
    }
}

?>

<?php
include 'database.php';

if (isset($_POST['done'])) {

    $id = $_POST['delete_ids'];
    $status = $_POST['status'];

    $query = "UPDATE report SET status='$status' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
?>
        <script>


        </script>



<?php

    } else {
    }
}

?>



