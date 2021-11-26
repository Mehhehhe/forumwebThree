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
        var cameraTarget = new THREE.Vector3(3,4,4);

        function init() {
                // scene
            scene = new THREE.Scene();
            {
              const color = 'lightblue';
              const near = 1;
              const far = 10;
              //scene.fog = new THREE.Fog(color, near, far);
            }
            // camera
            camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, .1, 10);
            // renderer
            const sizes = {
                width: window.innerWidth,
                height: window.innerHeight,
            }
            renderer = new THREE.WebGLRenderer({ antialias: true, alpha:false});
            renderer.setSize(sizes.width, sizes.height);
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.shadowMap.enabled = true;
            renderer.shadowMap.type = THREE.PCSoftShadowMap;
            renderer.setClearColor(0x000000, 0);
            renderer.domElement.setAttribute("id", "scence3Dobj");

            document.body.appendChild(renderer.domElement);
            canvasBounds = renderer.domElement.getBoundingClientRect();
            // Flashlight
            var ambLight = new THREE.AmbientLight(0xffffff, 0.2);
            scene.add(ambLight);

            light = new THREE.PointLight( 0xffffff, 1, 100 );
            light.position.set( 3, 1, 4 );
            scene.add( light );

            const aLight = new THREE.PointLight( 0xf44336, 0.35, 50 );
            aLight.position.set(3.75,1,-1);
            scene.add( aLight );

            // Orbit Control
            controls = new OrbitControls(camera);
            controls.minDistance = 3;
            controls.maxDistance = 10;
            controls.enableRotate = false;
            controls.enableDamping = true;
            controls.dampingFactor = 0.25;
            controls.zoomSpeed = 1.2;
            // Obj loader *** import obj file
            gltfLoader.load(
                './model/room.glb',
                (object) => {
                  const root = object.scene;
                  root.scale.set(1,1,1);
                  root.position.set(3,1,0);
                  scene.add(root);
                  // add to clickable group
                  //objects.push(root);
                  root.rotation.y = -0.5;            
                }
            );

            gltfLoader.load(
              './model/scene.glb',
              (object) => {
                const root = object.scene;
                root.scale.set(0.0325,0.0325,0.0325);
                root.position.set(3,2.2,-0.6);
                scene.add(root);
                // add to clickable group
                objects.push(root);
              }
            );

            // Fixed Camera Position
            camera.position.x = 15;
            camera.position.y = 22;
            camera.position.z = 26;
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
        window.openForm = openForm;
        function animate() {
            requestAnimationFrame(animate);
            //console.log(camera.position);
            controls.update();
            if(openPopUp == true){
              controls.enabled = false;
            }
            else if (openPopUp == false){
              controls.enabled = true;
            }
            light.position.x = 3;
            light.position.y = 2;
            light.position.z = 0;
            camera.position.lerp(cameraTarget,0.01);
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