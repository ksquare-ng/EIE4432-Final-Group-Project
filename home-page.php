<!DOCTYPE html>
<html>
<head>
    <title>PolyU Exam</title>
    <link rel="stylesheet" type="text/css" href="main-style.css">
    <src type="text/javascript" src="main-page.js"></src>
</head>

<body>
    <?php
        require 'login-database.php';
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT PASSWORD FROM STUDENT WHERE USERNAME = $username";
        $result = mysqli_query($connect, $query);

        if (isset($_COOKIE["username"])) {
                echo '<ul class="navbar-long">
                <li><a class="active" href="home-page.html">Home</a></li>
                <li><a href="">Exam</a></li>
                <li><a href="login.html" onclick="logout()">Logout</a></li>
                <li><a href="">Profile</a></li>
                </ul>';
            }
        else {
            if($result == $password) setcookie("username", $username, time() + 1800);
        }
    ?>
</body>
</html>