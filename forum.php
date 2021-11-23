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
                  <img src="./assets/images/user_icon_placeholder.png" alt="" width="20px" height="20px" style="border-radius:100%;">
                </button>
                <div class="dropdown-content">
                  <a href="profile.php">Profile</a>
                  <a href="javascript:void(0)">Log Out</a>
                </div>
              </div>
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

<style>
    body{
        margin: 0;
        overflow-x: hidden;
    }
    {box-sizing: border-box;}
    
    canvas{
      background: transparent;
    }

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
      background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
      display: none;
      position: fixed;
      top: 75;
      right: 15px;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
      z-index: 1001;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
      z-index: 1001;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #04AA6D;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
      opacity: 1;
    }

    a.loginG ,a.loginG:hover ,a.loginG:visited{
        color : white;
        text-decoration: none;

    }
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
</style>
</html>