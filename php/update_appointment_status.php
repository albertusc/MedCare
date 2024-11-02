<?php

include 'conn.php'; 

header('Content-Type: application/json');

function getDatabaseConnection() {
    global $conn; 
    return $conn;
}

$conn = getDatabaseConnection();

if (!$conn || $conn->connect_error) {
    echo json_encode(['success' => 0, 'message' => 'Error connecting to the database: ' . $conn->connect_error]);
    exit;
}

if (!isset($_POST['appointmentId']) || !isset($_POST['status'])) {
    echo json_encode(['success' => 0, 'message' => 'Invalid parameters']);
    exit;
}

$appointmentId = $_POST['appointmentId'];
$status = $_POST['status'];

$updateStatusQuery = "UPDATE appointments SET status = ? WHERE id = ?";
$stmt = $conn->prepare($updateStatusQuery);

if (!$stmt) {
    echo json_encode(['success' => 0, 'message' => 'Error preparing statement: ' . $conn->error]);
    exit;
}

$stmt->bind_param('si', $status, $appointmentId);
$result = $stmt->execute();

if (!$result) {
    echo json_encode(['success' => 0, 'message' => 'Error updating status: ' . $stmt->error]);
    exit;
}

echo json_encode(['success' => 1, 'message' => 'Status updated successfully']);

$stmt->close();
$conn->close();
?>
