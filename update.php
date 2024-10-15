<?php
    include("connection.php");

    if(isset($_POST['id'])){
        $title = $_POST['title'];
        $start_date = $_POST['start'];
        $end_date = $_POST['end'];
        $id = $_POST['id'];

        $update_query = mysqli_query($connection, "UPDATE tbl_event SET title='$title', start_date='$start_date', end_date='$end_date' WHERE id='$id'");
    }
?>