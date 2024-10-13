<?php
      $server = "localhost";
      $username = "root";
      $password = "123456";
      $database = "college_db";
      $connection = mysqli_connect("$server", "$username", "$password");
      $select_db = mysqli_connect_db($connection, $database);
      if(!$select_db)
      {
            echo("Connection Terminated");
      }
?>