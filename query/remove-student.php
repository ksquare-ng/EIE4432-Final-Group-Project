<?php
    require "login-database.php";
    $username = $_GET['name'];

    $query = "DELETE FROM STUDENTS WHERE sUsername ='$username'";
    $result = mysqli_query($connect, $query);
?>