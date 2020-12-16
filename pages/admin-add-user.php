<!DOCTYPE html>
<head>
    <title>PolyU Exam | Add User</title>
    <link rel="stylesheet" type="text/css" href="../style/main-style.css">
    <script type="text/javascript" src="../script/admin.js"></script>
    <script type="text/javascript" src="../script/login.js"></script>
    <link rel = "stylesheet" href = "../style/sidebar.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<div>
    <div class = "sidebar">
        <header> Sidebar </header>
        <ul>
            <li><a href = "home-page-admin.php"><i class = "fas fa-qrcode"></i>Dashboard</a></li>
            <li><a href = "admin-add-user.php" class="active"><i class="fas fa-user-plus"></i>Add User</a></li>
            <li><a href = "../login.html" onclick="logout()"><i class = "fas fa-power-off"></i>Logout</a></li>
        </ul>
    </div>  
</div>

<div class="welcome-message">
    <h2>Add users</h2>
</div>

<div class="add-content">
<form id="user-info" action="../query/new-user.php" method="POST">
        <table id="user-info-table">
            <tr>
                <td>Username</td>
                <td>
                    <input class="user-input" type="text" id ="username" name="username" placeholder="Username">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input class="user-input" type="text" id ="password" name="password" placeholder="Password (8 Characters)">
                </td>
            </tr>
            <tr>
                <td>Profile</td>
                <td>
                    <input style="width: 200px" type="file" id="image" name="image" value="Upload Image" accept="image/*">
                </td>
            </tr>
            <tr>
                <td>Name </td>
                <td>
                    <input class="user-input" type="text" id ="last-name" name="last-name" placeholder="Last Name"><br>
                    <input class="user-input" type="text" id ="first-name" name="first-name" placeholder="First Name">
                </td>
            </tr>
            <tr>
                <td>Email </td>
                <td><input class="user-input" type="text" id="email" name="email" placeholder="Email"></td>
            </tr>
            <tr>
                <td>Identity </td>
                <td>
                    <input type="radio" name="role" value="student" onclick="selectRole()">
                    <label for="student">Student</label>
                    <input type="radio" name="role" value="teacher" onclick="selectRole()">
                    <label for="teacher">Teacher</label>
                </td>
            </tr>
            <tr class="select-student" style="display: none;">
                <td>Gender </td>
                <td>
                    <input type="radio" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" value="female">
                    <label for="female">Female</label>
                </td>
            </tr>
            <tr class="select-student" style="display: none;">
                <td>Birthday </td>
                <td><input class="user-input" id="birthday" type="date" name="birthday"></td>
            </tr>
            <tr class="select-teacher" style="display: none;">
                <td>Course </td>
                <td><input class="user-input" id="course" type="text" name="course" placeholder="Course (Eg. EIE4432)"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><input class="user-input" width="100px" type="button" value="Create User" onclick="checkError()"></td>
            </tr>
        </table>
    </form>
</div>