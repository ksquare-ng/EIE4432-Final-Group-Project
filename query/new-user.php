<!DOCTYPE html>
<html>
<?php
    require 'login-database.php';

    $lastName = $_POST["last-name"];
    $firstName = $_POST["first-name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $image = $_POST["image"];

    $query = "SELECT * FROM TEACHERS WHERE tUsername = '$username'";
    $result1 = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result1);
    if ($row != null) echo '<script>alert("Username existed!");
    window.location.href = "../pages/new-user.html";
    </script>';

    $query = "SELECT * FROM STUDENTS WHERE sUsername = '$username'";
    $result2 = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result2);
    if ($row != null) echo '<script>alert("Username existed!")
    window.location.href = "../pages/new-user.html";
    </script>';

    if ($role == "teacher") {
        $course = $_POST["course"];
        $query = "INSERT INTO TEACHERS (tFirst, tLast, tEmail, tCourse, tIMG, tUsername, tPassword) VALUES ('$firstName', '$lastName', '$email', '$course', '$image', '$username', '$password')";
    }
    else if ($role == "student") {
        $birthday = $_POST["birthday"];
        $gender = $_POST["gender"];
        $query = "INSERT INTO STUDENTS (sFirst, sLast, sEmail, sGender, sBday, sIMG, sUsername, sPassword) VALUES ('$firstName', '$lastName', '$email', '$gender', '$birthday', '$image', '$username', '$password')";
    }

    $result = mysqli_query($connect, $query);

    if($result) echo "<script>alert('Account created!');
    window.location.href = '../login.html';
    </script>";
?>
</html>