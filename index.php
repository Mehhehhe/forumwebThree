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
<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
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
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" id="username" href="#" onclick="openForm()">SIGN IN</a>
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
<script src='./js/three.min.js'></script>
    <script src='./js/three.js'></script>
    <script src='https://threejs.org/examples/js/controls/TrackballControls.js'></script>
    <script src='https://mamboleoo.be/learnThree/demos/OBJLoader.js'></script>
    <script type="module">
        import {OrbitControls} from 'https://cdn.skypack.dev/@three-ts/orbit-controls';
        
        let scene, camera, renderer, controls, cube;
        const objLoader = new THREE.OBJLoader();
        var light, mesh;

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
            // Flashlight
            light = new THREE.PointLight( 0xffffff, 1, 100 );
            light.position.set( 1, 1, 4 );
            scene.add( light );
            // Orbit Control
            controls = new OrbitControls(camera);
            controls.minDistance = 6;
            controls.maxDistance = 8;
            // Obj loader *** import obj file
            objLoader.load(
                './model/model (1).obj',
                function (object){
                    object.position.x = 3;
                    object.position.y = 0;
                    scene.add(object);             
                }
            );
            camera.position.x = 1;
            camera.position.y = 1;
            camera.position.z = 4;
        }

        function animate() {
            requestAnimationFrame(animate);
            //cube.rotation.x += 0.01;
            //cube.rotation.y += 0.01;
            controls.update();
            light.position.set(camera.position.x,camera.position.y,camera.position.z);
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
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

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
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
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
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
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
</style>
</html>