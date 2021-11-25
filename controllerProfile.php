<?php
session_start();
require "dbconnect.php";
error_reporting(0);
$errors = array();

if (isset($_POST['change_name'])&&!empty($_SESSION['user_status'])) {

    if($_SESSION['user_status']==1){
        $query_change_name = "UPDATE users SET f_name = '".$_POST['firstname']."' ,l_name ='".$_POST['lastname']."'WHERE id ='".$_SESSION['user_id']."'"; 
    }
    else{
        $query_change_name = "UPDATE users SET f_name = '".$_POST['firstname']."' ,l_name ='".$_POST['lastname']."' ,password ='".md5($_POST['password'])."' WHERE id ='".$_SESSION['user_id']."'"; 
    }

    $dbo->query("$query_change_name");

    $_SESSION['user_first_name'] = $_POST['firstname'];
    $_SESSION['user_last_name'] = $_POST['lastname'];
    
    header('location: profile.php?error=1');
       
}
?>
