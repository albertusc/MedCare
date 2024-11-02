<?php

include 'conn.php';
header('Content-Type: application/json');

function getDatabaseConnection() {
    global $conn; 
    return $conn;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $email = $_POST['email'];

    if (empty($title) || empty($description) || empty($email)) {
        echo json_encode(['success' => 0, 'message' => 'Invalid input']);
        exit;
    }

    $conn = getDatabaseConnection();

    if (!$conn || $conn->connect_error) {
        echo json_encode(['success' => 0, 'message' => 'Error connecting to the database: ' . $conn->connect_error]);
        exit;
    }

    $insertHistoryQuery = "INSERT INTO history (title, description, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertHistoryQuery);

    if (!$stmt) {
        echo json_encode(['success' => 0, 'message' => 'Error in preparing the statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("sss", $title, $description, $email);

    if ($stmt->execute()) {
        echo json_encode(['success' => 1, 'message' => 'History entry submitted successfully']);
    } else {
        echo json_encode(['success' => 0, 'message' => 'Error submitting history entry: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => 0, 'message' => 'Invalid request method']);
}
?>
