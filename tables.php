<?php 
include 'config.php';

// sql to create table
$sql4 = "CREATE TABLE Students (
    sUsername VARCHAR (30) NOT NULL PRIMARY KEY, 
    sPassword VARCHAR (30) NOT NULL,
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
    tUsername VARCHAR (30) NOT NULL PRIMARY KEY,
    tPassword VARCHAR (30) NOT NULL,  
    tFirst VARCHAR(30) NOT NULL,
    tLast VARCHAR(30) NOT NULL,
    tEmail VARCHAR(30) NOT NULL,
    tCourse VARCHAR (30) NOT NULL,
    tIMG LONGBLOB
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
$sql3 = "CREATE TABLE Exams (
    eID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    eName VARCHAR (50) NOT NULL,
    eCourse VARCHAR(30),
    eDate DATE,
    eStart TIME,
    eFinish TIME,
    teachID VARCHAR(30),
    FOREIGN KEY (teachID) REFERENCES Teachers (tUsername) ON DELETE CASCADE ON UPDATE CASCADE
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
$sql1 = "CREATE TABLE Questions (
    qID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    question VARCHAR(50) NOT NULL,
    qType VARCHAR(30) NOT NULL,
    qAnswer VARCHAR(50) NOT NULL,
    opt1 VARCHAR (50),
    opt2 VARCHAR (50),
    opt3 VARCHAR (50),
    opt4 VARCHAR (50),
    qScore INT(6) NOT NULL,
    tID VARCHAR (30),
    examID INT(6) UNSIGNED,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tID) REFERENCES Teachers (tUsername) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (examID) REFERENCES Exams (eID) ON UPDATE CASCADE ON DELETE CASCADE
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
$sql3 = "CREATE TABLE Answers (
    studentID VARCHAR(30),
    questionID INT(6) UNSIGNED,
    studAns VARCHAR (50),
    studScore INT (10),
    examID INT(6) UNSIGNED,
    submitTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL, 
    FOREIGN KEY (examID) REFERENCES Exams(eID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (studentID) REFERENCES Students (sUsername) ON DELETE CASCADE ON UPDATE CASCADE,
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
