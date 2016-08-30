<?php

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function connect()#function to connect to MySQL database
{
	//host, username, passsword
	//mysql_connect('localhost', 'root', 'tapir123');
	//mysql_select_db("senzorji");//database name
}

function vrniSenzorje()
{
    $time_start = microtime_float();
	$link=mysql_connect('localhost', 'root', 'tapir123');
	mysql_select_db("senzorji");//database name
	$result = mysql_query("SELECT * FROM senzor");
	$st = 0;
	while($row = mysql_fetch_row($result))
	{
		echo "sens[$st][0] = $row[3];";
		echo "sens[$st][1] = $row[4];";
		echo "sens[$st][2] = $row[5];";
		$st=$st+1;		
	}	
	mysql_close($link);
	$time_end = microtime_float();
	$time = $time_end - $time_start;
	echo $time;
}

function vrniVrednosti()
{
	$link=mysql_connect('localhost', 'root', 'tapir123');
	mysql_select_db("senzorji");//database name
	$time_start = microtime_float();
	$result1 = mysql_query("SELECT id_senzorja FROM senzor");			
	$st = 0;
	while($row1 = mysql_fetch_row($result1)){
		$result2 = mysql_query("SELECT z.temperatura FROM meritev z WHERE z.id_senzorja = $row1[0] ORDER BY z.id_meritve DESC LIMIT 1");
		$row2 = mysql_fetch_row($result2);
		echo "sens[$st][3] = $row2[0];";   // temperature			
		$st=$st+1;		
	}	
	$time_end = microtime_float();
	$time = $time_end - $time_start;
	echo $time;
	mysql_close($link);	
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>test</head>
	<body>telo
    <script>
		// fetch sensors from database
  	    <?php vrniSenzorje(); ?>    		
		
		// fetch last entry for sensors in database
		<?php vrniVrednosti(); ?> 
		haha
	</script>
    </body>
</html>