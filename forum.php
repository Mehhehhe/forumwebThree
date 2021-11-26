<?php
    require "dbconnect.php";
    require "header.php";
    error_reporting(0);
    if(isset($_SESSION['user_status']) && !empty($_SESSION['user_status'])&& isset($_GET['id'])){
?>
<title>Post | Website</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/post.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
<style>
  body.BG_image{
    background-color: black; 
    background-repeat: no-repeat;
    background-size: auto;
    background-attachment: fixed;
    background-position: center;
}
</style>
<body class="BG_image">
<section class="main frame" style="padding-top:100;">
<div class="container" style="margin-bottom:100px;">
    
    <?php
          $sql_select_post = "SELECT * FROM post ,users WHERE id_post = '".$_GET['id']."'AND users.id = post.id"; 
          $resuut_select_post = $dbo->query("$sql_select_post")->fetch();      
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
                <div class="btn_edit">
                     <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCenter" style="background:green; border: none;">Edit</button>
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaldel1" style="background:#ff0000; border: none;">Delete</button>
                </div>
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
            <p class="likeCount" name="like_post">               
                
                <?php 
                    echo "<b> Create By : ".$resuut_select_post['f_name']." ".$resuut_select_post['l_name']."</b>";      
                    ?>             
                    </p>
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


     <div class="container" id="comments" style="margin-top:200px;border-radius:20px;width:100%;">   
    	<div class="row" style="width:100%;">
            <div class="col-sm-8" id="commentsDiv">   
                <form action="controllerForum.php" method="POST" style="width:100%;">
                	<h3 class="pull-left" style="padding-top:20px;padding:20px;font-family: 'Roboto Mono', monospace;">New Comment</h3>
                	<button type="submit" id="submitButton" class="btn btn-normal pull-right" name="comment_post" style="margin-top:20px;color:white;">Submit</button>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-3 col-lg-2 hidden-xs">
                                <?php
                                    echo "<input type=\"hidden\" name=\"id_post\" value=\"";
                                    echo $_GET['id'];
                                    echo "\">";
                                ?>
                            	<?php echo "<img src=\""; if(!empty($_SESSION['user_picture'])){
                                    echo $_SESSION['user_picture'];
                                }
                                else{
                                    echo "assets/images/user_icon_placeholder.png";  
                                }
                                
                                echo "\" alt=\"profile img\" width=\"90px\" height=\"auto\" style=\"border-radius:100%\"> ".$resuut_select_comment['f_name']." ".$resuut_select_comment['l_name']; // replace with profile picture
                                ?>
                            </div>
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                <textarea class="form-control" name="msg_comment" id="message" placeholder="Your message" required="" style="width:100%;"></textarea>
                            </div>
                        </div>  	
                    </fieldset>
                </form>
                
                <?php
                    $sql_select_comment = "SELECT * FROM comment , users WHERE comment.id_post = '".$_GET['id']."' AND users.id = comment.id";                    
                    $query_select_comment = $dbo->query("$sql_select_comment")->fetchAll();                    
                    foreach ($query_select_comment as $resuut_select_comment) {
                        
                ?>
                <!--<h3><?php //numbers of comments ?> Comments</h3>-->
                <?php //Show Comments here!                    
                     echo "<div class=\"media\">";
                     echo "<ul class=\"list-unstyled list-inline media-detail pull-right\">";
                     if($resuut_select_post['id']==$_SESSION['user_id']&&$resuut_select_comment['id']!=$_SESSION['user_id']&&$_SESSION['user_status']!=2){
                         ?>
                         <div class="btn_edit">
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCenter2"">Edit</button>
                        </div>                              
                          <?php
                          }
                        if($resuut_select_comment['id']==$_SESSION['user_id']||$_SESSION['user_status']==2){
                            ?>         
                            <div class="btn_edit">                   
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCenter2"">Edit</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaldel2" style="background:#ff0000; border: none;">Delete</button>
                            </div>
                        <?php
                        }                                                   
                                           
                     
                     echo "</ul>";
                     echo "<img src=\""; if(!empty($resuut_select_comment['avatar'])){
                        echo $resuut_select_comment['avatar'];
                    }
                    else{
                        echo "assets/images/user_icon_placeholder.png";  
                    }
                    
                     echo "\" alt=\"profile img\" width=\"40px\" height=\"auto\" style=\"border-radius:100%\"> <b>".$resuut_select_comment['f_name']." ".$resuut_select_comment['l_name']."</b>"; // replace with profile picture
                     echo "<div class=\"media-body\">";
                     echo "<h4 class=\"media-heading\"></h4>";                     
                     echo "<p>".$resuut_select_comment['msg_comment']."</p>"; // Comment content
                     echo "<ul class=\"list-unstyled list-inline media-detail pull-left\">";
                     echo "<li style=\"color: rgb(54, 54, 54);\"><i class=\"fa fa-calendar\"></i>".$resuut_select_comment['time_comment']."</li>"; // replace with timestamp
                     echo "</ul>";                     
                     echo "</div>";
                     echo "</div>";
                     ?>
                     <div class="container ">
                        
                        <div class="modal fade" id="modalCenter2" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLongTitle">Edit Comment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit_comment" name="edit_comment" action="controllerForum.php" method="post">

                                        <div class="form-group">
                                                <?php
                                                    echo "<input type=\"hidden\" name=\"id_comment\" value=\"";
                                                    echo $resuut_select_comment['id_comment'];
                                                    echo "\">";
                                                ?>
                                                </div>
                                            <div class="form-group">
                                                <label for="l_name">Content</label>                            
                                                <div>
                                                <textarea name="msg_comment" id="Edit forum content" cols="60" rows="10" placeholder="Write your content ..." required></textarea>
                                                </div>                                                
                                            </div>                                                                                       
                                            <div style="margin-top: 1rem;">
                                            <button type="submit" name="edit_comment" id="submitbn" data-dismiss="modal" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        <div class="modal fade " id="modaldel2" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modaldel2" aria-hidden="true">
                            <div class=" modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLongTitle">Delete Comment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">   
                                    <form id="del_comment" name="del_comment" action="controllerForum.php" method="post">
                                            <div class="form-group">                                                
                                                <?php
                                                    echo "<input type=\"hidden\" name=\"id_comment\" value=\"";
                                                    echo $resuut_select_comment['id_comment'];
                                                    echo "\">";
                                                ?>
                                            </div>                                           
                                                                           
                                        <div class="row">    
                                            <div class=" col-lg-1 col-sm-1"></div>
                                            <div class=" col-lg-1 col-sm-1" style="margin-top: 1rem;">
                                                <button type="submit" name="del_comment" id="submitbn" data-dismiss="modal" class="btn btn-success">Yes</button>
                          
                                            </div>          
                                            <div class=" col-lg-7 col-sm-7"></div>                              
                                            <div class=" col-lg-1 col-sm-1" style="margin-top: 1rem;">                                                
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>                                                
                                            </div>                                            
                                        </div>
                                    </form> 
                                    </div>
                                </div>
                            </div>
                        </div> 
                     <?php
                    }
                ?>

    </div>
    </div>
    </div>
</div>

<div class="col-lg-4">
                        <div class="container ">
                        
                        <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLongTitle">Edit Post</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit_post" name="edit_post" action="controllerForum.php" method="post">

                                        <div class="form-group">
                                                <?php
                                                    echo "<input type=\"hidden\" name=\"id_post\" value=\"";
                                                    echo $_GET['id'];
                                                    echo "\">";
                                                ?>
                                                <label for="f_name">Title</label>
                                                    <input type="text" class="form-control" id="username" placeholder="topic" name="title_post" required> 
                                            </div>
                                            <div class="form-group">
                                                <label for="l_name">Content</label>                            
                                                <div>
                                                <textarea name="msg_post" id="Edit forum content" cols="60" rows="10" placeholder="Write your content ..." required></textarea>
                                                </div>                                                
                                            </div>                                                                                       
                                            <div style="margin-top: 1rem;">
                                            <button type="submit" name="edit_post" id="submitbn" data-dismiss="modal" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        <div class="modal fade " id="modaldel1" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modaldel1" aria-hidden="true">
                            <div class=" modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLongTitle">Delete Post</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">   
                                    <form id="del_post" name="del_post" action="controllerForum.php" method="post">
                                            <div class="form-group">                                                
                                                <?php
                                                    echo "<input type=\"hidden\" name=\"id_post\" value=\"";
                                                    echo $_GET['id'];
                                                    echo "\">";
                                                ?>
                                            </div>                                           
                                                                           
                                        <div class="row">    
                                            <div class=" col-lg-1 col-sm-1"></div>
                                            <div class=" col-lg-1 col-sm-1" style="margin-top: 1rem;">
                                                <button type="submit" name="del_post" id="submitbn" data-dismiss="modal" class="btn btn-success">Yes</button>
                          
                                            </div>          
                                            <div class=" col-lg-7 col-sm-7"></div>                              
                                            <div class=" col-lg-1 col-sm-1" style="margin-top: 1rem;">                                                
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>                                                
                                            </div>                                            
                                        </div>
                                    </form> 
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