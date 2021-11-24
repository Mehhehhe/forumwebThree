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
    <link rel="icon" href="images/icon.jpg" type="image/x-icon">
    <!-- specifying a webpage icon for web clip -->
    <link rel="apple-touch-icon" href="images/icon.jpg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/post.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php          
    require "config.php";      
    if(!empty($_SESSION['user_status'])){
?>  
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >

        <div class="container">
          <a class="navbar-brand" href="#">เรด-DIT</a>
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
        <button type="button" class="btn btn-primary" onclick="openPost()" style="position:fixed; right:20; bottom:20; width:100px; height:100px; border-radius:100%; font-size:40px;background:black;"> &plus; </button>
        <div class="form-popup aligns-items-center justify-content-center" id="myForm" style="z-index: 1000; position:absolute; background:white; width:50%; box-shadow:2px 2px 12px rgba(0,0,0,0.2); margin-top:100px; left:25%;">
      <form action="controllerForum.php" method="post" style="width:80%;padding-left:100px;">
          <div class="row">
              <label for="title_post">Topic</label>
              <input type="text" name="title_post" id="topic" placeholder="Topic">
          </div>
          <div class="row">
              <label for="msg_post">Content</label>
              <textarea name="msg_post" id="Edit forum content" cols="30" rows="10" placeholder="Write your content ..."></textarea>
          </div>
          
          <button type="submit" id="createPostButton" name="create_post">POST</button>
          <button type="button" onclick="closePost()">Cancel</button>
      </form>
      </div>
      </nav>
      <section class="main frame" style="padding-top:100;">
      <div class="container" style="margin-bottom:100px;">
      <div class="row">
        <p class="latest header" style="font-size: 36px; dashed black; text-align: center; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">Latest</p>
      </div>

      <?php
          $sql_select_post = "SELECT * FROM post ORDER BY time_post DESC";
          $query_select_post = mysqli_query($connect,$sql_select_post);
          while($resuut_select_post = mysqli_fetch_assoc($query_select_post)){

          
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
        </div>
        <div class="content" id="posted_content">
        <?php
            echo $resuut_select_post['msg_post'];
        ?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <i class="fa fa-thumbs-up" style="position:relative; "> <?php
                          echo $resuut_select_post['like_post'];
                      ?></i>
                <p class="likeCount" name="like_post"></p>
            </div>
            <div class="col-md-6">
                <p class="creator" style="text-align:end;">
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
      </section>  
<?php           
    }
    else{
?>  
<body>
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
          <a class="navbar-brand" href="index.php">เรด-DIT</a>
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
</body>
</html>

<script src="js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.js'></script>
<script src='https://threejs.org/examples/js/controls/TrackballControls.js'></script>
<script src='https://mamboleoo.be/learnThree/demos/OBJLoader.js'></script>
    <script>
      function closeForm() {
          document.getElementById("myForm").style.display = "none";
      }
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
