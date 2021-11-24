<?php
    require "dbconnect.php";     
    //error_reporting(0);   
    $query = "SELECT * FROM users WHERE email = 'admin' AND password = '21232f297a57a5a743894a0e4a801fc3' ";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result); 
    echo "id : ";
    echo $row['id'];
    echo "<br>email : ";
    echo $row['email'];
    echo "<br>first_name : ";
    echo $row['f_name'];
    echo "<br>last_name : ";
    echo $row['l_name'];
    echo "<br>status : ";
    echo $row['status'];
?>