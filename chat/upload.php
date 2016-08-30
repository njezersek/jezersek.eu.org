<?php
    require "connection.php";
    
    if(isset($_GET['msg'])){
        
        $msg = mysqli_real_escape_string($mysql, $_GET['msg']);
        $user = mysqli_real_escape_string($mysql, $_SESSION["user"]);
        $room = mysqli_real_escape_string($mysql, $_GET["room"]);
		
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
        
        $query="INSERT INTO chat (id, msg, date, fromUser, fromIP, room) VALUES (NULL, '".$msg."', CURRENT_TIMESTAMP, '".$user."', '".$ip."', '".$room."')"; 

        if($result = $mysql->query($query)){
            echo "ok";
        }
        
    }
    else{
        
    }
?>