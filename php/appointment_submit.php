<?php

include 'conn.php';
header('Content-Type: application/json');

function getDatabaseConnection() {
    global $conn;
    return $conn;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $status = $_POST['status']; 

    if (empty($name) || empty($date) || empty($email) || empty($status)) {
        echo json_encode(['success' => 0, 'message' => 'Invalid input']);
        exit;
    }

    $conn = getDatabaseConnection();

    if (!$conn || $conn->connect_error) {
        echo json_encode(['success' => 0, 'message' => 'Error connecting to the database: ' . $conn->connect_error]);
        exit;
    }

    $checkExistingAppointmentQuery = "SELECT id FROM appointments WHERE email = ?";
    $checkStmt = $conn->prepare($checkExistingAppointmentQuery);

    if (!$checkStmt) {
        echo json_encode(['success' => 0, 'message' => 'Error in preparing the statement: ' . $conn->error]);
        exit;
    }

    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo json_encode(['success' => 0, 'message' => 'User already has an appointment']);
        exit;
    }

    $checkStmt->close();

    $insertAppointmentQuery = "INSERT INTO appointments (name, date, email, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertAppointmentQuery);

    if (!$stmt) {
        echo json_encode(['success' => 0, 'message' => 'Error in preparing the statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("ssss", $name, $date, $email, $status);

    if ($stmt->execute()) {
        echo json_encode(['success' => 1, 'message' => 'Appointment submitted successfully']);
    } else {
        echo json_encode(['success' => 0, 'message' => 'Error submitting appointment: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => 0, 'message' => 'Invalid request method']);
}
?>
