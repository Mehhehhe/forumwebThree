<?php
    //require "dbconnect.php";
    session_start();    
    //error_reporting(0);   
    $_SESSION['user_id'] = '1';
    $_SESSION['user_email'] = 'admin';
    $_SESSION['user_first_name'] = 'test';
    $_SESSION['user_last_name'] = 'admin';
    $_SESSION['user_status'] = 'admin_2';

    echo "id : ";
    echo $_SESSION['user_id'];
    echo "<br>email : ";
    echo $_SESSION['user_email'];
    echo "<br>first_name : ";
    echo $_SESSION['user_first_name'];
    echo "<br>last_name : ";
    echo $_SESSION['user_last_name'];
    echo "<br>status : ";
    echo $_SESSION['user_status'];
?>