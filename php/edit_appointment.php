<?php
header('Content-type:application/json;charset=utf-8');
include "conn.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['date'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $date = $_POST['date'];

    error_log("Email: $email, Name: $name, Date: $date");

    $q = mysqli_query($conn, "UPDATE appointments SET name='$name', date='$date' WHERE email='$email'");
    $response = array();

    if ($q) {
        $response["success"] = 1;
        $response["message"] = "Data berhasil diupdate";
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Data gagal diupdate: " . mysqli_error($conn);
        error_log("Update error: " . mysqli_error($conn)); // Add this line for additional logging
        echo json_encode($response);
    }
} else {
    $response["success"] = -1;
    $response["message"] = "Data kosong";
    echo json_encode($response);
}
?>
