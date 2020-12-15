<?php
    require 'login-database.php';

    $username = $_POST["username"];
    $password = $_POST["new-password"];

    $query = "UPDATE STUDENTS SET sPassword = $password WHERE sUsername = $username";
    $results1 = mysqli_query($connect, $query);
    $query = "UPDATE TEACHERS SET tPassword = $password WHERE tUsername = $username";
    $results2 = mysqli_query($connect, $query);

    if(!$results1 && !$results2) alert("Error. Password not changed");
    else {
        alert("New password is set.");
    }

    function alert($message) {
        echo "<script>alert($message);
        window.location.href = '../login.html';
        </script>";
    }
?>