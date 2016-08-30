<?php 
	//if ( $_REQUEST["meritev"] )
	//{
	//	$kaj = $_REQUEST['meritev'];
	//}
		
	//host, username, passsword
	$link = mysql_connect('localhost', 'root', 'Talafon196');
	mysql_select_db("senzorji");//database name

	$retResult = array();
	$result1 = mysql_query("SELECT ID_SENZORJA FROM senzor");	
	$st = 0;
	while($row1 = mysql_fetch_row($result1)){
		$result2 = mysql_query("SELECT TEMPERATURA FROM meritev z WHERE z.ID_SENZORJA = $row1[0] ORDER BY z.ID_MERITVE DESC LIMIT 1");
		$row2 = mysql_fetch_row($result2);
		$retResult[$st] = $row2[0];		
		$st=$st+1;		
	}	
	$meritev_js = json_encode( $retResult );
    echo $meritev_js; 
	mysql_close($link);
?>