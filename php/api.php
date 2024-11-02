<?php

include 'conn.php'; 

header('Content-Type: application/json');

function getDatabaseConnection() {
    global $conn; 
    return $conn;
}

$userEmail = isset($_GET['email']) ? $_GET['email'] : '';

if (empty($userEmail)) {
    echo json_encode(['success' => 0, 'message' => 'Email parameter is missing']);
    exit;
}

$conn = getDatabaseConnection();

if (!$conn || $conn->connect_error) {
    echo json_encode(['success' => 0, 'message' => 'Error connecting to the database: ' . $conn->connect_error]);
    exit;
}

$selectHistoryQuery = "SELECT _id, title, description FROM history WHERE email = ?";
$stmt = $conn->prepare($selectHistoryQuery);

if (!$stmt) {
    echo json_encode(['success' => 0, 'message' => 'Error in preparing the statement: ' . $conn->error]);
    exit;
}

$stmt->bind_param("s", $userEmail);
$stmt->execute();

$result = $stmt->get_result();

$historyData = array();

while ($row = $result->fetch_assoc()) {
    $historyData[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode(['success' => 1, 'history' => $historyData]);
?>
