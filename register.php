<?php 
include 'inc/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dekut StudyRoom</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles -->
   <link rel="icon" href="http://dkutscholar.onlinewebshop.net/icon.png" type="image/x-icon">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f8f9fa;
    }
    .register-box {
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 300px;
    }
    .register-box form {
      margin-top: 20px;
    }
    .register-box button {
      width: 100%;
    }
    .register-box p {
      margin-top: 15px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="register-box">
    <h2 class="text-center mb-4">Register</h2>
    <form method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
      </div>
      <button type="submit" class="btn btn-primary" style="background-color: black;">Register</button>
           <button style="background-color: black; /* Green */
  border-radius: 8px;
  color: white;
  padding: 9px 18px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
"><a href="login.php">Login</a></button>
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if the email address already exists in the database
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email_sql);

    if ($result->num_rows > 0) {
        echo '<p class="text-danger mt-3">Email  already registered.</p>';
    } else {
        if ($password == $confirm_password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                echo '<p class="text-success mt-3">Registration successful!</p>';
            } else {
                echo '<p class="text-danger mt-3">Error: ' . $conn->error . '</p>';
            }
        } else {
            echo '<p class="text-danger mt-3">Passwords do not match</p>';
        }
    }

    $conn->close();
}
?>

  </div>

  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>