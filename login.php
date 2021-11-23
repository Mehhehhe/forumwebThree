<?php
session_start();
require "dbconnect.php";
require "config.php";   
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
            $_SESSION['user_email'] = $email;      
            $_SESSION['user_first_name'] = $row['f_name'];   
            $_SESSION['user_last_name'] = $row['l_name'];          
            $_SESSION['user_status'] = $row['status'];
            $_SESSION['user_picture'] = $row['avatar'];
            $_SESSION['user_id'] = $row['id'];                         
            //header("location: index.php?error=1");                     
        }
        
        else {
            array_push($errors, "Wrong Email or Password");   
            header("location: index.php?error=2");                          
        }
    }
    else {
        array_push($errors, "Email & Password is required");  
        header("location: index.php?error=2");               
    }
}

if(isset($_GET['code'])){
    $token=$gClient->fetchAccessTokenWithAuthCode($_GET['code']);    
    
    if(!isset($token['error'])){

        $gClient->setAccessToken($token['access_token']);
        $token = $token['access_token'];        
        $_SESSION['access_token'] = $token;
        $gauth = new Google_Service_Oauth2($gClient);
        $google_info = $gauth->userinfo->get();  
        
        $email = $google_info['email'];
        $first_name = $google_info['given_name'];
        $last_name = $google_info['family_name'];
        $picture = $google_info['picture'];      
        
        $query = "SELECT id FROM users WHERE email = '$email'";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO users(f_name,l_name,avatar,email,password,status) VALUES('$first_name','$last_name','$picture','$email','$token','1')";
            mysqli_query($connect,$sql); 
            $query2 = "SELECT id FROM users WHERE email = '$email'";
            $result2 = mysqli_query($connect, $query2);
            $row2 = mysqli_fetch_assoc($result2);    
            $_SESSION['user_status'] = 1;  
            $_SESSION['user_id'] = $row2['id']; 
                
        }
        else if (mysqli_num_rows($result) == 1) {             
            $sql = "UPDATE users SET f_name = '$first_name', l_name = '$last_name', avatar = '$picture', password = '$token' WHERE email = '$email";
            mysqli_query($connect,$sql); 
            $query2 = "SELECT id,status FROM users WHERE email = '$email'";
            $result2 = mysqli_query($connect, $query2);
            $row2 = mysqli_fetch_assoc($result2);  
            $_SESSION['user_status'] = $row2['status'];  
            $_SESSION['user_id'] = $row2['id'];  

        }
        if(!empty($first_name)){
            $_SESSION['user_first_name'] = $first_name;
        }
        if(!empty($last_name)){
            $_SESSION['user_last_name'] = $last_name;
        }
        if(!empty($email)){
            $_SESSION['user_email'] = $email;
        }
        if(!empty($picture)){
            $_SESSION['user_picture'] = $picture;
        }           
        header("location: index.php?error=1");       
    }    
} 
/*
echo "id :";
echo $_SESSION['user_id'];
echo "<br>email :";
echo $_SESSION['user_email'];
echo "<br>first_name :";
echo $_SESSION['user_first_name'];
echo "<br>last_name :";
echo $_SESSION['user_last_name'];
echo "<br>status :";
echo $_SESSION['user_status'];
echo "<br>picture :";
echo $_SESSION['user_picture'];
*/
header("location: index.php");
?>
