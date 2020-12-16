<!DOCTYPE html>
<?php
    require "../query/login-database.php";
    $username = $_COOKIE["username"];
    $exam = $_COOKIE["exam"];

    $query = "SELECT eName FROM EXAMS WHERE eID = '$exam'";
    $result = mysqli_query($connect, $query);
    $examName = mysqli_fetch_assoc($result)['eName'];

    $query = "SELECT * FROM ANSWERS A LEFT JOIN QUESTIONS Q ON (A.questionID = Q.qID) WHERE Q.examID = '$exam'";
    $result = mysqli_query($connect, $query);

    $query = "SELECT SUM(studScore) FROM ANSWERS A LEFT JOIN QUESTIONS Q ON (A.questionID = Q.qID) WHERE Q.examID = '$exam'";
    $result1 = mysqli_query($connect, $query);
    $totalScore = mysqli_fetch_assoc($result1);
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
        <h2>Viewing <?php echo $examName; ?> </h2>
        </div>
        <div class="sub-content" style="text-align: left; padding-left: 100px;">
            <table class="user-info" style="font-size:20px;">
            <?php
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>".$count.") ".$row['question'];
                    echo "\t(Score: ".$row['studScore']."/".$row['qScore'].")<br>";
                    if ($row['opt1'] != '') {
                        echo "<input type='radio' value='".$row['opt1']."' disabled>";
                        echo "<label for='".$row['opt1']."'>".$row['opt1']."</label><br>";
                    }
                    if ($row['opt2'] != '') {
                        echo "<input type='radio' value='".$row['opt2']."' disabled>";
                        echo "<label for='".$row['opt2']."'>".$row['opt2']."</label><br>";
                    }
                    if ($row['opt3'] != '') {
                        echo "<input type='radio' value='".$row['opt3']."' disabled>";
                        echo "<label for='".$row['opt3']."'>".$row['opt3']."</label><br>";
                    }
                    if ($row['opt4'] != '') {
                        echo "<input type='radio' value='".$row['opt4']."' disabled>";
                        echo "<label for='".$row['opt4']."'>".$row['opt4']."</label><br>";
                    }
                    echo "<p>Your Answer: ".$row['studAns']."\tCorrect Answer: ".$row['qAnswer']."</p>";
                    echo "<br></td></tr>";
                    $count++;
                }
                if ($count != 1) echo "<tr><td>Total Score: <?php echo ".$totalScore['SUM(studScore)'].";?></td></tr>";
            ?>
            </table>
        </div>
    </body>
</html>