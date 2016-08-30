<?php

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function connect()#function to connect to MySQL database
{
	//host, username, passsword
	//mysql_connect('localhost', 'root', 'Talafon106');
	//mysql_select_db("senzorji");//database name
}

function vrniSenzorje()
{
	$link=mysql_connect('localhost', 'root', 'Talafon196');
	mysql_select_db("senzorji");//database name
	$result = mysql_query("SELECT * FROM senzor");
	$st = 0;
	while($row = mysql_fetch_row($result))
	{
		echo "sens[$st][0] = $row[3];";
		echo "sens[$st][1] = $row[4];";
		echo "sens[$st][2] = $row[5];";
		$st=$st+1;		
	}	
	mysql_close($link);
}

function vrniVrednosti()
{
	$link=mysql_connect('localhost', 'root', 'Talafon106');
	mysql_select_db("senzorji");//database name
	$time_start = microtime_float();
	$result1 = mysql_query("SELECT ID_SENZORJA FROM senzor");			
	$st = 0;
	while($row1 = mysql_fetch_row($result1)){
		$result2 = mysql_query("SELECT z.TEMPERATURA FROM meritev z WHERE z.ID_SENZORJA = $row1[0] ORDER BY z.ID_MERITVE DESC LIMIT 1");
		$row2 = mysql_fetch_row($result2);
		echo "sens[$st][3] = $row2[0];";   // temperature			
		$st=$st+1;		
	}	
	$time_end = microtime_float();
	$time = $time_end - $time_start;
	echo $time;
	mysql_close($link);	
}
?>

<!DOCTYPE html>
<html lang="en">
        <head>
                <title>sensors</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
				<!--meta http-equiv="refresh" content="7"-->
                <style>
                        body {
                                background-color: #000000;
                                margin: 0px;
                                overflow: hidden;
                                font-family:Monospace;
                                font-size:13px;
                                text-align:center;
                                font-weight: bold;
                                text-align:center;
                        }

                        a {
                                color:#0078ff;
                        }

                        #info {
                                color:#fff;
                                position: absolute;
                                top: 0px; width: 100%;
                                padding: 5px;
                                z-index:100;
                        }

                </style>
        </head>
        <body> <!--onload="javascript:setTimeout("location.reload(true);",5000);" -->

                <div id="info">
                        3D prikaz temp senzorjev v prostoru
                </div>
				<div id="footer1" class="footer" style="display:none;"> </div>
				<div id="footer" class="footer"> </div>     <!-- style="display:none;" -->
                <script src="js/three.min.js"></script>
				<script src="js/jquery-1.10.2.min"></script>

 <script>
    var camera, scene, renderer;
    var geometry, material, mesh, cube;
	var radius;
	var krneki;
	var cubes = [];
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
	var meritev="temperatura", description = "Zajem senzorskih podatkov o okolju: "
	var again = 0;
	var frameCounter = 0;
	var fileName = "temp";
	var fnExt = ".png";

	var no = 500, sensNo = 72, pwr = 3;

	document.addEventListener( 'mousemove', onDocumentMouseMove, false );
	document.addEventListener( 'mousedown', onDocumentMouseDown, false );
	document.addEventListener( 'mouseup', onDocumentMouseUp, false );
	
	window.addEventListener('DOMMouseScroll', mousewheel, false);
    window.addEventListener('mousewheel', mousewheel, false);
	
	// create placings for 72 sensors
	sens = new Array(sensNo);
	for (var i = 0; i<sensNo; i++){
		sens[i] = new Array(5);         // x, y, z, temp
	}	
	
    init();
    animate();
	
	function refreshGraph(){
		$.getJSON("meritve.php", {"meritev":meritev}, function(json){   
			again = again + 1;
			//if (again > 1000)
			//	again = 1;					
			$("#footer").text(json);
			$("#description").text(description + meritev);
		    var jsonMeritve = $("#footer").text();
            parseJsonMeritev(jsonMeritve, 3);	
			createGraph();	
            //$("#info").text(again);	
            //setTimeout(refreshGraph, 1000);			
		}); //End json 	
		//createGraph();
		//$("#info").text('1');
    };

    setInterval(refreshGraph, 500);

    setInterval(captureFrame, 500);	
	
	function parseJsonMeritev(jsMer, indeks){
		for (var i = 0; i<sensNo; i++){
			if (jsMer.indexOf(',')==-1)
				sens[i][indeks] = parseFloat(jsMer.substring(0));
			else
				sens[i][indeks] = parseFloat(jsMer.substring(0, jsMer.indexOf(','))); 			// x, y, z, temp
			jsMer = jsMer.substring(jsMer.indexOf(',')+1);
		}	
	}
