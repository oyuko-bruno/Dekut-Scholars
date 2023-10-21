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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dekut StudyRoom</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="http://dkutscholar.onlinewebshop.net/icon.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <i id="user-men" class="fa fa-graduation-cap" aria-hidden="true"></i>
        <h2 class="welcome-heading">Dekut <span class="dkp-heading"></span> StudyRoom</h2>
             <form method="post">
        <div class="dtn-container">
            <a class="social-media-login" href="#"> <i class="fa fa-facebook" aria-hidden="true"></i>facebook</a>
            <a class="social-media-login1" href="index2.php"><i class="fa fa-google" aria-hidden="true"></i>Google</a>
        </div>
        <div class="underline-container">
            <div class="underline"></div>
            <p class="or-heading">or</p>
            <div class="underline"></div>

        </div>
        <div class="input-container">
            <input class="input-box"type="text" placeholder="username" id="username" name="username" required>
            <input class="input-box1"type="password" placeholder="password"  id="password" name="password" required>
              
            
                <button type="submit"class="login-btn">login</button>

        </div>
        <a  class="forget-password" href="forgot_password.php">forget password?</a>
        <p class="register">Dont have an account <a  class="Register-now"href="register.php">Register Now</a></p>
                     </form>
    </div>
            
        <style>
                /* Created by shameera */

  *{
     margin: 0;
     padding: 0;
     box-sizing: border-box;
 }
 body{
     font-family: Arial,"lato",sans-serif;
     background-color: #efefef;
     
 }
 .container{
     width: 280px;
     height: 420px;
     background: rgb(255, 255, 255);
     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%,-50%);
     border-radius: 5px;
     box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);

 }
  #user-men{
      font-size: 2.5rem;
      margin: 10px 45%;
      color: rgb(58, 58, 161);
}
      
 
 .welcome-heading{
     font-size: 1.1rem;
     text-align: center;
     text-transform: capitalize;
     color: rgb(91, 129, 241);
 }
 .dkp-heading{
     text-transform: uppercase;
 }
 .dtn-container{
     margin: 40px 20px;
 }
 .dtn-container i{
     margin-right: 8px;
 }
 .social-media-login{
     text-decoration: none;
     padding: 8px 15px;
     background-color:#39569c;
     color: #fff;
     border-radius: 20px;
     margin-left: 10px;
 }
 
 .social-media-login1{
    text-decoration: none;
    padding: 8px 15px;
    background-color:#ec5574;
    color: #fff;
    border-radius: 20px;
    margin-left: 10px;

 }
 .underline-container{
    /* position: absolute; */
    position: relative;
     display: flex;
     justify-content: center;
     margin: 15px 42px;
     
 }
 .underline{
      

     width: 80px;
     height: 2px;
     background-color: rgb(161, 161, 161);
     /* margin-left: 30px; */
 }
 .or-heading{
     text-align: center;
     margin-top: -10px;
     padding: 0px 10px;
     
 }
 
 .input-box{
     width: 220px;
     height: 30px;
     margin:  10px 30px;
     border-radius: 40px;
     outline: none;
     border: none;
     box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
     padding-left: 10px;

     

 }
 .input-box1{
    width: 220px;
    height: 30px;
    margin:  10px 30px 30px;
    border-radius: 40px;
    outline: none;
    border: none;
    padding-left: 10px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
    

}
 /* .input-box::placeholder{
     padding-left:1px;
 } */
 .login-btn{
    
     margin:30px;
     padding: 8px 92px;
     background-image: linear-gradient(to left,  rgb(170, 170, 241),rgb(39, 39, 250));
     border-radius: 40px;
     text-decoration: none;
     color: #ffffff;
     text-transform: capitalize;
     
 }
 .forget-password{
     position: absolute;
    margin: 20px 70px;
    text-decoration: none;
    font-weight: bold;

      
 }
 .register{
     position: absolute;
     margin-top: 40px;
     font-size: 0.8rem;
     padding:  10px 20px;
 }
  .Register-now{
      text-decoration: none;
       margin-left: 10px;
       font-size: 0.8rem;
       font-weight: bold;
  }
 


 
                </style>
</body>
</html>