<?php 
	$upload_dir = 'uploads/';
	
	$tree = glob($upload_dir.'*');
	
	$images = ["jpg", "jpeg", "png", "gif", "bmp", "tiff"];
	
	foreach($tree as $dir) {
		$dirname = basename($dir);
		$extension = strtolower(pathinfo($dir, PATHINFO_EXTENSION));
		
		$style = "";
		foreach($images as $image){
			if($extension == $image){
				$style = "background-image: url(\"".$dir."\");";
			}
		}
		
		echo "<a class='item' style='".$style."' href='".$upload_dir.$dirname."'><div class='text'>".$dirname."</div></a>";
	}
?>