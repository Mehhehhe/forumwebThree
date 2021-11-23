<?php
    require "dbconnect.php";
    session_start();
    if(isset($_SESSION['status']) && !empty($_SESSION['status'])){
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Sushi Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">WEB NAME</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" id="username" href="#"></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<section class="main frame" style="padding-top:100;">
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="row">
                <img src="./assets/images/614695-middle.png" alt="profile img" width="100px" height="300px" style="border-radius:100%;">
            </div>
            <div class="row" style="margin-top:30px;">
                <h3 style="text-align:center;">Forum Lists</h3>
                <textarea name="forum_lists" id="forum_lists" cols="10" rows="3" disabled="disabled" style="resize:none;"></textarea>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-8">
            <div class="row">
                <div class="row">
                    <div class="col-lg-3">
                        <p class="user">Username </p>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" name="usernameBox" id="usernameBox" disabled="disabled">
                    </div>
                </div>
                
                <p class="id">ID</p>
                <p class="email">EMAIL</p>
            </div>
            <div class="row">
                <h2 class="profile_head">About me</h2>
                <textarea name="about" id="about" cols="10" rows="5" disabled="disabled" style="resize:none;"></textarea>
                <div class="row" style="margin-top:30px;">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-4" style="align-items:right;">
                        <button onclick="">Edit</button>
                        <button type="submit" style="margin-left:30px;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
</section>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php
    }
    else{
        header("location: index.php");
    }
?>