<!DOCTYPE html>
<?php
    require "../query/login-database.php";
    $username = $_COOKIE["username"];
    $exam = $_POST["take-exam"];
    setcookie("exam", $exam, time()+10800, '/');

    $query = "SELECT * FROM EXAMS WHERE eID = '$exam'";
    $result = mysqli_query($connect, $query);
    $curExam = mysqli_fetch_assoc($result);

    $query = "SELECT * FROM ANSWERS A LEFT JOIN QUESTIONS Q ON (A.questionID = Q.qID) WHERE A.studentID = '$username'";
    $result = mysqli_query($connect, $query);
    $flag = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) != 0) echo '<script>
    window.location.href = "check-exam.php?exam='.$exam.'";
    </script>';

    $today = new DateTime(date("Y-m-d H:i:s"));
    $currE = new DateTime($curExam['eDate'].' '.$curExam['eFinish']);
    if ($today >= $currE) echo '<script>
    window.location.href = "check-exam.php";
    </script>';

    $query = "SELECT * FROM QUESTIONS WHERE examID = '$exam' ORDER BY RAND()";
    $result = mysqli_query($connect, $query);
?>

<html>
    <head>
        <title>PolyU Exam | Exam</title>
        <link rel="stylesheet" type="text/css" href="../style/main-style.css">
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
                    <li><a href = "student-exam-list.php" class="active"><i class = "fas fa-stream"></i>Exams</a></li>
                    <li><a href = "profile-setting.php"><i class="fas fa-user-cog"></i>Profile</a></li>
                    <li><a href = "../login.html" onclick="logout()"><i class = "fas fa-power-off"></i>Logout</a></li>
                </ul>
            </div>  
        </div>
        <div class="welcome-message">
        <h2>Taking <?php echo $curExam['eName']."!"; ?></h2>
        </div>
        <div class="sub-content" style="text-align: left; padding-left: 100px;">
            <form action="../query/submit-answer.php" method="POST">
            <table class="user-info" style="font-size:20px;">
            <?php
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>".$count.") ".$row['question']."<br>";
                    if ($row['opt1'] != '') {
                        echo "<input type='radio' name='".$row['qID']."' value='".$row['opt1']."'>";
                        echo "<label for='".$row['opt1']."'>".$row['opt1']."</label><br>";
                    }
                    if ($row['opt2'] != '') {
                        echo "<input type='radio' name='".$row['qID']."' value='".$row['opt2']."'>";
                        echo "<label for='".$row['opt2']."'>".$row['opt2']."</label><br>";
                    }
                    if ($row['opt3'] != '') {
                        echo "<input type='radio' name='".$row['qID']."' value='".$row['opt3']."'>";
                        echo "<label for='".$row['opt3']."'>".$row['opt3']."</label><br>";
                    }
                    if ($row['opt4'] != '') {
                        echo "<input type='radio' name='".$row['qID']."' value='".$row['opt4']."'>";
                        echo "<label for='".$row['opt4']."'>".$row['opt4']."</label><br>";
                    }
                    echo "</td></tr>";
                    $count++;
                }
            ?>
            <tr>
                <td><input type='submit' value='Submit Answer'></td>
            </tr>
            </table>
        </div>
    </body>
</html>