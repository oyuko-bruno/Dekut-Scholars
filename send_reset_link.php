<?php
error_reporting(0);
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'db_connect.php';
//Load Composer's autoloader
require 'vendor/autoload.php';
// Validate and sanitize the email
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// Check if the email exists in the database
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generate a random token (using a more secure method)
    $token = bin2hex(random_bytes(16)); // 16 bytes = 32 characters

    // Store the token in the database along with user_id and expiration_date
    $user = $result->fetch_assoc();
    $user_id = $user['id'];
    $expiration_date = date('Y-m-d H:i:s', strtotime('+1 hour'));

    $sql = "INSERT INTO password_reset (user_id, token, expiration_date) VALUES ('$user_id', '$token', '$expiration_date')";
    if ($conn->query($sql) === TRUE) {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        // try {
        //Server settings       
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'pld108.truehost.cloud';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'info@devkevin.co.ke';                     //SMTP username
        $mail->Password   = '@078673@kvn';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 995;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('info@devkevin.co.ke', 'B+pus Tech');
        $mail->addAddress($email);     //Recipient
              
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        //Update the link
        $mail->Body    = "Click the following link to reset your password: 127.0.0.1/MY_PROJECTS/Password/reset_password.php?token=$token";
        
        // $mail->send();
        if (!$mail->send()) {
            echo "An error occurred";

        } else {
           echo "Password reset link sent";
        }
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Email not found.";
}

?>