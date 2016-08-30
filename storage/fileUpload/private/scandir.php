<?php 
	$upload_dir = 'test_uploads/';
	
	$tree = glob($upload_dir.'*');

	
	foreach($tree as $dir) {
		$dirname = basename($dir);
		echo "<a class='item' href='".$upload_dir.$dirname."'><div class='text'>".$dirname."</div></a>";
	}
?>