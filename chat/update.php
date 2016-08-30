<?php
    require "connection.php";
    
    if(isset($_GET['date'])){
		if(isset($_GET['id'])){
			$date = mysqli_real_escape_string($mysql, $_GET['date']);
			$user = mysqli_real_escape_string($mysql, $_SESSION["user"]);
			$id = mysqli_real_escape_string($mysql, $_GET['id']);
			$room = mysqli_real_escape_string($mysql, $_GET['room']);
			
			if($id == 0){
				$query = "SELECT * FROM chat WHERE room = '".$room."' ORDER BY id DESC LIMIT 1";
				$postId = 1;
				if($result = $mysql->query($query)){
					while($row = $result->fetch_assoc()){
						$postId = $row['id'];
					}
				}
				echo '[{"id":"'.$postId.'","msg":"Welcome <i>'.$_SESSION["user"].'</i>!","date":"'.$date.'","fromUser":"server","fromIP":"unknown"}]';
			}
			else{
				
				$query="select * from chat where id > '".$id."' and room = '".$room."'";    

				$json = "";
				$array = [];
				if($result = $mysql->query($query)){
					while($row = $result->fetch_assoc()){
						$msg = $row['msg'];
						$fromUser = $row['fromUser'];
						$fromIP = $row['fromIP'];
						$date = $row['date'];
						$array[] = $row;
					}
				}

				$json = json_encode($array);
				echo $json;
			}
        }
    }
    else{
        
    }
?>
