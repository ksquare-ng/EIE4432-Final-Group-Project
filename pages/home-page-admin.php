<!DOCTYPE html>
<head>
    <title>PolyU Exam | Home</title>
    <link rel="stylesheet" type="text/css" href="../style/main-style.css">
    <script type="text/javascript" src="../script/admin.js"></script>
        <script type="text/javascript" src="../script/main-page.js"></script>
    <link rel = "stylesheet" href = "../style/sidebar.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<div>
    <div class = "sidebar">
        <header> Sidebar </header>
        <ul>
            <li><a href = "home-page.php" class="active"><i class = "fas fa-qrcode"></i>Dashboard</a></li>
            <li><a href = "admin-add-user.php"><i class="fas fa-user-plus"></i>Add User</a></li>
            <li><a href = "../login.html" onclick="logout()"><i class = "fas fa-power-off"></i>Logout</a></li>
        </ul>
    </div>  
</div>

<div class="welcome-message">
    <h2>Search users</h2>
</div>

<div class="sub-content">
    <table>
        <tr>
            <td>Name</td>
            <td><input class="user-input" type="text" id="name"></td>
            <td>Role</td>
            <td>
                <select class="user-input" name="identity" id="identity">
                    <option value=""></option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                    
                </select>
            </td>
            <td>
                <input class="user-input" type="button" value="Search" onclick="filter()">
            </td>
        </tr>
    </table>
</div>

<div class="main-content" id="user-info"><p>Press search to display users.</p>
</div>