<?php
    require "dbconnect.php";
    require "header.php";
    //error_reporting(0);
    if(isset($_SESSION['user_status']) && !empty($_SESSION['user_status'])&& isset($_GET['id'])){
?>
<title>Post | Website</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/post.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
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
                <div class="btn_edit">
                     <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCenter" style="background:green; border: none;">Edit</button>
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal2" data-bs-target="#modalCenter" style="background:#ff0000; border: none;">Delete</button>
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


     <div class="container" id="comments" style="margin-top:200px;border-radius:20px;width:100%;">   
    	<div class="row" style="width:100%;">
            <div class="col-sm-8" id="commentsDiv">   
                <form action="controllerForum.php" method="POST" style="width:100%;">
                	<h3 class="pull-left" style="padding-top:20px;padding:20px;font-family: 'Roboto Mono', monospace;">New Comment</h3>
                	<button type="submit" id="submitButton" class="btn btn-normal pull-right" name="comment_post" style="margin-top:20px;color:white;">Submit</button>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-3 col-lg-2 hidden-xs">
                            	<?php echo "<img src=\""; if(!empty($resuut_select_post['avatar'])){
                                    echo $resuut_select_post['avatar'];
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
                    $query_select_comment = mysqli_query($connect,$sql_select_comment);
                    while($resuut_select_comment = mysqli_fetch_assoc($query_select_comment)){
                        
                ?>
                <!--<h3><?php //numbers of comments ?> Comments</h3>-->
                <?php //Show Comments here!                    
                     echo "<div class=\"media\">";
                     echo "<ul class=\"list-unstyled list-inline media-detail pull-right\">";
                     if($resuut_select_commentt['id']==$_SESSION['user_id']||$_SESSION['user_status']==2||$resuut_select_post['id']==$_SESSION['user_id']){
                        if($resuut_select_post['id']==$_SESSION['user_id']){
                            ?>
                            <div class="btn_edit">
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCenter"">Edit</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal2" data-bs-target="#modalCenter" style="background:#ff0000; border: none;">Delete</button>
                            </div>
                            <?php
                        }                     
                     }
                     echo "</ul>";
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
                     echo "</div>";
                     echo "</div>";
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
                                        <h5 class="modal-title" id="modalLongTitle">Edit Profile</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_edit" name="form_edit" action="controllerProfile.php" method="post">
                                            <div class="form-group">
                                                <label for="f_name">Firstname</label>
                                                <?php
                                                    echo "<input type=\"text\" class=\"form-control\" id=\"username\"";
                                                    echo " placeholder=\"".$_SESSION['user_first_name']."\"";
                                                    echo " name=\"firstname\" required>";
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="l_name">Surname</label>
                                                <?php
                                                    echo "<input type=\"text\" class=\"form-control\" id=\"lastname\"";
                                                    echo " placeholder=\"".$_SESSION['user_last_name']."\"";
                                                    echo " name=\"lastname\" required>";
                                                ?>
                                            </div>
                                            <?php
                                               if($_SESSION['user_status']!=1) {
                                            ?>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <?php
                                                    echo "<input type=\"password\" class=\"form-control\" id=\"password\"";
                                                    echo " placeholder=\"**********\"";
                                                    echo " name=\"password\" required>";
                                                ?>
                                            </div>
                                            <?php
                                               }
                                            ?>
                                            <div style="margin-top: 1rem;">
                                            <button type="submit" name="change_name" id="submitbn" data-dismiss="modal" class="btn btn-success">Submit</button>
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
</section> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <div class="waveWrapper waveAnimation">
  <div class="waveWrapperInner bgTop">
    <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
  </div>
  <div class="waveWrapperInner bgMiddle">
    <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
  </div>
  <div class="waveWrapperInner bgBottom">
    <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  </div>
</div>   
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