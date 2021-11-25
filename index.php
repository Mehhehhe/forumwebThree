<title>Home | Website</title>
<?php
    require "dbconnect.php";
    session_start();        
    error_reporting(0);
?>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- add icon link -->
    <link rel="icon" href="./assets/images/logo.png" type="image/x-icon">
    <!-- specifying a webpage icon for web clip -->
    <link rel="apple-touch-icon" href="./assets/images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/post.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
<style>
  body.BG_image{
    background-image: url("./assets/images/pawel-czerwinski-d5TBzrddHMk-unsplash.jpg") !important; 
    background-repeat: no-repeat;
    background-size: auto;
    background-attachment: fixed;
    background-position: center;
}
</style>
</head>

<?php          
    require "config.php";      
    if(!empty($_SESSION['user_status'])){
?>  
<body class="BG_image">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >

        <div class="container">          
          <a class="navbar-brand" href="#" style="font-family: 'Roboto Mono', monospace;"><img src="./assets/images/logo.png" alt="" width="50px" height="50px"> K-DIT</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-auto justify-content-end" id="navbarSupportedContent">            
            <ul class="navbar-nav">
              <li class="nav-item">
              <div class="dropdown">
                <button class="dropbtn">
                  <img src="<?php if(!empty($_SESSION['user_picture'])){
                      echo $_SESSION['user_picture'];
                  }
                  else{
                      echo "assets/images/user_icon_placeholder.png";  
                  }
                  ?>
                    " alt="" width="30px" height="30px" style="border-radius:100%;">
                  <?php
                      echo $_SESSION['user_email_name'];
                  ?>
                </button>
                <div class="dropdown-content">
                  <a href="profile.php">Profile</a>
                  <a href="logout.php">Log Out</a>
                </div>
              </div>
              </li>
            </ul>
            
          </div>
        </div>
      <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCenter" style="position:fixed; right:20; bottom:20; width:100px; height:100px; border-radius:100%; font-size:40px;background:black;"> &plus;</button>
     
      </div>
      </nav>
      <section class="main frame" style="padding-top:100;">
      <div class="container" style="margin-bottom:100px;">
      <div class="row">
        <p class="latest header" style="font-size: 36px; dashed black; text-align: center; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); color: white;">Latest</p>
      </div>

      <?php
          $sql_select_post = "SELECT * FROM post,users WHERE users.id = post.id ORDER BY time_post DESC";
          $query_select_post = $dbo->query("$sql_select_post")->fetchAll();          
          foreach ($query_select_post as $resuut_select_post) {                          
      ?>
    
    <a href="forum.php?id=<?php echo $resuut_select_post['id_post'];?>" style="text-decoration: none; cursor: pointer; color: black;">
      <div class="row" id="text-content" style="top:50px;width:100%;">
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
                       
            <div class="col-lg-6" style="text-align:end;">
                    <?php                     
                    echo "<img src=\""; if(!empty($resuut_select_post['avatar'])){
                        echo $resuut_select_post['avatar'];
                    }
                    else{
                        echo "assets/images/user_icon_placeholder.png";  
                    }
                    
                    echo "\" alt=\"profile img\" width=\"90px\" height=\"auto\" style=\"border-radius:100%\"> ".$resuut_select_comment['f_name']." ".$resuut_select_comment['l_name']; // replace with profile picture              
                    ?>
                </div>
           
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
      </a>
      <br><br>
      <?php
          }
      ?>
      <div class="col-lg-4">
    <div class="container ">
    
    <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLongTitle">Create post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_edit" name="form_edit" action="controllerForum.php" method="post">
                        <div class="form-group">
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
                        <button type="submit" name="create_post" id="submitbn" data-dismiss="modal" class="btn btn-success">Submit</button>
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
      
<?php           
    }
    else{
?>  
<body>  
  <div class="welcome" style="position:absolute; width:50%; height:300px; margin-top:10%; padding-left:200px;font-family: 'Roboto Mono', monospace;color:white;">
    <div class="row">
      <p style="font-size:58px;">Welcome to</p><br>
      <p style="font-size:64px;">the COMMUNITY</p>
    </div>
    <div class="row" style="font-size:36px;">
    <br><br><p>Question to<br>Unquestionable</p>
    </div>
  </div>
    <div class="form-popup" id="myForm" style="z-index: 1000;">
    <form action="login.php" class="form-container" method="POST">
        <h1>Login</h1>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" class="btn" name="user_login">Login</button>
        <a href="<?php echo $gClient->createAuthUrl();?>#" class="google btn btngg" style="background-color: #dd4b39; color: white ;"><i class="fa fa-google fa-fw">
          </i> Login with Google+
        </a>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
        <div class="container">        
          <a class="navbar-brand" href="#" style="font-family: 'Roboto Mono', monospace;"><img src="./assets/images/logo.png" alt="" width="50px" height="50px"> K-DIT</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-auto justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav" style="cursor: pointer;">
              <li class="nav-item">
                <a class="nav-link" id="myForm" onclick="openForm()">Sign In</a>
              </li>
            </ul>            
          </div>
        </div>        
      </nav>
      <script type="module" src="js/index.js"></script>      
<?php         
    }
    if($_GET['error']==1){
      echo '<script type="text/javascript">';
      echo ' alert("Login Complete!!"); ';  //not showing an alert box.
      echo '</script>';
    }
    else if ($_GET['error']==2){
        echo '<script type="text/javascript">';
        echo ' alert("Login Fail!!"); ';  //not showing an alert box.
        echo '</script>';
    }
  
?>  
<div class="waveWrapper waveAnimation">
  <div class="waveWrapperInner bgTop">

  </div>
  <div class="waveWrapperInner bgMiddle">

  </div>
  <div class="waveWrapperInner bgBottom">
    
  </div>
</div> 
</body>

</html>

<script src="js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.js'></script>
<script src='https://threejs.org/examples/js/controls/TrackballControls.js'></script>
<script src='https://mamboleoo.be/learnThree/demos/OBJLoader.js'></script>
    <script>
      var openPopUp = false;
      function closeForm() {
          document.getElementById("myForm").style.display = "none";
          openPopUp = false;
      }
      function openForm() {
        
        if(openPopUp == true){
          document.getElementById("myForm").style.display = "none";
          openPopUp = false;
        }
        else{
          document.getElementById("myForm").style.display = "block";
          openPopUp = true;
        }  
      }
      function myFunction(x) {
          x.classList.toggle("fa-thumbs-down");
      }      
    </script>    
</html>
