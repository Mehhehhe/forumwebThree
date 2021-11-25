<?php
    require "dbconnect.php";
    require "header.php";
    //error_reporting(0);
    if(isset($_SESSION['user_status']) && !empty($_SESSION['user_status'])&& isset($_GET['id'])){
?>
<title>Post | Website</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/post.css">
<body>
<section class="main frame" style="padding-top:100;">
<div class="container" style="margin-bottom:100px;">
    
    <?php
          $sql_select_post = "SELECT * FROM post ,users WHERE id_post = '".$_GET['id']."'AND users.id = post.id";
          $query_select_post = mysqli_query($connect,$sql_select_post);
          $resuut_select_post = mysqli_fetch_assoc($query_select_post);        
      ?>
<!---Example post -->
    <div class="row" id="text-content" style="top:100px;width:100%;">
        <div class="row" style="margin-bottom:30px;">
            <div class="col-lg-6">
                <p class="forum_head">
                    <h1 class="forum_name" id="forum_topic_name">
                    <?php
                          echo $resuut_select_post['title_post'];
                    ?>
                    </h1>
                </p>
                
            </div>
            <?php
                if($resuut_select_post['id']==$_SESSION['user_id']||$_SESSION['user_status']==2){
            ?>
            <div class="col-lg-6" style="text-align:end;">
                <button type="button" id="submitButton" class="btn btn-normal pull-right" name="delete_post" style="background:#ff0000;">Delete</button>
                <button type="button" id="submitButton" class="btn btn-normal pull-right" name="edit_post" style="background:green; margin-right:20px;" onclick="editPost()">Edit</button>              
            </div>
            <?php
                }
            ?>
        </div>
        <div class="content" id="posted_content">
        <?php
            echo $resuut_select_post['msg_post'];
        ?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <i onclick="myFunction(this)" class="fa fa-thumbs-up" style="position:relative; "> <?php
                          echo $resuut_select_post['like_post'];
                      ?></i>
                <p class="likeCount" name="like_post"></p>
            </div>
            <div class="col-md-6">
                <p class="creator" style="text-align:end;"><i class="fa fa-calendar"></i>
                <?php
                    echo $resuut_select_post['time_post'];
                ?>
                </p>
            </div>
        </div>
        
        
    </div>


     <div class="container" id="comments" style="margin-top:200px;">   
    	<div class="row">
            <div class="col-sm-8" id="commentsDiv">   
                <form action="controllerForum.php" method="POST">
                	<h3 class="pull-left">New Comment</h3>
                	<button type="submit" id="submitButton" class="btn btn-normal pull-right" name="comment_post">Submit</button>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-3 col-lg-2 hidden-xs">
                            	<?php //user profile picture?>
                            </div>
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                <textarea class="form-control" name="msg_comment" id="message" placeholder="Your message" required=""></textarea>
                            </div>
                        </div>  	
                    </fieldset>
                </form>
                
                <?php
                    $sql_select_comment = "SELECT * FROM comment , users WHERE comment.id_post = '".$_GET['id']."' AND users.id = comment.id";
                    $query_select_comment = mysqli_query($connect,$sql_select_comment);
                    while($resuut_select_comment = mysqli_fetch_assoc($query_select_comment)){
                        
                ?>
                <!--<h3><?php //numbers of comments ?> Comments</h3>-->
                <?php //Show Comments here!                    
                     echo "<div class=\"media\">";
                     echo "<img src=\""; if(!empty($resuut_select_comment['avatar'])){
                        echo $resuut_select_comment['avatar'];
                    }
                    else{
                        echo "assets/images/user_icon_placeholder.png";  
                    }
                     echo "\" alt=\"profile img\" width=\"40px\" height=\"auto\" style=\"border-radius:100%\"> ".$resuut_select_comment['f_name']." ".$resuut_select_comment['l_name']; // replace with profile picture
                     echo "<div class=\"media-body\">";
                     echo "<h4 class=\"media-heading\"></h4>";
                     echo "<p>".$resuut_select_comment['msg_comment']."</p>"; // Comment content
                     echo "<ul class=\"list-unstyled list-inline media-detail pull-left\">";
                     echo "<li><i class=\"fa fa-calendar\"></i>".$resuut_select_comment['time_comment']."</li>"; // replace with timestamp
                     echo "</ul>";
                     echo "<ul class=\"list-unstyled list-inline media-detail pull-right\">";
                     if($resuut_select_commentt['id']==$_SESSION['user_id']||$_SESSION['user_status']==2||$resuut_select_post['id']==$_SESSION['user_id']){
                        if($resuut_select_post['id']==$_SESSION['user_id']){
                            echo "<li class=\"\"><a href=\"\" name=\"edit_comment\">Edit</a></li>"; // edit comment
                        }
                     echo "<li class=\"\"><a href=\"\" name=\"del_comment\">Delete</a></li>"; // delete comment
                     }
                     echo "</ul>";
                     echo "</div>";
                     echo "</div>";
                    }
                ?>

    </div>
    </div>
    </div>
</div>
</section>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
<script>
function myFunction(x) {
  x.classList.toggle("fa-thumbs-down");
}
function openPost(){
    document.getElementById("myForm").style.display = "block";
    document.getElementById("createPostButton").setAttribute("name","create_post");
    document.getElementById("createPostButton").textContent = "Post";
    document.getElementById("topic").value = "";
    document.getElementById("Edit forum content").textContent = "";
}
function closePost(){
    document.getElementById("myForm").style.display = "none";
}
function editPost(){
    document.getElementById("myForm").style.display = "block";
    document.getElementById("createPostButton").setAttribute("name","edit_post");
    document.getElementById("createPostButton").textContent = "Edit Post";
    var topic_head = document.getElementById("forum_topic_name").textContent;
    console.log(topic_head);
    document.getElementById("topic").value = topic_head;
    var txt = document.getElementById("posted_content").textContent;
    console.log(txt);
    document.getElementById("Edit forum content").textContent = txt;
}
</script>
</html>
<?php
    }
    else{
        header("location: index.php");
    }
?>
