<?php
    require "login-database.php";

    $name = $_GET['name'];
    $identity = $_GET['identity'];

    $query = '';
    $query1 = '';

    if ($name == '' && $identity == '') {
        $query = "SELECT sUsername, sLast, sFirst, sEmail FROM STUDENTS";
        $query1 = "SELECT tUsername, tLast, tFirst, tEmail FROM TEACHERS";
    }
    else if ($name == '' && $identity == 'student') $query = "SELECT sUsername, sLast, sFirst, sEmail FROM STUDENTS";
    else if ($name == '' && $identity == 'teacher') $query1 = "SELECT tUsername, tLast, tFirst, tEmail FROM TEACHERS";
    else if ($name != '' && $identity == '') {
        $query = "SELECT sUsername, sLast, sFirst, sEmail FROM STUDENTS WHERE CONCAT(sLast, ' ', sFirst) LIKE" . "'%" . $name . "%'";
        $query1 = "SELECT tUsername, tLast, tFirst, tEmail FROM TEACHERS WHERE CONCAT(tLast, ' ', tFirst) LIKE" . "'%" . $name . "%'";
    }
    else if ($name != '' && $identity == 'student') $query = "SELECT sUsername, sLast, sFirst, sEmail FROM STUDENTS WHERE CONCAT(sLast, ' ', sFirst) LIKE" . "'%" . $name . "%'";
    else if ($name != '' && $identity == 'teacher') $query1 = "SELECT tUsername, tLast, tFirst, tEmail FROM TEACHERS WHERE CONCAT(tLast, ' ', tFirst) LIKE" . "'%" . $name . "%'";

    echo "<table>";
    echo "<tr><th>Username</th><th>Last Name</th><th>First Name</th><th>Email</th><th>Action</th></tr>";
    
    if ($query != '') {
        $results = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($results)) {
            echo "<tr>
            <td>".$row['sUsername']."</td>
            <td>".$row['sLast']."</td>
            <td>".$row['sFirst']."</td>
            <td>".$row['sEmail']."</td>
            <td><button value='".$row['sUsername']."' onclick='modifyStudent(this)'>Modify</button>
            <button value='".$row['sUsername']."' onclick='removeStudent(this)'>Remove</button></td></tr>";
        }
    }
    if ($query1 != '') {
        $results = mysqli_query($connect, $query1);
        while ($row = mysqli_fetch_assoc($results)) {
            echo "<tr>
            <td>".$row['tUsername']."</td>
            <td>".$row['tLast']."</td>
            <td>".$row['tFirst']."</td>
            <td>".$row['tEmail']."</td>
            <td><button value='".$row['tUsername']."' onclick='modifyTeacher(this)'>Modify</button>
            <button value='".$row['tUsername']."' onclick='removeTeacher(this)'>Remove</button></td></tr>";
        }
    }
    echo "</table>";
    mysqli_close($connect);
?>