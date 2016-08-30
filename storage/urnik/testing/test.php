<!DOCTYPE html>
<html>
	<head>
		<title>KamBus</title>
		<meta charset="utf-8">
	</head>
	<body>
		
		<?php
			$url = 'https://www.easistent.com/urniki/izpis/30a1b45414856e5598f2d137a5965d5a4ad36826/110401/0/0/';
			echo file_get_contents($url);
			echo "<script>var url = ".$url.";</script>";
		?>
		
		
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="jquery.tabletojson.min.js"></script>
		<script>			
			var urnik_object = $('.ednevnik-seznam_ur_teden').tableToJSON();
			var json = JSON.stringify(urnik_object);
			
			for(i=0; i<urnik_object.length; i++){
				for (var property in urnik_object[i]){
					if(property != "Ura"){
						console.log(urnik_object[i][property]);
					}
				}
			}
			
}

			
			
			
		</script>
	</body>
</html>