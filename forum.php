<?php
    require "dbconnect.php";
    require "header.php";
    error_reporting(0);
    if(isset($_SESSION['user_status']) && !empty($_SESSION['user_status'])){
?>
<title>Post | Website</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<section class="main frame" style="padding-top:100;">
<div class="container" style="margin-bottom:100px;">
    
    <div class="row" id="text-content" style="top:100px;width:100%;">
        <div class="row" style="margin-bottom:30px;">
            <div class="col-lg-6">
                <p class="forum_head">
                    <h1 class="forum_name">NAME</h1>
                </p>
            </div>
            
            <div class="col-lg-6" style="text-align:end;">
                
            </div>
        </div>
        <div class="content">
        For example, here are two grid layouts that apply to every device and viewport,
         from xs to xl. Add any number of unit-less classes for each breakpoint you need and every column will be the same width.
        </div>
        <div class="row">
            <div class="col-md-6">
                <i onclick="myFunction(this)" class="fa fa-thumbs-up" style="position:relative; "> Like</i>
                <p class="likeCount" name="like_post"></p>
            </div>
            <div class="col-md-6">
                <p class="creator" style="text-align:end;">
                By ABC on 1/1/1
                </p>
            </div>
        </div>
        
        
    </div>


     <div class="container" id="comments" style="margin-top:200px;">   
    	<div class="row">
            <div class="col-sm-8">   
                <form action="controllerForum.php" method="POST">
                	<h3 class="pull-left">New Comment</h3>
                	<button type="submit" id="submitButton" class="btn btn-normal pull-right" name="comment_post">Submit</button>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-3 col-lg-2 hidden-xs">
                            	<?php //user profile picture?>
                            </div>
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                <textarea class="form-control" name="msg_comment" id="message" placeholder="Your message" required=""></textarea>
                            </div>
                        </div>  	
                    </fieldset>
                </form>
                
                <!--<h3><?php //numbers of comments ?> Comments</h3>-->
    </div>
    </div>
    </div>


    <div class="form-popup aligns-items-center justify-content-center" id="myForm" style="z-index: 1000; position:absolute; background:white; width:50%; box-shadow:2px 2px 12px rgba(0,0,0,0.2); margin-top:100px; left:25%;">
    <form action="controllerForum.php" method="post" style="width:80%;padding-left:100px;">
        <div class="row">
            <label for="title_post">Topic</label>
            <input type="text" name="title_post" id="topic" placeholder="Topic">
        </div>
        <div class="row">
            <label for="msg_post">Content</label>
            <textarea name="msg_post" id="Edit forum content" cols="30" rows="10" placeholder="Write your content ..."></textarea>
        </div>
        
        <button type="submit" name="create_post">POST</button>
        <button type="button" onclick="closePost()">Cancel</button>
    </form>
    </div>
</div>
<button type="button" class="btn btn-primary" onclick="openPost()" style="position:fixed; right:20; bottom:20; width:100px; height:100px; border-radius:100%; font-size:40px;background:black;"> &plus; </button>
</section>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
<style>
.content{
padding:5%;
}
       
        #text-content{
width:80%;
height:330px;
background:#ffffff;
border-radius:20px;
box-shadow:2px 2px 12px rgba(0,0,0,0.2);
display: flex;
margin: -3%  auto 20px auto;
position: relative;
justify-content:space-evenly;
align-items: center;
        }
        .about-text{
width:500px;
        }
       .about-text p{
color:#3e3d3d;
font-family:calibri;
font-size:16px;
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
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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

.content-item {
    padding:30px 0;
	background-color:#FFFFFF;
}

.content-item.grey {
	background-color:#F0F0F0;
	padding:50px 0;
	height:100%;
}

.content-item h2 {
	font-weight:700;
	font-size:35px;
	line-height:45px;
	text-transform:uppercase;
	margin:20px 0;
}

.content-item h3 {
	font-weight:400;
	font-size:20px;
	color:#555555;
	margin:10px 0 15px;
	padding:0;
}

.content-headline {
	height:1px;
	text-align:center;
	margin:20px 0 70px;
}

.content-headline h2 {
	background-color:#FFFFFF;
	display:inline-block;
	margin:-20px auto 0;
	padding:0 20px;
}

.grey .content-headline h2 {
	background-color:#F0F0F0;
}

.content-headline h3 {
	font-size:14px;
	color:#AAAAAA;
	display:block;
}


#comments {
    box-shadow: 0 -1px 6px 1px rgba(0,0,0,0.1);
	background-color:#FFFFFF;
}

#comments form {
	margin-bottom:30px;
}

#submitButton{
	margin-top:7px;
    background: gray;
}

#comments form fieldset {
	clear:both;
}

#comments form textarea {
	height:100px;
}

#comments .media {
	border-top:1px dashed #DDDDDD;
	padding:20px 0;
	margin:0;
}

#comments .media > .pull-left {
    margin-right:20px;
}

#comments .media img {
	max-width:100px;
}

#comments .media h4 {
	margin:0 0 10px;
}

#comments .media h4 span {
	font-size:14px;
	float:right;
	color:#999999;
}

#comments .media p {
	margin-bottom:15px;
	text-align:justify;
}

#comments .media-detail {
	margin:0;
}

#comments .media-detail li {
	color:#AAAAAA;
	font-size:12px;
	padding-right: 10px;
	font-weight:600;
}

#comments .media-detail a:hover {
	text-decoration:underline;
}

#comments .media-detail li:last-child {
	padding-right:0;
}

#comments .media-detail li i {
	color:#666666;
	font-size:15px;
	margin-right:10px;
}

</style>
<script>
function myFunction(x) {
  x.classList.toggle("fa-thumbs-down");
}
function openPost(){
    document.getElementById("myForm").style.display = "block";
}
function closePost(){
    document.getElementById("myForm").style.display = "none";
}
</script>
</html>
<?php
    }
    else{
        header("location: index.php");
    }
?>
