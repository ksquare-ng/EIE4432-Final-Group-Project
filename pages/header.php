<head>
    <title>PolyU Exam | Home</title>
    <link rel="stylesheet" type="text/css" href="../style/main-style.css">
    <script type="text/javascript" src="../script/main-page.js"></script>
    <link rel = "stylesheet" href = "../style/sidebar.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<div>
        <input type = "checkbox" id = "check">
        <label for = "check">
        <i class = "fas fa-bars" id = "btn"></i>
        <i class = "fas fa-times" id = "cancel"></i>
        </label>
        <div class = "sidebar">
            <header> Sidebar </header>
            <ul>
                <li><a href = "home-page.php" class="active"><i class = "fas fa-qrcode active"></i>Dashboard</a></li>
                <li><a href = "#"><i class = "fas fa-stream"></i>Exams</a></li>
                <li><a href = "#"><i class = "fas fa-chalkboard-teacher"></i>Grades</a></li>
                <li><a href = "profile-setting.php"><i class="fas fa-user-cog"></i>Profile</a></li>
                <li><a href = "../login.html" onclick="logout()"><i class = "fas fa-power-off"></i>Logout</a></li>
            </ul>
        </div>  
    </div>
</body>