<?php
    require 'login-database.php';

    $lastName = $_POST["last-name"];
    $firstName = $_POST["first-name"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    
    if ($role == "teacher") {
        $course = $_POST["course"];
        #fill in bracket
        $query = "INSERT INTO TEACHER () VALUES ($lastName, $firstName, $email, $course)";
    }
    else if ($role == "student") {
        $birthday = $_POST["birthday"];
        $gender = $_POST["gender"];
        #fill in bracket
        $query = "INSERT INTO STUDENT () VALUES ($lastName, $firstName, $email, $birthday, $gender)";
    }

    $results = mysqli_query($connect, $query);

    if(!$result) alert("Error. Account is not created.");
    else {
        alert("Account successfully created.");
    }

    function alert($message) {
        echo "<script>alert($message);
        window.location.href = '/login.html';
        </script>";
    }
?>