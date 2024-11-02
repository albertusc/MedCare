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

    $getRoomsQuery = "SELECT name, totalRoom FROM orders WHERE email = ?";
    $stmt = $conn->prepare($getRoomsQuery);

    if (!$stmt) {
        echo json_encode(['success' => 0, 'message' => 'Error in preparing the statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $roomList = [];

        while ($row = $result->fetch_assoc()) {
            $roomList[] = $row;
        }

        echo json_encode(['success' => 1, 'rooms' => $roomList]);
    } else {
        echo json_encode(['success' => 0, 'message' => 'Error fetching ordered rooms: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => 0, 'message' => 'Invalid request method']);
}
?>
