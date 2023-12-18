<?php
    include 'database.php';

    $id = $_GET['id'];
    $status = $_GET['status'];

    $updateQuery = "UPDATE reports SET status=$status WHERE id=$id";

    mysqli_query($conn, $updateQuery);
    header('location:callerinfo.php');


?>



