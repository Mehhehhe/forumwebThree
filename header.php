<?php
session_start();
error_reporting(-1);
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
</head>
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
</body>
<style>
.dropbtn {
    background-color: transparent;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {background-color: #ddd;}

  .dropdown:hover .dropdown-content {display: block;}

  .dropdown:hover .dropbtn {background-color: red;}
.navbar-nav{
    cursor: pointer;
}
</style>