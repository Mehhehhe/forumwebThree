<?php
session_start();
require "dbconnect.php";
error_reporting(-1);
$errors = array();

if (isset($_POST['change_name'])&&!empty($_SESSION['user_status'])) {

    $firstname= mysqli_real_escape_string($connect, $_POST['firstname']);  
    $lastname= mysqli_real_escape_string($connect, $_POST['lastname']);  
    if($_SESSION['user_status']==1){
        $query_change_name = "UPDATE users SET f_name = '$firstname' ,l_name ='$lastname'WHERE id ='".$_SESSION['user_id']."'"; 
    }
    else{
        $query_change_name = "UPDATE users SET f_name = '$firstname' ,l_name ='$lastname' ,password ='".$POST['password']."' WHERE id ='".$_SESSION['user_id']."'"; 
    }
    mysqli_query($connect, $query_change_name);

    if(count($errors) == 0){         
        $_SESSION['user_first_name'] = $firstname;
        $_SESSION['user_last_name'] = $lastname;
        if($_SESSION['user_status']!=1){
            header('location: logout.php');
        }
        header('location: profile.php?error=1');
    }
    else{
        header('location: profile.php?error=2');
    }
}
?>