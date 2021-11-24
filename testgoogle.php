<?php
require "configtest.php";
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
        echo "<br>email : ";
        echo $email;
        echo "<br>first_name : ";
        echo $first_name;
        echo "<br>last_name : ";
        echo $last_name;
    }
}
else{
    echo "<a href='".$gClient->createAuthUrl()."' class='loginG'>Login with Google</a>";
}
?>