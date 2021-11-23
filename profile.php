<?php
    require "dbconnect.php"; 
    require "header.php";
    error_reporting(0); 
    if(isset($_SESSION['user_status']) && !empty($_SESSION['user_status'])){
?>
<title>Profile | Website</title>
<body>  
<section class="main frame" style="padding-top:100;">
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="row">
                <?php
                    echo "<img src=\"./assets/profile/".$_SESSION['user_picture'].".jpg\" alt=\"profile img\" width=\"100px\" height=\"300px\" style=\"border-radius:100%;\">"
                ?>
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
                        <p class="user">Username</p>
                    </div>
                    <div class="col-lg-9">
                        <?php
                            echo "<input type=\"text\" placeholder=\"";
                            echo $_SESSION['user_first_name'];
                            echo "\" name=\"usernameBox\" id=\"usernameBox\" disabled=\"disabled\">";
                        ?>
                        <!-- <input type="text" placeholder="test" name="usernameBox" id="usernameBox" disabled="disabled"> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <p class="user">ID</p>
                    </div>
                    <div class="col-lg-9">
                        <?php
                            echo "<input type=\"text\" placeholder=\"";
                            echo $_SESSION['user_id'];
                            echo "\" name=\"useridBox\" id=\"useridBox\" disabled=\"disabled\">";
                        ?>
                        <!-- <input type="text" placeholder="test" name="usernameBox" id="usernameBox" disabled="disabled"> -->
                    </div>
                </div>
                <!-- <p class="id">ID</p> -->
                <div class="row">
                    <div class="col-lg-3">
                        <p class="user">EMAIL</p>
                    </div>
                    <div class="col-lg-9">
                        <?php
                            echo "<input type=\"text\" placeholder=\"";
                            echo $_SESSION['user_email'];
                            echo "\" name=\"useremailBox\" id=\"useremailBox\" disabled=\"disabled\">";
                        ?>
                        <!-- <input type="text" placeholder="test" name="usernameBox" id="usernameBox" disabled="disabled"> -->
                    </div>
                </div>
                <!-- <p class="email">EMAIL</p> -->
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
