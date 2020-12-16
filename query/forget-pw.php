<!DOCTYPE html>
<html>
<?php
    require 'login-database.php';

    $username = $_POST["username"];
    $password = $_POST["new-password"];

    $query = "SELECT sUsername, sPassword, sLast, sFirst FROM STUDENTS WHERE sUsername = '$username'";
    $result = mysqli_query($connect, $query);
    $dbPassword1 = mysqli_fetch_assoc($result);
    $query = "SELECT tUsername, tPassword, tLast, tFirst FROM TEACHERS WHERE tUsername = '$username'";
    $result = mysqli_query($connect, $query);
    $dbPassword2 = mysqli_fetch_assoc($result);

    if($dbPassword1 == null && $dbPassword2 == null) {
        echo "<script>alert('No existing user found!');
        window.location.href = '../pages/forget-pw.html';
        </script>";
    }

    $query = "UPDATE STUDENTS SET sPassword = '$password' WHERE sUsername = '$username'";
    $results1 = mysqli_query($connect, $query);
    $query = "UPDATE TEACHERS SET tPassword = '$password' WHERE tUsername = '$username'";
    $results2 = mysqli_query($connect, $query);

    echo "<script>alert('New password is set.');
    window.location.href = '../login.html';
    </script>";
    
    mysqli_close($connect);
?>
</html>