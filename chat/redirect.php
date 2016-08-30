<p>Please wait while you're being redirected.</p>
<?php
	require "connection.php";
	if(isset($_GET['user'])){
		if(isset($_GET['room'])){
			$user = mysqli_real_escape_string($mysql, $_GET['user']);
			$room = mysqli_real_escape_string($mysql, $_GET['room']);
			
			if(strlen($user) < 1)$user = "anonymous";
			
			$_SESSION["user"] = $user;
			header("Location: chat.php?r=".$room);
			die();
		}
	}
?>