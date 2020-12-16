<?php
    require "login-database.php";
    $username = $_GET['name'];

    $query = "DELETE FROM TEACHERS WHERE tUsername ='$username'";
    $result = mysqli_query($connect, $query);
?>