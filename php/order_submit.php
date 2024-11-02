<?php

include 'conn.php';
header('Content-Type: application/json');

function getDatabaseConnection() {
    global $conn;
    return $conn;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $totalRoom = $_POST['totalRoom'];
    $email = $_POST['email'];

    if (empty($name) || empty($totalRoom) || empty($email)) {
        echo json_encode(['success' => 0, 'message' => 'Invalid input']);
        exit;
    }

    $name = mysqli_real_escape_string(getDatabaseConnection(), $name);
    $totalRoom = mysqli_real_escape_string(getDatabaseConnection(), $totalRoom);
    $email = mysqli_real_escape_string(getDatabaseConnection(), $email);

    $conn = getDatabaseConnection();

    if (!$conn || $conn->connect_error) {
        echo json_encode(['success' => 0, 'message' => 'Error connecting to the database: ' . $conn->connect_error]);
        exit;
    }

    $checkOrderQuery = "SELECT COUNT(*) as count FROM orders WHERE email = ?";
    $checkStmt = $conn->prepare($checkOrderQuery);

    if (!$checkStmt) {
        echo json_encode(['success' => 0, 'message' => 'Error in preparing the statement: ' . $conn->error]);
        exit;
    }

    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    $rowCount = $checkResult->fetch_assoc()['count'];

    $checkStmt->close();

    if ($rowCount > 0) {
        echo json_encode(['success' => 0, 'message' => 'An order already exists for this email']);
        exit;
    }

    $insertOrderQuery = "INSERT INTO orders (name, totalRoom, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertOrderQuery);

    if (!$stmt) {
        echo json_encode(['success' => 0, 'message' => 'Error in preparing the statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("sss", $name, $totalRoom, $email);

    if ($stmt->execute()) {
        echo json_encode(['success' => 1, 'message' => 'Order submitted successfully']);
    } else {
        echo json_encode(['success' => 0, 'message' => 'Error submitting order: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => 0, 'message' => 'Invalid request method']);
}
?>
