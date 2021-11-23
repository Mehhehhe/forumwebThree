<?php

    $servername = "34.124.243.161:3366";
    $username = "ite";
    $password = "ite@@#2021";
    $dbname = "project";

        // Create Connection
        $connect = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$connect) {
            die("Connection failed" . mysqli_connect_error());
            //หรือย่อเป็น $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed");
        } 
    
?>