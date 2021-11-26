<?php 
session_start();
require "dbconnect.php";
//error_reporting(0);
if(!empty($_SESSION['user_status'])){

    $user_id = $_SESSION['user_id'];
    echo "<br>user_id : ";
    echo $user_id;
    echo "<br>user_status : ";
    echo $_SESSION['user_status'];
    echo "<br>";

    if (isset($_POST['create_post'])) {

        $title_post = $_POST["title_post"]; 
        $msg_post = $_POST['msg_post'];    
       
        $sql_create_post = "INSERT INTO post(id,title_post,msg_post) VALUES('$user_id','$title_post','$msg_post')";     
        $dbo->query("$sql_create_post");
    
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
        $resuut_select_post = $dbo->query("$sql_select_post")->fetch();

        if($resuut_select_post['id']==$user_id||$_SESSION['user_status']==2){            
            $sql_select_comment = "SELECT id_comment FROM comment WHERE id_post='$id_post'";           
            $query_select_comment = $dbo->query("$sql_select_comment")->fetchAll();          
            foreach ($query_select_comment as $resuut_select_comment)     
            {
                $id_comment = $resuut_select_comment['id_comment'];
                $sql_del_comment = "DELETE FROM comment WHERE id_comment='$id_comment'"; 
                $dbo->query("$sql_del_comment");  
                
                //echo $sql_del_comment;
                //echo "<br>";
            }   

            $sql_del_post = "DELETE FROM post WHERE id_post='$id_post'";            
            $dbo->query(" $sql_del_post");
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
        $resuut_select_post = $dbo->query("$sql_select_post")->fetch();

        if($resuut_select_post['id']==$user_id||$_SESSION['user_status']==2){           
             
            $title_post = $_POST["title_post"]; 
            $msg_post = $_POST['msg_post'];    

            $sql_edit_post = "UPDATE post SET title_post = '$title_post', msg_post= '$msg_post'  WHERE id_post = '$id_post'";    
            $dbo->query("$sql_edit_post");  
                 
        }

        header("location: forum.php?id=$id_post");
    }
    
    if (isset($_POST['comment_post'])) {        
        $id_post = $_POST['id_post'];
        $msg_comment = $_POST["msg_comment"];     
            
        $sql_comment_post = "INSERT INTO comment(msg_comment,id,id_post) VALUES('$msg_comment','$user_id','$id_post')";
        $dbo->query("$sql_comment_post");          
   
        header("location: forum.php?id=$id_post");
    }

    if(isset($_POST['del_comment'])){
        $id_comment = $_POST['id_comment'];

        //echo "<br>id_comment : ";
        //echo $id_comment;

        $sql_select_comment = "SELECT id,id_post FROM comment WHERE id_comment='$id_comment'";
        $resuut_select_comment = $dbo->query("$sql_select_comment")->fetch();

        $id_post = $resuut_select_comment['id_post'];
        $id = $resuut_select_comment['id'];

        if($id==$user_id||$_SESSION['user_status']==2||$id==$user_id){

            $sql_del_comment = "DELETE FROM comment WHERE id_comment='$id_comment'";
            $dbo->query("$sql_del_comment");
      
        }
        
        header("location: forum.php?id=$id_post");
    }

    if(isset($_POST['edit_comment'])){
        $id_comment = $_POST['id_comment'];

        echo "<br>id_comment : ";
        echo $id_comment;

        $sql_select_comment = "SELECT id,id_post FROM comment WHERE id_comment='$id_comment'";
        $resuut_select_comment = $dbo->query("$sql_select_comment")->fetch();

        $id_post = $resuut_select_comment['id_post'];
        $id = $resuut_select_comment['id'];

        echo "<br>id_user : ";
        echo $id;


        if($id==$user_id||$_SESSION['user_status']==2){

            $msg_comment =$_POST['msg_comment'];    

            $sql_edit_comment = "UPDATE comment SET msg_comment= '$msg_comment'  WHERE id_comment = '$id_comment'";
            $dbo->query("$sql_edit_comment");     
        
        }

        echo $sql_edit_comment;
        
        header("location: forum.php?id=$id_post");
    }

}

else{
    //header('location: index.php');
}
?>