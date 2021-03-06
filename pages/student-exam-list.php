<!DOCTYPE html>
<html>
<head>
    <title>PolyU Exam | Exam List</title>
    <link rel="stylesheet" type="text/css" href="../style/main-style.css">
    <script type="text/javascript" src="../script/main-page.js"></script>
    <link rel = "stylesheet" href = "../style/sidebar.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<?php
    include "../query/login-database.php";
    $query = "SELECT * FROM EXAMS E ORDER BY E.eDate ASC";
    $results = mysqli_query($connect, $query);
?>

<div>
    <div class = "sidebar">
        <header> Sidebar </header>
        <ul>
            <li><a href = "home-page.php"><i class = "fas fa-qrcode active"></i>Dashboard</a></li>
            <li><a href = "#" class="active"><i class = "fas fa-stream"></i>Exams</a></li>
            <li><a href = "profile-setting.php"><i class="fas fa-user-cog"></i>Profile</a></li>
            <li><a href = "../login.html" onclick="logout()"><i class = "fas fa-power-off"></i>Logout</a></li>
        </ul>
    </div>  
</div>


<div class="welcome-message">
    <h2>Welcome <?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']."!"; ?></h2>
</div>

<div class="main-content">
    <h2>All Exam</h2><br>
    <form action="student-exam.php" method="POST">
    <table>
        <tr>
            <th>Exam Name</th>
            <th>Course Name</th>
            <th>Exam Date</th>
            <th>Exam Start Time</th>
            <th>Exam End Time</th>
            <th>Action</th>
        </tr>
        <?php
            date_default_timezone_set('Asia/Hong_Kong');
            $today = new DateTime(date("Y-m-d H:i:s"));
            while ($row = mysqli_fetch_assoc($results)) {
                $currS = new DateTime($row['eDate'].' '.$row['eStart']);
                $currE = new DateTime($row['eDate'].' '.$row['eFinish']);
                echo 
                    "<tr>
                        <td>".$row['eName']."</td>
                        <td>".$row['eCourse']."</td>
                        <td>".$row['eDate']."</td>
                        <td>".$row['eStart']."</td>
                        <td>".$row['eFinish']."</td>";
                if ($currS <= $today) echo "<td><button type='submit' name='take-exam' value='".$row['eID']."'>Enter</button></td></tr>";
                else if ($currS > $today) echo "<td><button type='submit' name='take-exam' value='".$row['eID']."'disabled>Enter</button></td></tr>";
            }
            
            mysqli_close($connect);
        ?>
    </table>
        </form>
</div>
</body>