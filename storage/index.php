<!DOCTYPE html>
<head>
	<title>Index</title>
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		.grid{
			padding: 0;
			margin: 0;

			display: -webkit-box;
			display: -moz-box;
			display: -ms-flexbox;
			display: -webkit-flex;
			display: flex;

			-webkit-flex-flow: row wrap;
			justify-content: space-around;
		}
		
		a{
			width: 200px;
			height: 150px;
			margin-top: 10px;

			line-height: 150px;
			color: white;
			font-weight: bold;
			font-size: 3em;
			text-align: center;
			overflow: hidden;
			
			transition: all 0.3s;
			position: relative;
			top: 0;
		}
		
		a:hover{
			top: -10px;
			//height: 170px;
		}
		
		a .item{
			
			
		}

	</style>
</head>
<body>
	
	<h1>Index of this server</h1>
	
	<div class="grid">
	<?php 
		function rgbcode($id){
			return '#'.substr(md5($id), 0, 6);
		}
		
		$tree = glob('./*', GLOB_ONLYDIR);

		
		foreach($tree as $dir) {
			$dirname = basename($dir);
			if(file_get_contents($dirname.'/.hide', true) != "true"){
				echo "<a href='".$dirname."'><div class='item' style='background-image: url(".$dirname."/thumbnail.png); background-color: ".rgbcode($dirname)."'>".$dirname."</div></a>";
			}
		}
	?>
	</div>
</body>