<?php

	//$htmlContent = file_get_contents('https://www.easistent.com/urniki/izpis/30a1b45414856e5598f2d137a5965d5a4ad36826/110401/0/0/');
	$htmlContent = file_get_contents('https://www.easistent.com/urniki/izpis/30a1b45414856e5598f2d137a5965d5a4ad36826/110401/0/0/');
		
	$DOM = new DOMDocument();
	$DOM->loadHTML($htmlContent);
	
	$Header = $DOM->getElementsByTagName('th');
	$Detail = $DOM->getElementsByTagName('td');

    //#Get header name of the table
	foreach($Header as $NodeHeader) 
	{
		$aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
	}
	//print_r($aDataTableHeaderHTML); die();

	//#Get row data/detail table without header name as key
	$i = 0;
	$j = 0;
	foreach($Detail as $sNodeDetail) 
	{
		$aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
		$i = $i + 1;
		$j = $i % count($aDataTableHeaderHTML) == 0 ? $j + 1 : $j;
	}
	print_r($aDataTableDetailHTML);
	
	echo "<table>";
	for($i=0; $i<count($aDataTableDetailHTML); $i++){
		echo "<tr>";
		for($j=0; $j<count($aDataTableDetailHTML[$i]); $j++){
			echo "<td style='border: 1px solid black'>".$aDataTableDetailHTML[$i][$j]."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
?>