<?php
//error_reporting(0);
require_once "vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("916474259238-jeeksaltsglf1hjg9np3d27jvl8nq680.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setRedirectUri("http://localhost/forumwebThree/login.php");
//$gClient->setRedirectUri("https://db-ite.evera.cloud/login.php");
$gClient->addScope('profile');
$gClient->addScope('email');
?>