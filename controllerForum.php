<?php 
session_start();
require "dbconnect.php";
//error_reporting(0);
$errors = array();
if(!empty($_SESSION['user_status'])){

    $user_id = $_SESSION['user_id'];
    echo "<br>user_id : ";
    echo $user_id;
    echo "<br>user_status : ";
    echo $_SESSION['user_status'];
    echo "<br>";

    if (isset($_POST['create_post'])) {

        $title_post = mysqli_real_escape_string($connect, $_POST["title_post"]); 
        $msg_post = mysqli_real_escape_string($connect, $_POST['msg_post']);    

        if (empty($title_post) || empty($msg_post)) {
            array_push($errors, "Data is required");        
        }
        if (count($errors) == 0) {
            $sql_create_post = "INSERT INTO post(id,title_post,msg_post,like_post) VALUES('$user_id','$title_post','$msg_post','0')";
            mysqli_query($connect,$sql_create_post); // สั่งรันคำสั่ง sql       
        }
        else{
            array_pop($errors);
        } 
        /*
        echo $sql_create_post;
        echo "<br>user_id : ";
        echo $user_id;
        echo "<br>title_post : ";
        echo $title_post;
        echo "<br>msg_post : ";
        echo $msg_post;
        */
        header('location: index.php');
    }

    if(isset($_POST['del_post'])){    
        $id_post = $_POST['id_post'];

        //echo "<br>id_post : ";
        //echo $id_post;

        $sql_select_post = "SELECT id FROM post WHERE id_post='$id_post'";
        $query_select_post = mysqli_query($connect,$sql_select_post);
        $resuut_select_post = mysqli_fetch_assoc($query_select_post);

        if($resuut_select_post['id']==$user_id||$_SESSION['user_status']==2){            
            $sql_select_comment = "SELECT id_comment FROM comment WHERE id_post='$id_post'";
            $query_select_comment = mysqli_query($connect,$sql_select_comment);
            while($resuut_select_comment = mysqli_fetch_assoc($query_select_comment))
            {
                $id_comment = $resuut_select_comment['id_comment'];
                $sql_del_comment = "DELETE FROM comment WHERE id_comment='$id_comment'";
                mysqli_query($connect,$sql_del_comment); // สั่งรันคำสั่ง sql    

                //echo $sql_del_comment;
                //echo "<br>";
            }   

            $sql_del_post = "DELETE FROM post WHERE id_post='$id_post'";
            mysqli_query($connect,$sql_del_post); // สั่งรันคำสั่ง sql    
        }

        //echo "<br>";
        //echo $sql_del_post;        

        header('location: index.php');
    }

    if(isset($_POST['edit_post'])){    
        $id_post = $_POST['id_post'];

        //echo "<br>id_post : ";
        //echo $id_post;

        $sql_select_post = "SELECT id FROM post WHERE id_post='$id_post'";
        $query_select_post = mysqli_query($connect,$sql_select_post);
        $resuut_select_post = mysqli_fetch_assoc($query_select_post);

        if($resuut_select_post['id']==$user_id||$_SESSION['user_status']==2){           
             
            $title_post = mysqli_real_escape_string($connect, $_POST["title_post"]); 
            $msg_post = mysqli_real_escape_string($connect, $_POST['msg_post']);    

            if (empty($title_post) || empty($msg_post)) {
                array_push($errors, "Data is required");        
            }

            if (count($errors) == 0) {
                $sql_edit_post = "UPDATE post SET title_post = '$title_post', msg_post= '$msg_post'  WHERE id_post = '$id_post'";
                mysqli_query($connect,$sql_edit_post); // สั่งรันคำสั่ง sql       
            }
            else{
                array_pop($errors);
            } 
        }

        header("location: forum.php?id=$id_post");
    }
    
    if (isset($_POST['comment_post'])) {        
        $id_post = $_POST['id_post'];
        $msg_comment = mysqli_real_escape_string($connect, $_POST["msg_comment"]);     
            
        if (empty($msg_comment)) {
            array_push($errors, "Data is required");        
        }

        if (count($errors) == 0) {
            $sql_comment_post = "INSERT INTO comment(msg_comment,id,id_post) VALUES('$msg_comment','$user_id','$id_post')";
            mysqli_query($connect,$sql_comment_post); // สั่งรันคำสั่ง sql            
        } 
        else{
            array_pop($errors);
        } 

        header("location: forum.php?id=$id_post");
    }

    if(isset($_POST['del_comment'])){
        $id_comment = $_POST['id_comment'];

        $sql_select_comment = "SELECT id,id_post FROM comment WHERE id_comment='$id_comment'";
        $query_select_comment = mysqli_query($connect,$sql_select_comment);
        $resuut_select_comment = mysqli_fetch_assoc($query_select_comment);
        $id_post = $resuut_select_comment['id_post'];

        $sql_select_post = "SELECT id FROM post WHERE id_comment='$id_post'";
        $query_select_post = mysqli_query($connect,$sql_select_post);
        $resuut_select_post = mysqli_fetch_assoc($query_select_post);

        if($resuut_select_comment['id']==$user_id||$_SESSION['user_status']==2||$resuut_select_post['id']==$user_id){

            $sql_del_comment = "DELETE FROM comment WHERE id_comment='$id_comment'";
            mysqli_query($connect,$sql_del_comment); // สั่งรันคำสั่ง sql    
      
        }
        
        header("location: forum.php?id=$id_post");
    }

    if(isset($_POST['edit_comment'])){
        $id_comment = $_POST['id_comment'];

        $sql_select_comment = "SELECT id,id_post FROM comment WHERE id_comment='$id_comment'";
        $query_select_comment = mysqli_query($connect,$sql_select_comment);
        $resuut_select_comment = mysqli_fetch_assoc($query_select_comment);
        $id_post = $resuut_select_comment['id_post'];

        $sql_select_post = "SELECT id FROM post WHERE id_comment='$id_post'";
        $query_select_post = mysqli_query($connect,$sql_select_post);
        $resuut_select_post = mysqli_fetch_assoc($query_select_post);

        if($resuut_select_comment['id']==$user_id||$_SESSION['user_status']==2){

            $msg_comment = mysqli_real_escape_string($connect, $_POST['msg_comment']);    

            if (empty($msg_comment)) {
                array_push($errors, "Data is required");        
            }

            if (count($errors) == 0) {
                $sql_edit_post = "UPDATE comment SET msg_post= '$msg_post'  WHERE id_comment = '$id_comment'";
                mysqli_query($connect,$sql_edit_post); // สั่งรันคำสั่ง sql       
            }
            else{
                array_pop($errors);
            } 
      
        }
        
        header("location: forum.php?id=$id_post");
    }

}

else{
    //header('location: index.php');
}
?>