<?php 

	$upload_dir = 'uploads/';
	if(isset($_GET['dir'])){
		$upload_dir = $_GET['dir'];
	}
	
	$tree = glob($upload_dir.'*');
	
	$items = [];
	
	foreach($tree as $dir) {
		$dirname = basename($dir);
		$extension = strtolower(pathinfo($dir, PATHINFO_EXTENSION));
		$type = filetype($dir);
		
		$items[] = array("name"=>$dirname, "path"=>$dir, "extension"=>$extension, "type"=>$type);
	}
	
	echo json_encode($items, JSON_UNESCAPED_UNICODE);
?>