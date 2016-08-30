<?php
    require "php/connection.php";
    if(!isset($_GET['id'])){
        header("location: index.php");
        die();
    }
    $id = mysqli_real_escape_string($mysql,$_GET['id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Nadzorna plošča</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <aside>
            <?php include "frame/aside.php"?>
        </aside>
        <main>
            <div class="top">
                <a href="index.php">Domov</a>
                <span> > </span>
                <?php
                    $query = "SELECT * FROM senzor WHERE ID_SENZORJA = ".$id;
                    $result = $mysql->query($query);
                    while($row=$result->fetch_assoc()){
                        $id_prostora = $row['ID_PROSTORA'];
                        $id_vrsen = $row['ID_VRSEN'];
                    }
    
                    $query = "SELECT * FROM prostor WHERE ID_PROSTORA = ".$id_prostora;
                    $result = $mysql->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<a href='prostor.php?id=".$row['ID_PROSTORA']."'>".$row['NAZIV_PROSTORA']."</a>";   
                    }
                ?>
                <span> > </span>
                <?php 
                    $query = "SELECT * FROM vrsta_senzorja WHERE ID_VRSEN = ".$id_vrsen;
                    $result = $mysql->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<a href='senzor.php?id=".$_GET['id']."'>".$row['NAZIV_VRSEN']."</a>";
                    }
                ?>
            </div>
            
            
            <div class="cont">
                <h1>3D senzorji v tem prostoru</h1>
                <div id="canvas-cont">
                
                </div>
                <table>
                    <tr>
                        <th>ID senzorja</th>
                        <th>X</th>
                        <th>Y</th>
                        <th>Z</th>
                        <th>Zadnja vrednost</th>
                        <th>Čas meritve</th>
                    </tr>
                <?php 
                    $query = "SELECT * FROM senzor WHERE ID_PROSTORA = ".$id." AND ID_VRSEN = 1";
                    $result = $mysql->query($query);
                    $tabela = "";
                    $jsArray = "";
                    $i = 0;
                    while($row=$result->fetch_assoc()){
                        $tabela .= "<tr>";
                        $tabela .= "<td>".$row['ID_SENZORJA']."</td>";
                        $tabela .= "<td>".$row['X']."</td>";
                        $tabela .= "<td>".$row['Y']."</td>";
                        $tabela .= "<td>".$row['Z']."</td>";
                        $jsArray .= "sens[".$i."][0] = ".($row['X']*10).";";
                        $jsArray .= "sens[".$i."][1] = ".($row['Y']*10).";";
                        $jsArray .= "sens[".$i."][2] = ".($row['Z']*10).";";
                        
                        $query1 = "SELECT * FROM meritev WHERE ID_SENZORJA = ".$row['ID_SENZORJA']." ORDER BY ID_MERITVE DESC LIMIT 1";
                        $result1 = $mysql->query($query1);
                        if($row1=$result1->fetch_assoc()){
                            $tabela .= "<td>".$row1['TEMPERATURA']."</td>";
                            $tabela .= "<td>".$row1['CAS']."</td>";
                            $jsArray .= "sens[".$i."][3] = ".$row1['TEMPERATURA'].";";
                        }
                        
                        $tabela .= "</tr>";
                        
                        $i++;
                    }
                    
                    echo $tabela;
                ?>
                </table>
                
                
                
                
                
                <script src="js/three.min.js"></script>
				<!--script src="http://www.html5canvastutorials.com/libraries/three.min.js"></script-->

                 <script>
                    var camera, scene, renderer;
                    var geometry, material, mesh, cube;
                    var particle, particles, pMaterial, particleSystem, particleMaterial;
                    var pointLight;
                    var angularSpeed = 0.4; 
                    var lastTime = 0;
                    var color, size, materials = [], colors = [];
                    var mouseDown = false;
                    var mouseX = 0, mouseY = 0;
                    var lastMouseX = null, lastMouseY = null;
                    var windowHalfX = window.innerWidth / 2;
                    var windowHalfY = window.innerHeight / 2;
                     //st bunkic v oblaku      //st oblakov
                    var no = 100,                sensNo = <?php echo $i ?>,        pwr = 3;

                    document.addEventListener( 'mousemove', onDocumentMouseMove, false );
                    document.addEventListener( 'mousedown', onDocumentMouseDown, false );
                    document.addEventListener( 'mouseup', onDocumentMouseUp, false );

                    document.getElementById('canvas-cont').addEventListener('DOMMouseScroll', mousewheel, false);
                    document.getElementById('canvas-cont').addEventListener('mousewheel', mousewheel, false);
                     
                     
                     var keys = {37: 1, 38: 1, 39: 1, 40: 1};

                        function preventDefault(e) {
                          e = e || window.event;
                          if (e.preventDefault)
                              e.preventDefault();
                          e.returnValue = false;  
                        }

                    init();
                    animate();

                    function F(t){
                        // Map the temperature to a 0-1 range
                        var a = (t - 10)/30;               // 10-40
                        a = (a < 0) ? 0 : ((a > 1) ? 1 : a);

                        // Scrunch the green/cyan range in the middle
                        var sign = (a < .5) ? -1 : 1;
                        a = sign * Math.pow(2 * Math.abs(a - .5), .35)/2 + .5;

                        // Linear interpolation between the cold and hot
                        var h0 = 259;
                        var h1 = 12;
                        var h = (h0) * (1 - a) + (h1) * (a);

                        var hsl = [];
                        hsl[0] = 0.66-((t-10)/30)*0.66; //h;
                        hsl[2] = (2 - 0.90) * 0.90;
                        hsl[1] = 0.90 * 0.90;
                        hsl[1] = hsl[1]/((hsl[2] <= 1) ? (hsl[2]) : 2 - (hsl[2]));
                        hsl[2] = hsl[2]/2;

                        return hsl;
                    };	

                    function init() {
                        // renderer
                        //renderer = new THREE.WebGLRenderer();
                        renderer = new THREE.WebGLRenderer();
                        renderer.setSize(window.innerWidth-300, window.innerHeight-100);
                        document.getElementById("canvas-cont").appendChild(renderer.domElement);

                        camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 1500);		
                        camera.position.z = 1000;
                        scene = new THREE.Scene();

                        // cube

                        cube = new THREE.Mesh(new THREE.CubeGeometry(800, 1200, 600, 0, 0, 0), new THREE.MeshBasicMaterial({
                            wireframe: true,
                            color: 'blue'
                        }));
                        cube.rotation.x = Math.PI * 0.1;
                        scene.add(cube);

                        // create the particle variables
                        // vertex colors 	  	  
                        particles = new THREE.Geometry();

                        colors = [];

                        pMaterial = new THREE.ParticleBasicMaterial({
                                    size: 15, 
                                    map: THREE.ImageUtils.loadTexture("smoke.png"),
                                    blending: THREE.AdditiveBlending,
                                    transparent: true,
                                    vertexColors: true
                        });

                        // create random sample for 20 sensors
                        // create placings for 20 sensors
                        var sens = new Array(sensNo);
                        for (var i = 0; i<sensNo; i++){
                            sens[i] = new Array(4);         // x, y, z, temp
                        }
                        
                        
                        
                        
                        
                        
                        <?php 
                            echo $jsArray;
                        ?>
                        
                        

                        // create cloud for 20 sensors
                        var cloud = new Array(no*sensNo);    //
                        for (var i = 0; i<no*sensNo; i++)
                            cloud[i] = new Array(5);     // x, y, z; summed distances; interpolated temperature

                        // positions for cloud particles	
                        for (var i = 0; i<no*sensNo; i++){   //
                            cloud[i][0] = sens[i%sensNo][0] + Math.round(Math.random()*80-40);  // x -40 ... 40
                            cloud[i][1] = sens[i%sensNo][1] + Math.round(Math.random()*80-40) - 100;  // y
                            cloud[i][2] = sens[i%sensNo][2] + Math.round(Math.random()*80-40)-300;  // z
                        }					

                        // calculate distances from points to samples (samples are uniformly distributed)		
                        var dist = 0;
                        var sum = 0;
                        var weights = new Array(no*sensNo);  // 
                        for (var i = 0; i < no*sensNo; i++)  // 
                        {
                            weights[i] = new Array(sensNo);
                            for (var j = 0; j < sensNo; j++){
                                dist = 1/Math.pow(Math.sqrt((cloud[i][0] - sens[j][0]) * (cloud[i][0] - sens[j][0]) +
                                                            (cloud[i][1] - sens[j][1]) * (cloud[i][1] - sens[j][1]) +
                                                            (cloud[i][2] - sens[j][2]) * (cloud[i][2] - sens[j][2])), pwr);
                                sum = sum + dist; 
                                weights[i][j] = dist;
                            }
                            cloud[i][3] = sum;  // summed weight
                            sum = 0;
                        }

                        // interpolates values for point that are not sensor samples
                        // values are displayed/added as particles		
                        var temp = 0;
                        var colr = [];
                        var st = 0;
                        for (var i = 0; i < no*sensNo; i++){    // 
                            for (var j = 0; j < sensNo; j++)
                                temp = temp + sens[j][3]*weights[i][j];
                            temp = temp/cloud[i][3];
                            //temp = sens[i%20][3];
                            cloud[i][4] = temp;
                            particle = new THREE.Vertex(
                                       new THREE.Vector3(cloud[i][1]*2-250, cloud[i][2]*2-150, cloud[i][0]*2-400));
                            colors[i] = new THREE.Color( 0xFFFF00 );			
                            colr = F(temp); 
                            colors[i].setHSL( colr[0], colr[1], colr[2] );  		
                            // add it to the geometry
                            particles.vertices.push(particle);
                            temp = 0;
                        }

                        particles.colors = colors; 

                        // create the particle system
                        particleSystem = new THREE.ParticleSystem(
                            particles,
                            pMaterial);

                        particleSystem.sortParticles = true;
                        particleSystem.rotation.x = Math.PI * 0.1;

                        // add it to the scene
                        scene.add(particleSystem);

                        // create a point light
                        pointLight = new THREE.PointLight(0xFFFFFF);

                        // set its position
                        pointLight.position.x = 10;
                        pointLight.position.y = 50;
                        pointLight.position.z = 130;

                        // add to the scene
                        scene.add(pointLight);
                    }

                    function animate() {

                        // note: three.js includes requestAnimationFrame shim
                        requestAnimationFrame( animate );

                        particleSystem.geometry.__dirtyVertices = true;
                        cube.rotation.set(-mouseY/200 + 1, -mouseX/200, 0);			
                        particleSystem.rotation.set(-mouseY/200 + 1, -mouseX/200, 0);

                        renderer.render( scene, camera );
                    }

                    function onDocumentMouseDown(event) {
                        mouseDown = true;
                        lastMouseX = event.clientX;
                        lastMouseY = event.clientY;	
                    }

                    function onDocumentMouseUp(event) {
                        mouseDown = false;
                        lastMouseX = event.clientX;
                        lastMouseY = event.clientY;		
                    }	

                    function onDocumentMouseMove(event) {
                        if (!mouseDown) {
                            return;
                        }
                        mouseX = ( event.clientX - lastMouseX );
                        mouseY = ( event.clientY - lastMouseY );	
                    }

                    function mousewheel(event) {
                        var fovMAX = 160;
                        var fovMIN = 1;

                        camera.fov -= event.wheelDeltaY * 0.005;
                        camera.fov = Math.max( Math.min( camera.fov, fovMAX ), fovMIN );
                        camera.projectionMatrix = new THREE.Matrix4().makePerspective(camera.fov, window.innerWidth / window.innerHeight, camera.near, camera.far);
                        
                        preventDefault(event);
                    }

                    </script>
            </div>
        </main>
    </body>
</html>
