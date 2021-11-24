<?php
    require "dbconnect.php";
    require "header.php";
    error_reporting(0);
    if(isset($_SESSION['user_status']) && !empty($_SESSION['user_status'])){
?>
<title>Post | Website</title>
<body>
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
</html>
<?php
    }
    else{
        header("location: index.php");
    }
?>
