<title>Home | Website</title>
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

    <link rel="stylesheet" href="css/index.css">
</head>
<?php           
    session_start(); 
    error_reporting(0);
    require "config.php";      
    if(!empty($_SESSION['user_status'])){
?>  
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">WEB NAME</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-auto justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" id="forum" href="forum.php">Forum</a>
              </li>
            </ul>
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
      </nav>
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
        <button type="submit" class="btn" name="google_login"><?php echo "<a href='".$gClient->createAuthUrl()."' class='loginG'>Login with Google</a>"; ?></button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">WEB NAME</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-auto justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" id="myForm" onclick="openForm()">Sign in</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
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

<section class="main frame" style="position: relative; top:100%;">
<div class="row">
    <div class="col-lg-6" style="background-color:yellow;">
      <p class="latest header">Latest</p>
    </div>
    <div class="col-lg-6" style="background-color:pink;">
    <p class="popularity header">popularity</p>
    </div>
</div>
</section>  
</body>
</html>
<script>
var openPopUp = false;
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

function closeForm() {
    document.getElementById("myForm").style.display = "none";
    openPopUp = false;
}
</script>

<script src="js/main.js"></script>
<script type="module" src="js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.js'></script>
<script src='https://threejs.org/examples/js/controls/TrackballControls.js'></script>
<script src='https://mamboleoo.be/learnThree/demos/OBJLoader.js'></script>