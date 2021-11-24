<?php
    error_reporting(-1);
    //$servername = "localhost:3306";
    //$username = "root";
    //$password = "";
    $servername = "34.124.243.161:3366";
    $username = "ite";
    $password = "ite@@#2021";
    $dbname = "project";

        // Create Connection
        $connect = mysqli_connect($servername, $username, $password, $dbname,3366);
        // Check connection
        if (!$connect) {
            echo mysqli_connect_error();
            die("Connection failed" . mysqli_connect_error());
            //หรือย่อเป็น $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed");
        } 
        else{
            echo "connected";
        }  
?>