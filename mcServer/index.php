<?php
 
class MCServerStatus {
 
    public $server;
    public $online, $motd, $online_players, $max_players;
    public $error = "OK";
 
    function __construct($url, $port = '25565') {
 
        $this->server = array(
            "url" => $url,
            "port" => $port
        );
 
        if ( $sock = @stream_socket_client('tcp://'.$url.':'.$port, $errno, $errstr, 1) ) {
 
            $this->online = true;
 
            fwrite($sock, "\xfe");
            $h = fread($sock, 2048);
            $h = str_replace("\x00", '', $h);
            $h = substr($h, 2);
            $data = explode("\xa7", $h);
            unset($h);
            fclose($sock);
 
            if (sizeof($data) == 3) {
                $this->motd = $data[0];
                $this->online_players = (int) $data[1];
                $this->max_players = (int) $data[2];
            }
            else {
                $this->error = "Cannot retrieve server info.";
            }
 
        }
        else {
            $this->online = false;
            $this->error = "Cannot connect to server.";
        }
 
    }
 
}

$server = new MCServerStatus("jezersek.eu.org", 25565); 

/*$var = $server->online; //$server->online returns true if the server is online, and false otherwise
echo $server->motd; //Outputs the Message of the Day
echo $server->online_players; //Outputs the number of players online
echo $server->max_players; //Outputs the maximum number of players the server allows*/
 ?>
<!DOCTYPE html>
<head>
	<title>jezersek's MC server</title>
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body{
			background-color: #000;
			background-image: url('media/bg.png');
			background-repeat: no-repeat;
			background-size: 100%;
			background-position: center;
			
			margin: 5em;
			font-family: 'Roboto', sans-serif;
		}
		
		h1{
			color: #fff;
			font-size: 7em;
			margin: 0;
			margin-bottom: 1em;
			font-family: 'Fredoka One', cursive;
		}
		
		section{
			max-width: 800px;
			background-color: #fff;
			padding: 20px;
			border-radius: 3px;
		}
		
		h2{
			margin: 0;
			margin-bottom: 20px;
			font-size: 35px;
		}
		
		.status{
			display: flex;
			align-items: center;
		}
		
		.online{
			margin: 10px 0 0 0px;
		}
		
		.players{
			font-size: 30px;
		}
		
		.code{
			background-color: #eee;
			padding: 3px;
			border-radius: 3px;
		}
		
		.address{
			margin-top: 10px;
		}
		
		div{
			font-size: 18px;
		}
		
		
		@media screen and (max-width: 730px) {
			h1{
				font-size: 50px;
			}
			
			body{
				margin: 30px;
			}
		}

	</style>
</head>
<body>
	<h1>Jezersek's MC server</h1>
	
	<section>
		<?php
			if($server->motd){
				echo "<h2>".$server->motd."</h2>";
				echo "<div class='status'><img src='media/checkmark.png' height='26px'><div style='margin-left: 10px'><span style='font-size: 18px'>Server is online right now.</span></div></div>";
				echo "<div class='online'><span class='players'>".$server->online_players."/</span><span class='max'>".$server->max_players."</span> players online.</div>";
				echo "<div class='address'>Server address is <span class='code'>jezersek.eu.org</span>.</div>";
				
			}
			else{
				echo "<div class='status'><img src='media/error.png' height='26px'><div style='margin-left: 10px'>Server is offline right now.</div></div>";
			}
		?>
	</section>
</body>

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
	
	// Function to get the client IP address
	function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	
	$ip = get_client_ip();


		
	$query="INSERT INTO `cookie` (`id`, `cookie`) VALUES (NULL, '".$ip."');";
	$result = $mysql->query($query);
	
	echo "Success!";

?>