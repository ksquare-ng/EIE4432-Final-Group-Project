<!DOCTYPE html>
<html>
<?php
    require 'login-database.php';

    $lastName = $_POST["last-name"];
    $firstName = $_POST["first-name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $image = $_POST["image"];
    $course = $_POST["course"];
    $oldUsername = $_POST["oldUsername"];

    $query = "SELECT * FROM TEACHERS WHERE tUsername = '$username'";
    $result1 = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result1);
    if ($row != null) echo '<script>alert("Username existed!")
    window.location.href = "../pages/profile-setting.php?username='.$oldUsername.'&role=teacher";
    </script>';

    $query = "UPDATE TEACHERS SET tFirst = '$firstName', tLast = '$lastName', tEmail = '$email', tCourse = '$course', tIMG = '$image', tUsername = '$username', tPassword = '$password' WHERE tUsername = '$oldUsername'";

    $result = mysqli_query($connect, $query);

    if($result) {
        setcookie("username", $username, time() + 86400, '/');
        echo "<script>alert('User modified!');
        window.location.href = '../pages/profile-setting.php';
        </script>";
    }
    mysqli_close($connect);
?>
</html>