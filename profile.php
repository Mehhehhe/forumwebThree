<?php
    require "dbconnect.php"; 
    require "header.php";
    //error_reporting(0);
    if(isset($_SESSION['user_status']) && !empty($_SESSION['user_status'])){
?>
<title>Profile | Website</title>
<link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="css/post.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
<body>  
<section class="main frame" style="padding-top:100;">
<div class="container boxdiv" id="boxdiv" style="background-color:transparent;box-shadow: 0px 8px 60px 0px red;">
    <div class="Profile_head"><p class="Profile_Title" style="font-family: 'Roboto Mono', monospace;color:white;">My Profile</p></div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-3">
            <div class="row" style="font-family: 'Roboto Mono', monospace; color:white;">
                <?php
                    echo "<img src=\""; if(!empty($_SESSION['user_picture'])){
                        echo $_SESSION['user_picture'];
                    }
                    else{
                        echo "assets/images/user_icon_placeholder.png";  
                    }
                    echo "\" alt=\"profile img\" width=\"150px\" height=\"auto\" style=\"border-radius:100%\">";
                ?>
            </div>           
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <div class="row" style="color:white">                
                <div class="row">
                    <div class="col-lg-9" style="margin-top:20px;">
                        <p class="user">Username</p>
                        <?php
                            echo "<input type=\"text\" value=\"";
                            echo $_SESSION['user_email_name'];
                            echo "\" name=\"usernameBox\" id=\"usernameBox\" disabled=\"disabled\">";
                        ?>
                        <!-- <input type="text" placeholder="test" name="usernameBox" id="usernameBox" disabled="disabled"> -->
                    </div>
                </div>                
                <!-- <p class="id">ID</p> -->
                <div class="row">
                    <div class="col-lg-9" style="margin-top:10px;">
                        <p class="user">Email<span class="transCT">-----</span></p>
                        <?php
                            echo "<input type=\"text\" value=\"";
                            echo $_SESSION['user_email'];
                            echo "\" name=\"useremailBox\" id=\"useremailBox\" disabled=\"disabled\">";
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9" style="margin-top:10px;">
                        <p class="user">Firstname</p>
                        <?php
                            echo "<input type=\"text\" value=\"";
                            echo $_SESSION['user_first_name'];
                            echo "\" name=\"useremailBox\" id=\"useremailBox\" disabled=\"disabled\">";
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9" style="margin-top:10px;">
                        <p class="user">Lastname</p>
                        <?php
                            echo "<input type=\"text\" value=\"";
                            echo $_SESSION['user_last_name'];
                            echo "\" name=\"useremailBox\" id=\"useremailBox\" disabled=\"disabled\">";
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9" style="margin-top:10px;">
                        <p class="user">Status<span class="transCT">----</span></p>
                        <?php
                            echo "<input type=\"text\" value=\"";
                            if($_SESSION['user_status']==2){
                                echo "admin";
                            }
                            else{
                                echo "user";
                            }
                            echo "\" name=\"useremailBox\" id=\"useremailBox\" disabled=\"disabled\">";
                        ?>
                    </div>
                </div>
                <div class="btn_edit">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCenter"">Edit Profile</button>
                </div>
                
                </div>
                
                    <div class="col-lg-4">
                        <div class="container ">
                        
                        <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLongTitle">Edit Profile</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_edit" name="form_edit" action="controllerProfile.php" method="post">
                                            <div class="form-group">
                                                <label for="f_name">Firstname</label>
                                                <?php
                                                    echo "<input type=\"text\" class=\"form-control\" id=\"username\"";
                                                    echo " placeholder=\"".$_SESSION['user_first_name']."\"";
                                                    echo " name=\"firstname\" required>";
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="l_name">Surname</label>
                                                <?php
                                                    echo "<input type=\"text\" class=\"form-control\" id=\"lastname\"";
                                                    echo " placeholder=\"".$_SESSION['user_last_name']."\"";
                                                    echo " name=\"lastname\" required>";
                                                ?>
                                            </div>
                                            <?php
                                               if($_SESSION['user_status']!=1) {
                                            ?>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <?php
                                                    echo "<input type=\"password\" class=\"form-control\" id=\"password\"";
                                                    echo " placeholder=\"**********\"";
                                                    echo " name=\"password\" required>";
                                                ?>
                                            </div>
                                            <?php
                                               }
                                            ?>
                                            <div style="margin-top: 1rem;">
                                            <button type="submit" name="change_name" id="submitbn" data-dismiss="modal" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- <p class="email">EMAIL</p> -->
            </div>            
        
        </div>
    </div>   
</div>
</section>  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
</body>

</html>
<?php 
        if($_GET['error']==1){
            echo '<script type="text/javascript">';
            echo ' alert("Change Profile Complete!!"); ';  //not showing an alert box.
            echo '</script>';
        }
        else if ($_GET['error']==2){
            echo '<script type="text/javascript">';
            echo ' alert("Change Profile Fail!!"); ';  //not showing an alert box.
            echo '</script>';
        }   
    }
    else{
        header("location: index.php");
    }
?>