<?php

require_once 'conn.php';

header('Content-Type: application/json'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    error_log("Received Login Data - Email: $email, Password: $password");

    $checkEmailQuery = "SELECT * FROM users WHERE Email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        $user = mysqli_fetch_assoc($checkEmailResult);
        $hashedPassword = $user['Password'];

        if (password_verify($password, $hashedPassword)) {
            $response["success"] = 1;
            $response["message"] = "Login successful";
            echo json_encode($response);
        } else {
            $response["success"] = 0;
            $response["message"] = "Incorrect password";
            echo json_encode($response);
        }
    } else {
        $response["success"] = 0;
        $response["message"] = "Email not registered";
        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Invalid request";
    echo json_encode($response);
}

$conn->close();

?>
