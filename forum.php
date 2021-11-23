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
        <div class="col-lg-6" style="margin-bottom:30px;">
            <p class="forum_head">
                <h1 class="forum_name">NAME</h1>
            </p>
        </div>
        
        <div class="col-lg-6" style="text-align:end;">
            <p class="creator">
                By ABC
            </p>
            <p class="date">
                1/1/1
            </p>
        </div>
    </div>
    <div class="row">
        <div class="content">
        For example, here are two grid layouts that apply to every device and viewport,
         from xs to xl. Add any number of unit-less classes for each breakpoint you need and every column will be the same width.
        </div>
        <button onclick="" style="width:100px; margin-top: 30px; margin-left:auto; float:right; ">Like</button>
    </div>
    <div class="row" style="margin-top:30px;">
        <div class="reply">
            <div class="row">
                <div class="col-lg-10">
                    <input type="text" class="replyBox" style="width:100%;">
                </div>
                <div class="col-lg-2">
                    <button style="margin-left:auto; float:right;">Send</button>
                </div> 
            </div>
        </div>
    </div>
</div>

</section>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
<script>
    // ### SEND
    //conditon check sign in
    //then pop log in 
    </script>
</html>
<?php
    }
    else{
        header("location: index.php");
    }
?>