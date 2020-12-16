<!DOCTYPE html>
<html>
<head>
    <title>PolyU Exam | Home</title>
    <link rel="stylesheet" type="text/css" href="../style/main-style.css">
    <script type="text/javascript" src="../script/main-page.js"></script>
    <link rel = "stylesheet" href = "../style/sidebar.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <?php
        if (!isset($_COOKIE["username"])) {
            require '../query/login-database.php';

            $username = $_POST["username"];
            $password = $_POST["password"];
            $dbPassword = "admin";

            $query = "SELECT sUsername, sPassword, sLast, sFirst FROM STUDENTS WHERE sUsername = '$username'";
            $result = mysqli_query($connect, $query);
            $dbPassword1 = mysqli_fetch_assoc($result);
            $query = "SELECT tUsername, tPassword, tLast, tFirst FROM TEACHERS WHERE tUsername = '$username'";
            $result = mysqli_query($connect, $query);
            $dbPassword2 = mysqli_fetch_assoc($result);

            if ($dbPassword1 != null) {
                $dbPassword = $dbPassword1["sPassword"];
                $dbRole = "student";
            }
            else if ($dbPassword2 != null) {
                $dbPassword = $dbPassword2["tPassword"];
                $dbRole = "teacher";
            }
            else if ($username == "admin") $dbRole = "admin";

            if($dbPassword == $password) {
                setcookie("username", $username, time() + 86400, '/'); #only save non-sensitive data in cookies
                setcookie("role", $dbRole, time() + 86400, '/');

                if ($dbRole == "student") require "home-page-student.php";
                else if ($dbRole == "teacher") require "home-page-teacher.php";
                else if ($dbRole == "admin") require "home-page-admin.php";
            }
            else {
                echo "<script>alert('Wrong username or password');  
                    window.location.href = '../login.html';
                    </script>";
            }
        }
        else {
            $role = $_COOKIE['role'];

            if ($role == "student") require "home-page-student.php";
            else if ($role == "teacher") require "home-page-teacher.php";
            else if ($role == "admin") require "home-page-admin.php";
        }
        
        mysqli_close($connect);
    ?>
</body>
</html>