<title>Home | Website</title>
<?php
      
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
</head>
<?php          
    require "config.php";      
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
          <a class="navbar-brand" href="index.php" style="font-family: 'Roboto Mono', monospace;">K-DIT</a>
        </div>
      </nav>
      <script type="module" src="js/index.js"></script>      
<?php         
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
      function closeForm() {
          document.getElementById("myForm").style.display = "none";
      }
      function myFunction(x) {
          x.classList.toggle("fa-thumbs-down");
      }      
    </script>
</html>
