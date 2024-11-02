<?php
require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Check if the email is already registered
    $checkEmailQuery = "SELECT * FROM users WHERE Email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        $message = "Email already registered";
    } else {
        // Insert user data into the database
        $insertQuery = "INSERT INTO users (Name, DateOfBirth, Address, PhoneNumber, Email, Password) VALUES ('$name', '$dob', '$address', '$phoneNumber', '$email', '$hashedPassword')";
        
        if (mysqli_query($conn, $insertQuery)) {
            $message = "Registration successful";
        } else {
            $message = "Registration failed";
        }
    }

    // Close the database connection
    mysqli_close($conn);

    // Return the response as JSON
    echo json_encode(['success' => (int)(mysqli_num_rows($checkEmailResult) === 0), 'message' => $message]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>

<body>
    <h2>Registration Form</h2>
    <form id="registrationForm" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="dob">Date of Birth:</label>
        <input type="text" name="dob" required>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Register</button>
    </form>
</body>

</html>
