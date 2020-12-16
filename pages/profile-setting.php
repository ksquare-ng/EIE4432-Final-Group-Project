<!DOCTYPE html>
<?php
    require "../query/login-database.php";
    $username = $_COOKIE["username"];
    $role = $_COOKIE["role"];

    if ($role == "student") $query = "SELECT * FROM STUDENTS WHERE sUsername = '$username'";
    else if ($role == "teacher") $query = "SELECT * FROM TEACHERS WHERE tUsername = '$username'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
?>

<html>
    <head>
        <title>PolyU Exam | Settings</title>
        <link rel="stylesheet" type="text/css" href="../style/profile.css">
        <script type="text/javascript" src="../script/main-page.js"></script>
        <link rel = "stylesheet" href = "../style/sidebar.css">
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    </head>
    <body>
        <div>
            <div class = "sidebar">
                <header> Sidebar </header>
                <ul>
                    <li><a href = "home-page.php"><i class = "fas fa-qrcode active"></i>Dashboard</a></li>
                    <li><a href = "#"><i class = "fas fa-stream"></i>Exams</a></li>
                    <li><a href = "#"><i class = "fas fa-chalkboard-teacher"></i>Grades</a></li>
                    <li><a href = "profile-setting.php" class="active"><i class="fas fa-user-cog"></i>Profile</a></li>
                    <li><a href = "../login.html" onclick="logout()"><i class = "fas fa-power-off"></i>Logout</a></li>
                </ul>
            </div>  
        </div>
        <?php
            if ($role == "student") {
                echo 
                '<div class="settings">
                <h2>Profile Settings</h2>
                <table id="user-info">
                    <tr>
                        <td>Profile</td>
                        <td><input style="width: 200px" type="file" id="image" name="image" value="Upload Image" accept="image/*" value=""></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                        <input class="user-input" type="text" id ="last-name" name="last-name" placeholder="Last Name">
                        <input class="user-input" type="text" id ="first-name" name="first-name" placeholder="First Name">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input class="user-input" type="text" id="email" name="email" placeholder="Email"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" name="gender" value="male">
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female">
                            <label for="female">Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Birthday </td>
                        <td><input class="user-input" id="birthday" type="date" name="birthday"></td>
                    </tr>
                </table>
                <input style="margin-top: 30px" type="submit" class="user-input">
            </div>';
            }
            else if ($role == "teacher") {
                echo 
                '<div class="settings">
                <h2>Profile Settings</h2>
                <table id="user-info">
                    <tr>
                        <td>Username</td>
                        <td>
                            <input class="user-input" type="text" id ="username" name="username" placeholder="Username" value="'.$row['tUsername'].'">
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input class="user-input" type="text" id ="password" name="password" placeholder="Password (8 Characters)" value="'.$row['tPassword'].'">
                        </td>
                    </tr>
                    <tr>
                        <td>Profile</td>
                        <td><input style="width: 200px" type="file" id="image" name="image" value="Upload Image" accept="image/*" value="'.$row['tIMG'].'"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                        <input class="user-input" type="text" id ="last-name" name="last-name" placeholder="Last Name" value="'.$row['tLast'].'"><br>
                        <input class="user-input" type="text" id ="first-name" name="first-name" placeholder="First Name" value="'.$row['tFirst'].'">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input class="user-input" type="text" id="email" name="email" placeholder="Email" value="'.$row['tEmail'].'"></td>
                    </tr>
                    
                    <tr>
                    <td>Course </td>
                    <td><input class="user-input" id="course" type="text" name="course" placeholder="Course (Eg. EIE4432)" value="'.$row['tCourse'].'"></td>
                    </tr>
                </table>
                <input style="margin-top: 30px" type="submit" class="user-input">
            </div>';
            }
        ?>
    </body>
</html>