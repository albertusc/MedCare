<?php

include 'conn.php';
header('Content-Type: application/json');

function getDatabaseConnection() {
    global $conn;
    return $conn;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    if (empty($email)) {
        echo json_encode(['success' => 0, 'message' => 'Invalid input']);
        exit;
    }

    $conn = getDatabaseConnection();

    if (!$conn || $conn->connect_error) {
        echo json_encode(['success' => 0, 'message' => 'Error connecting to the database: ' . $conn->connect_error]);
        exit;
    }

    $deleteAppointmentQuery = "DELETE FROM appointments WHERE email = ?";
    $stmt = $conn->prepare($deleteAppointmentQuery);

    if (!$stmt) {
        echo json_encode(['success' => 0, 'message' => 'Error in preparing the statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("s", $email); // Bind parameter

    if ($stmt->execute()) {
        echo json_encode(['success' => 1, 'message' => 'Appointment deleted successfully']);
    } else {
        echo json_encode(['success' => 0, 'message' => 'Error deleting appointment: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => 0, 'message' => 'Invalid request method']);
}
?>
