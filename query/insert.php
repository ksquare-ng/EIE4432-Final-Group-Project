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
        <div class = "header">Create your questions for exams here!</div>
        <div class = "info"> 
        <?php
            include "config.php";

            $question = $_POST['question'];
            $qType = $_POST['qType'];
            $qAnswer = $_POST['qAnswer'];
            $option1 = $_POST['option1'];
            $option2 = $_POST['option2'];
            $option3= $_POST['option3'];
            $option4 = $_POST['option4'];
            $score = $_POST['score'];
            $examID = $_POST['ExamID'];
            $tID= $_POST['tID'];

            $userQuery = "INSERT INTO Questions (question, qType, qAnswer, opt1, opt2, opt3, opt4, qScore, examID, tID) 
            VALUES ('$question', '$qType', '$qAnswer', '$option1', '$option2', '$option3', '$option4', '$score', '$examID', '$tID')";
            $result = mysqli_query($conn, $userQuery);
            if(!$result) {
                die("Could not successfully update the table. PLease, try again" );
            } else {print("	<h3>A new question record is added successfully!</h3>");
            }

            mysqli_close($conn);
        ?>
        </div>
    </section>

</body>
</html>
