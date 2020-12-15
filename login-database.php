<?php
    $server = "localhost";
    $user = "";
    $pw = "";
    $db = "";

    $connect = mysqli_connect($server, $user, $pw, $db);
    if (!$connect) {
        die("Connection failed: " .mysqli_connect_error());
    }
?>