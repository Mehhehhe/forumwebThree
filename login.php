<?php
require "dbconnect.php";
$errors = array();

if (isset($_POST['user_login'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['status'] = $row['status'];
            $_SESSION['ID'] = $row['ID'];
            $ID = $_SESSION["ID"];                           
           
            header("location: profile.php");
              
        }
   
        else {
            array_push($errors, "Wrong Email or Password");            
            header("location: index.php");
        }
    }
    else {
        array_push($errors, "Email & Password is required");        
        header("location: index.php");
    }
}

?>