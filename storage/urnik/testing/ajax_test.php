<?php
	$sUrl = "https://www.easistent.com/urniki/ajax_urnik";
	

	$params = array('http' => array(
		'method' => 'POST',
		'content' => 'id_sola=182&id_razred=110401&id_profesor=0&id_dijak=0&id_ucilnica=0&teden=39&qversion=0'
	));

	$ctx = stream_context_create($params);
	$fp = @fopen($sUrl, 'rb', false, $ctx);
	if (!$fp)
	{
		echo "Problem with $sUrl, $php_errormsg";
	}

	$response = @stream_get_contents($fp);
	if ($response === false) 
	{
		echo "Problem reading data from $sUrl, $php_errormsg";
	}
	
	echo $response;
	
?>