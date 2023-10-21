<?php 
session_start();
if(!isset($_SESSION['userData'])){
	header('location: index2.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        /* Add custom CSS styles here if needed */
        .profile_pic {
            max-width: 150px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <img src="<?= $_SESSION['userData']['picture'] ?>" class="profile_pic" alt="Profile Picture">
                <br>
                <h2>Hello</h2>
                <p>Name: <?= $_SESSION['userData']['f_name'] ?></p>
                <p>Email: <?= $_SESSION['userData']['email_id'] ?></p>
                <p>Language: <?= $_SESSION['userData']['locale'] ?></p>
                <a class="btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS at the end of the body for faster loading -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
