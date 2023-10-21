<?php

session_start();
##### DB Configuration #####
$servername = "fdb1028.awardspace.net";
$username = "4356028_dkutnote";
$password = "_{*pMJ4y1@C,U?n^";
$db = "4356028_dkutnote";

##### Google App Configuration #####
$googleappid = "607326076656-ui0qji64rnfd08ogsvv2mdnlrjti63jd.apps.googleusercontent.com"; //Google App ID
$googleappsecret = "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"; //Google Secret Key
$redirectURL = "http://localhost/gmaillogin/authenticate.php";

##### Create connection #####
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
##### Required Library #####
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

$googleClient = new Google_Client();
$googleClient->setApplicationName('Login');
$googleClient->setClientId($googleappid);
$googleClient->setClientSecret($googleappsecret);
$googleClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($googleClient);

?>