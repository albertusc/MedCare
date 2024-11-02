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

$selectAppointmentsQuery = "SELECT * FROM appointments";
$result = $conn->query($selectAppointmentsQuery);

if (!$result) {
    echo json_encode(['success' => 0, 'message' => 'Error executing query: ' . $conn->error]);
    exit;
}

$appointments = [];

while ($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}

if (empty($appointments)) {
    echo json_encode(['success' => 0, 'message' => 'No appointments found']);
} else {
    echo json_encode(['success' => 1, 'appointments' => $appointments]);
}

$conn->close();
?>
