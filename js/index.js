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
