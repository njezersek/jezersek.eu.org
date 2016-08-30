<style>
	td{
		border: solid black 1px;
	}
</style>
<?php
$dom = new DOMDocument();  

//load the html  
$html = $dom->loadHTMLFile("htmltable.html");  

  //discard white space   
$dom->preserveWhiteSpace = false;   

  //the table by its tag name  
$tables = $dom->getElementsByTagName('table');   

$xpath = new DOMXPath($dom);
$table =$xpath->query("//*[@id='myid']")->item(0);

//print_r($table);

$rows = $table->getElementsByTagName("tr");

//echo $rows->length;
//print_r($rows);

$frows = [];
echo "<table>";
for($i=0; $i<$rows->length; $i++){
	if(1 === preg_match('~ura~', $rows[$i]->textContent)){
		#has numbers
		echo "<tr><td>";
		print_r($rows[$i]->textContent);
		echo "</tr></td>";
		$frows[] = $rows[$i];
	}
	
}
echo "</table>";

//print_r($frows);
echo "<table>";
for($i=0; $i<count($frows); $i++){
	echo "<tr>";
	$tds = $frows[$i]->getElementsByTagName("td");
	for($j=0; $j<$tds->length; $j++){
		if((strlen(preg_replace('/\s+/', '', $tds[$j]->textContent))>4)||(strlen(preg_replace('/\s+/', '', $tds[$j]->textContent))<1)){			
			echo "<td>";
			echo preg_replace('/\s+/', '', $tds[$j]->textContent)."[".$j."]";
			//echo $tds[$j]->textContent."[".$j."]";
			echo "</td>";
		}
	}
	echo "</tr>";
}
echo "</table>";

/*
    //get all rows from the table  
$rows = $tables->item(0)->getElementsByTagName('tr');   
  // get each column by tag name  
$cols = $rows->item(0)->getElementsByTagName('th');   
$row_headers = NULL;
foreach ($cols as $node) {
    //print $node->nodeValue."\n";   
    $row_headers[] = $node->nodeValue;
}   

$table = array();
  //get all rows from the table  
$rows = $tables->item(0)->getElementsByTagName('tr');   
foreach ($rows as $row)   
{   
   // get each column by tag name  
    $cols = $row->getElementsByTagName('td');   
    $row = array();
    $i=0;
    foreach ($cols as $node) {
        # code...
        //print $node->nodeValue."\n";   
        if($row_headers==NULL)
            $row[] = $node->nodeValue;
        else
            $row[$row_headers[$i]] = $node->nodeValue;
        $i++;
    }   
    $table[] = $row;
}   

var_dump($table);