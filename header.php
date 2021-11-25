<?php
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
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        <a class="navbar-brand" href="index.php" style="font-family: 'Roboto Mono', monospace;"><img src="./assets/images/logo.png" alt="" width="50px" height="50px"> K-DIT</a>
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
      </nav>
</body>