<?php
    require "dbconnect.php";
    session_start();    
    //error_reporting(0);   
    $query = "SELECT * FROM users WHERE email = 'admin' AND password = '21232f297a57a5a743894a0e4a801fc3' ";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result); 

    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_first_name'] = $row['f_name'];
    $_SESSION['user_last_name'] = $row['l_name'];
    $_SESSION['user_status'] = $row['status'];

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