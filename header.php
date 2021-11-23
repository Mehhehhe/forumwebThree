<head>
    <!-- add icon link -->
    <link rel="icon" href="images/icon.jpg" type="image/x-icon">
    <!-- specifying a webpage icon for web clip -->
    <link rel="apple-touch-icon" href="images/icon.jpg" />
</head>
<?php
if(isset($_GET["logout"])){
    session_destroy();
    unset($_SESSION["user_email"]);
    unset($_SESSION["user_first_name"]);
    unset($_SESSION["user_last_name"]);
    unset($_SESSION["user_status"]);
    unset($_SESSION["user_picture"]);
    unset($_SESSION["user_id"]);
    header('location: index.php');
}
?>