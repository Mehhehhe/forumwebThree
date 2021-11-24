<?php
session_start();
require "dbconnect.php";
error_reporting(0);
$errors = array();

if (isset($_POST['change_info'])) {

    $sex = mysqli_real_escape_string($connect, $_POST['sex']);    
    $major = mysqli_real_escape_string($connect, $_POST['major']);
    $introduce = mysqli_real_escape_string($connect, $_POST['introduce']);
      
    $email = $_SESSION["email"];

    //echo "emaill : $email <br>major : $major <br> introduce : $introduce <br> sex : $sex <br>";
    
    $query = "UPDATE users SET ";  
    if ($major == null) {
        $query .= "major = NULL,";
    } 
    else {
        $query .= "major = '$major',";
    }
    if ($introduce == null) {
        $query .= "introduce = NULL,";
    } 
    else {
        $query .= "introduce = '$introduce',";
    }    
    if ($sex == null) {
        $query .= "sex = NULL";
    } 
    else {
        $query .= "sex = '$sex'";
    } 
    $query .= " WHERE email = '$email'";

    //echo "query : $query";

    $result = mysqli_query($connect, $query);

    if ($_FILES["filUpload"]["name"] != "") {
        if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "myfile/" . $email . "_" . $_FILES["filUpload"]["name"])) {

            //*** Delete Old File ***//
            if ($_POST["hdnOldFile"] != 'avatar.jpg') {
                @unlink("myfile/" . $_POST["hdnOldFile"]);
            }

            //*** Update New File ***//
            $strSQL = "UPDATE users SET picture = '" . $email . "_" . $_FILES["filUpload"]["name"] . "' WHERE email = '$email'";
            $objQuery = mysqli_query($connect, $strSQL);
        }
    }
    if(count($errors) == 0){         
        header('location: profile.php?error=1');
    }
    else{
        header('location: profile.php?error=2');
    }

}

if (isset($_POST['change_name'])) {

    $name= mysqli_real_escape_string($connect, $_POST['name']);  
      
    $email = $_SESSION["email"];

    //echo "emaill : $email <br>major : $major <br> introduce : $introduce <br> sex : $sex <br>";
    
    $query = "UPDATE users SET name = '$name' WHERE email ='$email'"; 

    //echo "query : $query";

    mysqli_query($connect, $query);
    
    if(count($errors) == 0){         
        header('location: profile.php?error=1');
    }
    else{
        header('location: profile.php?error=2');
    }

}
?>