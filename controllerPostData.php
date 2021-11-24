<?php 
session_start();
require "dbconnect.php";
error_reporting(0);
$errors = array();
$id = $_SESSION['user_id'];

if (isset($_POST['create_post'])) {
    $title_post = mysqli_real_escape_string($connect, $_POST["title_post"]); 
    $msg_post = mysqli_real_escape_string($connect, $_POST['msg_post']);    

    if (empty($title_post) || empty($msg_post)) {
        array_push($errors, "Data is required");        
    }

    if (count($errors) == 0) {
        $sql_create_post = "INSERT INTO post(id,title_post,msg_post) VALUES('$id','$title_post','$msg_post')";
        mysqli_query($connect,$sql_create_post); // สั่งรันคำสั่ง sql

        header('location: index.php');
    } 
}

if(isset($_POST['del_post'])){
    $id_post = $_POST['id_post'];

    $sql_select_comment = "SELECT id_comment FROM comment WHERE id_post='$id_post'";
    $query_select_comment = mysqli_query($connect,$sql_select_comment);
    while($resuut_select_comment = mysqli_fetch_assoc($query_select_comment))
    {
        $id_comment = $resuut_select_comment['id_comment'];
        $sql_del_comment = "DELETE FROM comment WHERE id_comment='$id_comment'";
        mysqli_query($connect,$sql_del_comment); // สั่งรันคำสั่ง sql    
    }   

    $sql_del_post = "DELETE FROM post WHERE id_post='$id_post'";
    mysqli_query($connect,$sql_del_post); // สั่งรันคำสั่ง sql    
    
    header('location: index.php');
}
   
if (isset($_POSTT['comment_post'])) {
    $msg_comment = mysqli_real_escape_string($connect, $_POST["msg_comment"]);     
    $id_post = $_POST['id_post'];

    if (count($errors) == 0) {
        $sql_comment_post = "INSERT INTO comment(msg_comment,id,id_post) VALUES('$msg_comment','$id','$id_post')";
        mysqli_query($connect,$sql_comment_post); // สั่งรันคำสั่ง sql

        header("location: post.php?id=$id_post");
    } 
}

if(isset($_POST['del_comment'])){
    $id_comment = $_POST['id_comment'];
    $id_post = $_POST['id_post'];
    $sql_del_comment = "DELETE FROM comment WHERE id_comment='$id_comment'";
    mysqli_query($connect,$sql_del_comment); // สั่งรันคำสั่ง sql    

    header("location: post.php?id=$id_post");
}
?>