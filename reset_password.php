<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rest Page</title>
</head>
<body>  
<form action="reset_password_action.php" method="post">
    <label for="password">New Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
    <input type="submit" value="Reset Password">
</form>

</body>
</html>