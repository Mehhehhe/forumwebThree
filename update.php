<?php
include("dbconnect.php");
include("header.php");
error_reporting(-1);
 $sql="UPDATE users SET
        f_name = '".$_GET["username"]."',
        l_name = '".$_GET["lastname"]."',
        password = '".md5($_GET['password'])."'
        WHERE id = '".$_SESSION['user_id']."'";
 $objQuery = mysqli_query($connect,$sql);
$sql = "SELECT f_name,l_name FROM users WHERE id = '".$_SESSION['user_id']."'";
$value = mysqli_query($connect,$sql);
$data = mysqli_fetch_assoc($value);
$_SESSION['user_first_name'] = $data['f_name'];
$_SESSION['user_last_name'] = $data['l_name'];
header("location: index.php");
?>