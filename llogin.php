<?php 
include 'inc/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION['username'] = $username;
            header("Location: index.php"); // Redirect to dashboard after successful login
            exit();
        } else {
            echo '<p class="text-danger mt-3">Invalid credentials</p>';
        }
    } else {
        echo '<p class="text-danger mt-3">User not found</p>';
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f8f9fa;
    }
    .login-box {
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 300px;
    }
          .header {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #333; /* Background color for the header */
      width: 100%; /* Full width */
      height: 100px; /* Height of the header */
    }
    .header img {
      border-radius: 50%; /* Make the image round */
      width: 80px; /* Adjust the size of the image */
      height: 80px; /* Adjust the size of the image */
    }
  </style>
</head>
<body>
          <div class="header">
    <img src="your-image-url.jpg" alt="Profile Image">
  </div>
  <!-- Your HTML content -->
        <h2 style="text-align: right;
    margin-bottom: 70vh;">Dekut Scholar's</h2>

  <div class="login-box">
    <h2 class="text-center mb-4">Login</h2>
    <form method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit"style="  background-color: black; /* Green */
  border-radius: 8px;
  color: white;
  padding: 9px 18px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;" >Login</button>
            
            
            
            
            
           <button style="background-color: black; /* Green */
  border-radius: 8px;
  color: white;
  padding: 9px 18px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
"><a href="register.php">Register</a></button>
            
    </form>
   
  </div>

  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>