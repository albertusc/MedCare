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

$selectRoomsQuery = "SELECT * FROM orders";
$result = $conn->query($selectRoomsQuery);

if (!$result) {
    echo json_encode(['success' => 0, 'message' => 'Error executing query: ' . $conn->error]);
    exit;
}

$rooms = [];

while ($row = $result->fetch_assoc()) {
    $rooms[] = $row;
}

echo json_encode(['success' => 1, 'rooms' => $rooms]);

$conn->close();

?>
