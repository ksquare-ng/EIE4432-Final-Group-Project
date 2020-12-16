<html>
<head>
    <title> Home </title>
    <link rel = "stylesheet" href = "../style/sidebar.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<input type = "checkbox" id = "check">
<label for = "check">
    <i class = "fas fa-bars" id = "btn"></i>
    <i class = "fas fa-times" id = "cancel"></i>
</label>
    <div class = "sidebar">
        <header> Sidebar </header>
        <ul>
                <li><a href = "../pages/home-page.php"><i class = "fas fa-qrcode"></i>Home</a></li>
                <li><a href = "../pages/teacher-exams.html"><i class = "fas fa-stream"></i>Exams</a></li>
                <li><a href = "../pages/questionsTeacher.html"><i class = "fas fa-stream"></i>Questions</a></li>
                <li><a href = "#"><i class = "fas fa-chalkboard-teacher"></i>Grades</a></li>
                <li><a href = "../pages/profile-setting.php"><i class="fas fa-user-cog"></i>Profile</a></li>
                <li><a href = "../pages/login.html" onclick="logout()"><i class = "fas fa-power-off"></i>Logout</a></li>
        </ul>
    </div>
    <section> 
        <div class = "header">Exams statistics</div>
        <div class = "info"> Exam chosen: 
            <? 
             include 'config.php';
             $exams = $_POST['Exams'];
             print $exams;
             mysqli_close($conn); 
            ?>
                <div> 
                <table class = "content-table">
                <thead>
                    <tr>
                    <?
                        include 'config.php';
                        $exams = $_POST['Exams'];
                        $query = "SELECT MAX(Answers.studScore) as Maximum FROM Answers WHERE Answers.examID = $exams";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            echo mysqli_error($conn);
                        }
                        if (mysqli_num_rows($result) == 0) {
                            print "No answers found";
                        }else { 
                            print "<th>Maximum</th>";
                            print "</tr>";
                            print "</thead>";
                            print "<tbody>";
                            while( $row = mysqli_fetch_assoc($result) ){
                                print "<tr><td>". $row['Maximum']. "</td></tr>";		
                            }
                            print "</tbody>";				
                        }
                        mysqli_close($conn); 
                        
                    ?>
                    </div>
                    <div>
                    <table class = "content-table">
                            <thead>
                            <tr>
                     <?
                        include 'config.php';
                        $exams = $_POST['Exams'];
                        $query = "SELECT MIN(Answers.studScore) as Min FROM Answers WHERE Answers.examID = $exams";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            echo mysqli_error($conn);
                        }
                        if (mysqli_num_rows($result) == 0) {
                            print "No answers found";
                        }else { 
                            print "<th>Minimum</th>";
                            print "</tr>";
                            print "</thead>";
                            print "<tbody>";
                            while( $row = mysqli_fetch_assoc($result) ){
                                print "<tr><td>". $row['Min']. "</td></tr>";		
                            }
                            print "</tbody>";				
                        }
                        mysqli_close($conn); 
                        
                    ?>
                    </div>
                    <div>
                        <table class = "content-table">
                            <thead>
                            <tr>
                    <?
                        include 'config.php';
                        $exams = $_POST['Exams'];
                        $query = "SELECT AVG(Answers.studScore) as Avg FROM Answers WHERE Answers.examID = $exams";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            echo mysqli_error($conn);
                        }
                        if (mysqli_num_rows($result) == 0) {
                            print "No answers found";
                        }else { 
                            print "<th>Average</th>";
                            print "</tr>";
                            print "</thead>";
                            print "<tbody>";
                            while( $row = mysqli_fetch_assoc($result) ){
                                print "<tr><td>". $row['Avg']. "</td></tr>";		
                            }
                            print "</tbody>";				
                        }
                        mysqli_close($conn); 
                        
                    ?>
                    </table>
                </div>
                <div>
                <table class = "content-table">
                            <thead>
                            <tr>
                    <?
                    include 'config.php';
                    $exams = $_POST['Exams'];
                    $query = "SELECT Questions.qID, Questions.question, Answers.studScore FROM Answers, Questions WHERE Questions.qID = Answers.questionID GROUP BY qID";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        echo mysqli_error($conn);
                    }
                    if (mysqli_num_rows($result) == 0) {
                        print "No answers found";
                    }else { 
                        print "<th>QuestionID</th><th>Content</th><th>Average Student Score</th>";
                        print "</tr>";
                        print "</thead>";
                        print "<tbody>";
                        while( $row = mysqli_fetch_assoc($result) ){
                            print "<tr><td>". $row['qID']. "</td><td>" . $row['question'] . "</td><td>" . $row['studScore'] . "</td></tr>";		
                        }
                        print "</tbody>";				
                    }
                    mysqli_close($conn); 
                    ?>
                    </table>
                </div>
    </div>
</section>

</body>
</html>
