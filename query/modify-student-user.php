<!DOCTYPE html>
<html>
<?php
    require 'login-database.php';

    echo "here";

    $lastName = $_POST["last-name"];
    $firstName = $_POST["first-name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $image = $_POST["image"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $oldUsername = $_POST["oldUsername"];

    $query = "SELECT * FROM STUDENTS WHERE sUsername = '$username'";
    $result1 = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result1);
    if ($row != null) echo '<script>alert("Username existed!")
    window.location.href = "../pages/profile-setting.php?username='.$oldUsername.'&role=student";
    </script>';

    $query = "UPDATE STUDENTS SET sFirst = '$firstName', sLast = '$lastName', sEmail = '$email', sGender = '$gender', sBday = '$birthday', sIMG = '$image', sUsername = '$username', sPassword = '$password' WHERE sUsername = '$oldUsername'";

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