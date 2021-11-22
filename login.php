<?php
require "config.php";
require "dbconnect.php";

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
            $sql = "INSERT INTO users(f_name,l_name,avatar,gender,email,password,status) VALUES('$first_name','$last_name','$picture','$gender','$email','$token','1')";
            mysqli_query($connect,$sql);             
            $query = "SELECT id FROM users WHERE email = '$email'";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
        }
        else if (mysqli_num_rows($result) == 1) {
            $_SESSION['user_id'] = $row['id'];
            $sql = "UPDATE users SET f_name = '$first_name', l_name = '$last_name', avatar = '$picture', password = '$token' WHERE email = '$email";
            mysqli_query($connect,$sql); 
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
    }
    header("location: index.php");
}

if(isset($_REQUEST['google_login'])){
    //header("location: <a href='".$gClient->createAuthUrl()."'>login with Google</a>");
    //echo "<a href='".$gClient->createAuthUrl()."'>login with Google</a>"; 
}

if(isset($_REQUEST['user_login'])){
    echo "user login";
}
?>