<?php
	require "../php/connection.php";
	
	$query = "select * from editing";    
	$result = $mysql->query($query);
	
	$table = [];
	while($row = $result->fetch_assoc()){
		$table[] = $row;
	}
	
	$json = json_encode($table, JSON_UNESCAPED_UNICODE);
	
	echo $json;
?>