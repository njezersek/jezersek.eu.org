<!DOCTYPE html>
<html lang="en">
        <head>
                <title>sensors</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
				<meta http-equiv="refresh" content="7">
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
        <body onload=”javascript:setTimeout(“location.reload(true);”,5000);”>

                <div id="info">
                        4D prikaz temp senzorjev
                </div>

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
	
	var no = 500, sensNo = 20, pwr = 3;

	document.addEventListener( 'mousemove', onDocumentMouseMove, false );
	document.addEventListener( 'mousedown', onDocumentMouseDown, false );
	document.addEventListener( 'mouseup', onDocumentMouseUp, false );
	
	window.addEventListener('DOMMouseScroll', mousewheel, false);
    window.addEventListener('mousewheel', mousewheel, false);
	
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
		renderer.setSize(window.innerWidth, window.innerHeight);
		document.body.appendChild(renderer.domElement);
		
        camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 1500);		
        camera.position.z = 1000;
        scene = new THREE.Scene();

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
		sens[0][0] = 10;
		sens[0][1] = 10;
		sens[0][2] = 90;
		sens[0][3] = Math.round(Math.random() * 30)+10;
		sens[1][0] = 35;
		sens[1][1] = 15;
		sens[1][2] = 85;
		sens[1][3] = Math.round(Math.random() * 30)+10;
		sens[2][0] = 60;
		sens[2][1] = 9;
		sens[2][2] = 90;
		sens[2][3] = Math.round(Math.random() * 30)+10;
		sens[3][0] = 100;
		sens[3][1] = 35;
		sens[3][2] = 75;
		sens[3][3] = Math.round(Math.random() * 30)+10;
		sens[4][0] = 300;
		sens[4][1] = 20;
		sens[4][2] = 80;
		sens[4][3] = Math.round(Math.random() * 30)+10;
		sens[5][0] = 40;
		sens[5][1] = 80;
		sens[5][2] = 80;
		sens[5][3] = Math.round(Math.random() * 30)+10;
		sens[6][0] = 85;
		sens[6][1] = 95;
		sens[6][2] = 95;
		sens[6][3] = Math.round(Math.random() * 30)+10;
		sens[7][0] = 160;
		sens[7][1] = 119;
		sens[7][2] = 95;
		sens[7][3] = Math.round(Math.random() * 30)+10;
		sens[8][0] = 300;
		sens[8][1] = 135;
		sens[8][2] = 85;
		sens[8][3] = Math.round(Math.random() * 30)+10;
		sens[9][0] = 330;
		sens[9][1] = 80;
		sens[9][2] = 80;
		sens[9][3] = Math.round(Math.random() * 30)+10;
		sens[10][0] = 60;
		sens[10][1] = 120;
		sens[10][2] = 80;
		sens[10][3] = Math.round(Math.random() * 30)+10;
		sens[11][0] = 135;
		sens[11][1] = 150;
		sens[11][2] = 90;
		sens[11][3] = Math.round(Math.random() * 30)+10;
		sens[12][0] = 160;
		sens[12][1] = 90;
		sens[12][2] = 90;
		sens[12][3] = Math.round(Math.random() * 30)+10;
		sens[13][0] = 250;
		sens[13][1] = 115;
		sens[13][2] = 85;
		sens[13][3] = Math.round(Math.random() * 30)+10;
		sens[14][0] = 330;
		sens[14][1] = 100;
		sens[14][2] = 100;
		sens[14][3] = Math.round(Math.random() * 30)+10;
		sens[15][0] = 20;
		sens[15][1] = 180;
		sens[15][2] = 80;
		sens[15][3] = Math.round(Math.random() * 30)+10;
		sens[16][0] = 35;
		sens[16][1] = 150;
		sens[16][2] = 50;
		sens[16][3] = Math.round(Math.random() * 30)+10;
		sens[17][0] = 136;
		sens[17][1] = 190;
		sens[17][2] = 90;
		sens[17][3] = Math.round(Math.random() * 30)+10;
		sens[18][0] = 300;
		sens[18][1] = 175;
		sens[18][2] = 75;
		sens[18][3] = Math.round(Math.random() * 30)+10;
		sens[19][0] = 380;
		sens[19][1] = 190;
		sens[19][2] = 90;
		sens[19][3] = Math.round(Math.random() * 30)+10;
				
		// create cloud for 20 sensors
		var cloud = new Array(no*sensNo);    //
		for (var i = 0; i<no*sensNo; i++)
			cloud[i] = new Array(5);     // x, y, z; summed distances; interpolated temperature
			
		// positions for cloud particles	
		for (var i = 0; i<no*sensNo; i++){   //
			cloud[i][0] = sens[i%sensNo][0] + Math.round(Math.random()*80-40);  // x
			cloud[i][1] = sens[i%sensNo][1] + Math.round(Math.random()*80-40);  // y
			cloud[i][2] = sens[i%sensNo][2] + Math.round(Math.random()*80-40);  // z
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
    }
	
	</script>
    </body>
</html>