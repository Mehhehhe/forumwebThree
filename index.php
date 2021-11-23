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
<div class="form-popup" id="myForm" style="z-index: 1000;">
  <form action="login.php" class="form-container" method="POST">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn" name="user_login">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>



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




<section class="main frame" style="position: relative; top:100%;">
<div class="row">
    <div class="col-lg-6" style="background-color:yellow;">
      <p class="latest header">Latest</p>
    </div>
    <div class="col-lg-6" style="background-color:pink;">
    <p class="popularity header">popularity</p>
    </div>
</div>

</section>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.js'></script>
    <script src='https://threejs.org/examples/js/controls/TrackballControls.js'></script>
    <script src='https://mamboleoo.be/learnThree/demos/OBJLoader.js'></script>
    <script type="module">
        import {OrbitControls} from 'https://cdn.skypack.dev/@three-ts/orbit-controls';
        import {GLTFLoader} from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js';

        let scene, camera, renderer, controls, cube;
        const objLoader = new THREE.OBJLoader();
        const gltfLoader = new GLTFLoader();
        var light, mesh,temp;
        var openPopUp = false;
        var objects = [];
        var canvasBounds;
        var mouse = new THREE.Vector2();

        function init() {
                // scene
            scene = new THREE.Scene();
            // camera
            camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, .1, 1000);
            // renderer
            const sizes = {
                width: window.innerWidth,
                height: window.innerHeight,
            }
            renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
            renderer.setSize(sizes.width, sizes.height);
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.domElement.setAttribute("id", "scence3Dobj");

            document.body.appendChild(renderer.domElement);
            canvasBounds = renderer.domElement.getBoundingClientRect();
            // Flashlight
            light = new THREE.PointLight( 0xffffff, 1, 100 );
            light.position.set( 1, 1, 4 );
            scene.add( light );
            // Orbit Control
            controls = new OrbitControls(camera);
            controls.minDistance = 3;
            controls.maxDistance = 5;
            controls.enablePanning = false;
            // Obj loader *** import obj file
            objLoader.load(
                './model/proj01.obj',
                function (object){
                    object.position.x = 3;
                    object.position.y = 0;
                    object.scale.set(0.25,0.25,0.25);
                    scene.add(object);             
                }
            );

            objLoader.load(
              './model/PC Monitor Set.obj',
              function (object){
                object.position.x = 3.75;
                object.position.y = 1;
                object.position.z = -1;
                object.scale.set(0.25,0.25,0.25);
                scene.add(object);
                objects.push(object);
              }
            );

            gltfLoader.load(
              './model/scene.glb',
              (object) => {
                const root = object.scene;
                root.scale.set(0.0325,0.0325,0.0325);
                root.position.set(3.5,1.2,-0.6);
                scene.add(root);
                // add to clickable group
                objects.push(root);
              }
            );
            // Fixed Camera Position
            camera.position.x = 3;
            camera.position.y = 1;
            camera.position.z = 6;
            // Fixed camera rotation
            
            document.addEventListener('mousedown', onDocumentMouseDown);
            camera.lookAt(scene.position);
        }

        function onDocumentMouseDown(event){
          if(document.getElementById("myForm").style.display == "none"){
            openPopUp = false;
          }
          if(openPopUp == false){  
            event.preventDefault();
            
            mouse.x = ( ( event.clientX - canvasBounds.left ) / ( canvasBounds.right - canvasBounds.left ) ) * 2 - 1;
            mouse.y = - ( ( event.clientY - canvasBounds.top ) / ( canvasBounds.bottom - canvasBounds.top) ) * 2 + 1;

            var raycaster = new THREE.Raycaster();
            raycaster.setFromCamera(mouse, camera);
            var intersects = raycaster.intersectObjects(objects, true);
            //console.log(mouse);
            console.log(intersects);
            if(intersects.length > 0){
              intersects[0].object.material.color.setHex(Math.random() * 0xffffff);
              openForm();
            }
          }
        }

        function openForm() {
          document.getElementById("myForm").style.display = "block";
          openPopUp = true;
        }
        function animate() {
            requestAnimationFrame(animate);
            controls.update();
            if(openPopUp == true){
              controls.enabled = false;
            }
            else if (openPopUp == false){
              controls.enabled = true;
            }
            light.position.x = 0;
            light.position.y = 1;
            light.position.z = 0;
            renderer.render(scene, camera);
        }

        function onWindowResize() { 
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight)
        }

        window.addEventListener('resize', onWindowResize);

        init();
        animate();
    </script>
    <script>
      function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
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