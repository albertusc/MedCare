<?php
    $host = "localhost"; 
    $username = "root";
    $password = ""; 
    $database = "medcare"; 
    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_error());
    }

    $db_selected = mysqli_select_db($conn, $database);

    if (!$db_selected) {
        die ("Cannot use database $database : " . mysqli_error());
    }
?>
