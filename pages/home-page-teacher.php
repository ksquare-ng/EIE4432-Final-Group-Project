<?php
    include "../query/login-database.php";
    $query = "SELECT * FROM EXAMS E ORDER BY E.eDate, E.eStart DESC LIMIT 5";
    $results = mysqli_query($connect, $query);
?>

<div>
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

<div class="welcome-message">
    <h2>Welcome <?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']."!";?></h2>
</div>

<div class="main-content">
    <h2>Recent Exam</h2><br>
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
            while ($row = mysqli_fetch_assoc($results)) {
                echo 
                    "<tr>
                        <td>".$row['eName']."</td>;
                        <td>".$row['eCourse']."</td>;
                        <td>".$row['eDate']."</td>;
                        <td>".$row['eStart']."</td>;
                        <td>".$row['eFinish']."</td>;
                        <td><input type='button' value='Enter'></td>;
                    </tr>";
            }
            
            mysqli_close($connect);
        ?>
    </table>
</div>