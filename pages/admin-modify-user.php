<!DOCTYPE html>
<?php
    require "../query/login-database.php";
    $username = $_GET["username"];
    $role = $_GET["role"];

    if ($role == "student") $query = "SELECT * FROM STUDENTS WHERE sUsername = '$username'";
    else if ($role == "teacher") $query = "SELECT * FROM TEACHERS WHERE tUsername = '$username'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
?>

<html>
    <head>
        <title>PolyU Exam | Add User</title>
        <link rel="stylesheet" type="text/css" href="../style/main-style.css">
        <script type="text/javascript" src="../script/admin.js"></script>
        <script type="text/javascript" src="../script/main-page.js"></script>
        <link rel = "stylesheet" href = "../style/sidebar.css">
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    </head>
    <body>
        <div class = "sidebar">
            <header> Sidebar </header>
            <ul>
                <li><a href = "home-page-admin.php"><i class = "fas fa-qrcode"></i>Dashboard</a></li>
                <li><a href = "admin-add-user.php"><i class="fas fa-user-plus"></i>Add User</a></li>
                <li><a href = "../login.html" onclick="logout()"><i class = "fas fa-power-off"></i>Logout</a></li>
            </ul>
        </div>

        <div class="welcome-message">
            <h2>Modify User</h2>
        </div>

        <?php
            if ($role == "student") {
                echo 
                '<form id="modify-student" action="../query/modify-student.php" method="POST">
                <div class="add-content">
                <table id="user-info">
                    <tr>
                        <td>Old Username</td>
                        <td>
                            <input class="user-input" type="text" id ="old-username" name="oldUsername" value="'.$row['sUsername'].'" readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td>New Username</td>
                        <td>
                            <input class="user-input" type="text" id ="username" name="username" placeholder="Username" value="'.$row['sUsername'].'">
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input class="user-input" type="text" id ="password" name="password" placeholder="Password (8 Characters)" value="'.$row['sPassword'].'">
                        </td>
                    </tr>
                    <tr>
                        <td>Profile</td>
                        <td><input style="width: 200px" type="file" id="image" name="image" value="Upload Image" accept="image/*" value="'.$row['sIMG'].'"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                        <input class="user-input" type="text" id ="last-name" name="last-name" placeholder="Last Name" value="'.$row['sLast'].'">
                        <input class="user-input" type="text" id ="first-name" name="first-name" placeholder="First Name" value="'.$row['sFirst'].'">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input class="user-input" type="text" id="email" name="email" placeholder="Email" value="'.$row['sEmail'].'"></td>
                    </tr>';
                    if ($row['sGender'] == 'male') {
                        echo '<tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" name="gender" value="male" checked="checked">
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female">
                            <label for="female">Female</label>
                        </td>
                        </tr>';
                    }
                    else if ($row['sGender'] == 'female') {
                        echo '<tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" name="gender" value="male">
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female" checked="checked">
                            <label for="female">Female</label>
                        </td>
                        </tr>';
                    }  
                    echo '<tr>
                        <td>Birthday </td>
                        <td><input class="user-input" id="birthday" type="date" name="birthday" value="'.$row['sBday'].'"></td>
                    </tr>
                </table>
                <div style="text-align:center;"><input style="margin-top: 30px; width: 390px;" type="button" onclick="checkErrorStudent()" class="user-input" value="Submit"></div>
                </form>
            </div>';
            }
            else if ($role == "teacher") {
                echo 
                '<form id="modify-teacher" action="../query/modify-teacher.php" method="POST">
                <div class="add-content">
                <table id="user-info">
                    <tr>
                        <td>Old Username</td>
                        <td>
                            <input class="user-input" type="text" id ="old-username" name="oldUsername" value="'.$row['tUsername'].'" readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td>New Username</td>
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
                <div style="text-align:center;"><input style="margin-top: 30px; width: 390px;" type="button" onclick="checkErrorTeacher()" class="user-input" value="Submit"></div>
                </form>
            </div>';
            }
        ?>
    </body>
</html>