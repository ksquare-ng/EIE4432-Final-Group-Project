<?php 
include 'config.php';

// sql to create table
$sql4 = "CREATE TABLE Students (
    studID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    sFirst VARCHAR(30) NOT NULL,
    sLast VARCHAR(30) NOT NULL,
    sEmail VARCHAR(30) NOT NULL,
    sGender VARCHAR(30) NOT NULL,
    sBday DATE,
    sIMG LONGBLOB
    )";
    
    if (mysqli_query($conn, $sql4)) {
      echo "Table Students created successfully";
    } else {
      echo "Error creating table: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>

<?php 
include 'config.php';

// sql to create table
$sql5 = "CREATE TABLE Teachers (
    teachID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
    tFirst VARCHAR(30) NOT NULL,
    tLast VARCHAR(30) NOT NULL,
    tEmail VARCHAR(30) NOT NULL,
    tCourse VARCHAR (30) NOT NULL,
    sIMG LONGBLOB
    )";
    
    if (mysqli_query($conn, $sql5)) {
      echo "Table Teachers created successfully";
    } else {
      echo "Error creating table: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>

<?php 
include 'config.php';

// sql to create table
$sql1 = "CREATE TABLE Questions (
    qID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    question VARCHAR(50) NOT NULL,
    qType VARCHAR(30) NOT NULL,
    qAnswer VARCHAR(50) NOT NULL,
    qScore VARCHAR(50) NOT NULL,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    tID INT (6) UNSIGNED,
    FOREIGN KEY (tID) REFERENCES Teachers (teachID) ON UPDATE CASCADE
    )";
    
    if (mysqli_query($conn, $sql1)) {
      echo "Table Questions created successfully";
    } else {
      echo "Error creating table: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>

<?php 
include 'config.php';

// sql to create table
$sql3 = "CREATE TABLE Exams (
    eID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    eName VARCHAR (50) NOT NULL,
    eCourse VARCHAR(50) NOT NULL,
    eDate DATE,
    eStart TIME,
    eFinish TIME,
    quesID INT(6) UNSIGNED,
    FOREIGN KEY (quesID) REFERENCES Questions (qID) ON DELETE CASCADE ON UPDATE CASCADE
    )";
    
    if (mysqli_query($conn, $sql3)) {
      echo "Table Exams created successfully";
    } else {
      echo "Error creating table: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>

<?php 
include 'config.php';

// sql to create table
$sql3 = "CREATE TABLE Answers (
    studentID INT(6) UNSIGNED,
    questionID INT(6) UNSIGNED,
    studAns VARCHAR (50),
    studScore INT (10),
    examID INT UNSIGNED,
    FOREIGN KEY (examID) REFERENCES Exams (eID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (studentID) REFERENCES Students (studID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (questionID)  REFERENCES Questions (qID) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (studentID, questionID) 
    )";
    
    if (mysqli_query($conn, $sql3)) {
      echo "Table Answers created successfully";
    } else {
      echo "Error creating table: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>
