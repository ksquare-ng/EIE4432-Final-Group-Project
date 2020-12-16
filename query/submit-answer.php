<?php
    require "login-database.php";

    $exam = $_COOKIE['exam'];
    $username = $_COOKIE['username'];
    $question = array();

    $query = "SELECT qID, qAnswer, qScore FROM QUESTIONS WHERE examID = '$exam'";
    $result = mysqli_query($connect, $query);
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $question[$count] = $row['qID'];
        $answer[$count] = $row['qAnswer'];
        $score[$count] = $row['qScore'];
        $count++;
    }

    for ($i = 0; $i < count($question); $i++) {
        $studentAns = $_POST[$question[$i]];
        if ($studentAns == $answer[$i]) {
            $query = "INSERT INTO ANSWERS (studentID, questionID, studAns, studScore, examID) VALUES ('$username', '$question[$i]', '$studentAns', '$score[$i]', $exam)";
            mysqli_query($connect, $query);
        }
        else if ($studentAns != $answer[$i]) {
            $query = "INSERT INTO ANSWERS (studentID, questionID, studAns, studScore, examID) VALUES ('$username', '$question[$i]', '$studentAns', '0', $exam)";
            mysqli_query($connect, $query); 
        } 
    }
    echo '<script>alert("Submitted!")
    window.location.href = "../pages/home-page.php";
    </script>';

    setcookie("exam", "", time()-1800, "/");
    mysqli_close($connect);
?>