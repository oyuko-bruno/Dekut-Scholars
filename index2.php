<?php
require_once 'config.php';
if(isset($_SESSION['userData'])){
	header('location: view.php');
}
$loginURL="";
$authUrl = $googleClient->createAuthUrl();
$loginURL = filter_var($authUrl, FILTER_SANITIZE_URL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Using Google</title>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <a href="<?= htmlspecialchars($loginURL); ?>" class="btn btn-primary">Login with Google</a>
</div>
<!-- Include Bootstrap JS at the end of the body for faster loading -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
