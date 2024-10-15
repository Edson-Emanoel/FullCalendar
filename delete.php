<?php
    include("connection.php");

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        $delete_query = mysqli_query($connection, "DELETE FROM tbl_event WHERE id='$id'");
    }
?>