/*
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
*/	
	function F(t){
		// Map the temperature to a 0-1 range
		var a = (t - 20)/10;               // 20-30 //10-40
		a = (a < 0) ? 0 : ((a > 1) ? 1 : a);

		// Scrunch the green/cyan range in the middle
		var sign = (a < .5) ? -1 : 1;
		a = sign * Math.pow(2 * Math.abs(a - .5), .35)/2 + .5;

		// Linear interpolation between the cold and hot
		var h0 = 259;
		var h1 = 12;
		var h = (h0) * (1 - a) + (h1) * (a);

		var hsl = [];
		hsl[0] = 0.66-((t-20)/10)*0.66; //h;
		hsl[2] = (2 - 0.90) * 0.90;
		hsl[1] = 0.90 * 0.90;
		hsl[1] = hsl[1]/((hsl[2] <= 1) ? (hsl[2]) : 2 - (hsl[2]));
		hsl[2] = hsl[2]/2;

		return hsl;
	};	
	
    function init() {
		// renderer
		//renderer = new THREE.WebGLRenderer();
		renderer = new THREE.WebGLRenderer( {preserveDrawingBuffer: true} );
		renderer.setSize(window.innerWidth, window.innerHeight);
		//renderer.setClearColor( 0xf0f0f0 );
		document.body.appendChild(renderer.domElement);
		
        camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 1500);		
        camera.position.z = 1000;
        scene = new THREE.Scene();
		radius = 500;
		
		// cube
		cube = new THREE.Mesh(new THREE.CubeGeometry(500, 250, 800, 1, 1, 1), new THREE.MeshBasicMaterial({
			wireframe: true,
			color: 'blue'
		}));
		cube.rotation.x = Math.PI * 0.1;
		scene.add(cube);
	
		// create the particle variables
		// vertex colors 	  	  
		particles = new THREE.Geometry();
	    
		pMaterial = new THREE.ParticleBasicMaterial({
					size: 30, 
					map: THREE.ImageUtils.loadTexture("smoke.png"),
					blending: THREE.AdditiveBlending,
					opacity: 1.0,
					transparent: true,
					vertexColors: true
		});

		// fetch sensors from database
  	    <?php vrniSenzorje(); ?>    		
		
		// fetch last entry for sensors in database
		//<?php vrniVrednosti(); ?>    		
		
        var temp = 0;
		var colr = [];
		var st = 0;
        for (var i = 0; i < sensNo; i++){    // 
			temp = sens[i][3];
			particle = new THREE.Vertex(
					   new THREE.Vector3(sens[i][1]*10-250, sens[i][0]*10-200, sens[i][2]*12-400));
			colors[i] = new THREE.Color( 0xFFFF00 );			
			colr = F(temp); 
			colors[i].setHSL( colr[0], colr[1], colr[2] );  		
			// add it to the geometry
			particles.vertices.push(particle);
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
    }
	
	function createGraph()
	{
	    var temp = 0;
		var colr = [];
		for (var i = 0; i < sensNo; i++){   
			temp = sens[i][3];
			colr = F(temp); 
			colors[i].setHSL( colr[0], colr[1], colr[2] );  		
        }	
		particles.colors = colors; 

		//particles.materials[ 0 ].color.setHex( 0xff0000 ); //colr[0], colr[1], colr[2] );
		particleSystem.geometry.__dirtyVertices = true;
		renderer.render( scene, camera );
	} 	

	function captureFrame() {
        var dataUrl = renderer.domElement.toDataURL("image/png");		
		var ajax = new XMLHttpRequest();
		frameCounter = frameCounter+1;
		var fileNameFC = fileName + frameCounter + fnExt; 
	    dataUrl = fileNameFC+";"+dataUrl;
        $("#info").text(dataUrl);			
        ajax.open("POST", 'imgSave.php', false);
        ajax.setRequestHeader('Content-Type', 'application/upload');
        ajax.send(dataUrl);		
		
		/*
		$.getJSON("imgSave.php", {"meritev":dataUrl}, function(json){   		
			$("#footer").text(json);
			$("#description").text(description + meritev);
		    var jsonMeritve = $("#footer").text();
            parseJsonMeritev(jsonMeritve, 3);	
			createGraph();	
            //$("#info").text(again);	
            //setTimeout(refreshGraph, 1000);			
		});
		*/
	}	
	
	</script>
    </body>
</html>