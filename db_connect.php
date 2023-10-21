<?php
//Update credentials
$servername = "fdb1028.awardspace.net";
$username = "4356028_dkutnote";
$password = "_{*pMJ4y1@C,U?n^";
$dbname = "4356028_dkutnote";

//Database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}