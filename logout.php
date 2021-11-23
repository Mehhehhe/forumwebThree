<?php
session_start(); 
unset($_SESSION["user_email"]);
unset($_SESSION["user_first_name"]);
unset($_SESSION["user_last_name"]);
unset($_SESSION["user_status"]);
unset($_SESSION["user_picture"]);
unset($_SESSION["user_id"]);
session_destroy();
header("location: index.php");
exit();
?>