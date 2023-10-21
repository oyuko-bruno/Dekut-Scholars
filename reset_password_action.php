<?php
require_once 'db_connect.php';

// Retrieve the token and password from the form submission
$token = $_POST['token'];
$password = $_POST['password'];

// Validate the password (e.g., minimum length, complexity)

// Validate the token and check if it's still valid (not expired)
$current_time = date('Y-m-d H:i:s');
$sql = "SELECT * FROM password_reset WHERE token = '$token' AND expiration_date > '$current_time'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Update the user's password in the database
    $user = $result->fetch_assoc();
    $user_id = $user['user_id'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password = '$hashed_password' WHERE id = '$user_id'";
    if ($conn->query($sql) === TRUE) {
        // Delete the used password reset token from the reset table
        $sql = "DELETE FROM password_reset WHERE token = '$token'";
        $conn->query($sql);

        echo "Password reset successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid or expired token.";
}

$conn->close();
?>