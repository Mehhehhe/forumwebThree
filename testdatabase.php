<?php
    require "dbconnect.php";     
    error_reporting(-1);   
    $query = "SELECT * FROM users WHERE email = 'admin' AND password = '21232f297a57a5a743894a0e4a801fc3' ";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result); 
?>
<title>Profile | Website</title>
<body>  
<section class="main frame" style="padding-top:100;">
<div class="container">
    <div class="row">
        <div class="col-lg-3">
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
                            echo $row['f_name'];
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
                            echo $row['l_name'];
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
                            echo $row['status'];
                            echo "\" name=\"useremailBox\" id=\"useremailBox\" disabled=\"disabled\">";
                        ?>
                        <!-- <input type="text" placeholder="test" name="usernameBox" id="usernameBox" disabled="disabled"> -->
                    </div>
                    <?php

                    ?>
                    <div class="col-lg-4">
                        <div class="container">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"">Edit Profile</button>
                        <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLongTitle">Edit Profile</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_edit" name="form_edit" method="update" action="update.php">
                                            <div class="form-group">
                                                <label for="f_name">Username</label>
                                                <?php
                                                    echo "<input type=\"text\" class=\"form-control\" id=\"username\"";
                                                   
                                                    echo " name=\"username\" required>";
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="l_name">Surname</label>
                                                <?php
                                                    echo "<input type=\"text\" class=\"form-control\" id=\"lastname\"";
                                                    
                                                    echo " name=\"lastname\" required>";
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <?php
                                                    echo "<input type=\"password\" class=\"form-control\" id=\"password\"";
                                                    echo " placeholder=\"**********\"";
                                                    echo " name=\"password\" required>";
                                                ?>
                                            </div>
                                            <div style="margin-top: 1rem;">
                                            <button type="submit" name="submitbn" id="submitbn" data-dismiss="modal" class="btn btn-success">Submit</button>
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
            <div class="row">
                <h2 class="profile_head">About me</h2>
                <textarea name="about" id="about" cols="10" rows="5" disabled="disabled" style="resize:none;width:500px;"></textarea>
            </div>
        </div>
    </div>   
</div>
</section>  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
<script>

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

?>