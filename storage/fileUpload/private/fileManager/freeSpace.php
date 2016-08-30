<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<style>
.bar-cont{
    max-width: 600px;
    width: 100%;
    background-color: #c3c3c3;
    border-radius: 5px;
    overflow: hidden;
    margin: 5px 0;
}

.inner-bar{
    background-color: #7c7c7c;
    padding: 0;
    color: #FFF;
}

.inner-bar div{
    text-align: right;
    padding: 10px;
}

.disk-label{
    margin-top: 20px;
}
</style>
<body>
<?php

$free = disk_free_space($_SERVER['DOCUMENT_ROOT']);
$total = disk_total_space($_SERVER['DOCUMENT_ROOT']);

$busy = $total - $free;
$percentage = ($busy * 100)/$total;
$display = floor($percentage)."%";

if(round($percentage)<=25){
	$color = "#3ab1f0";
}
else if($percentage<=50){
	$color = "#2bb76c";
}
else if($percentage<=75){
	$color = "#e5a52c";
}
else if($percentage<=100){
	$color = "#d35348";
}


#dodaj ustrezne enote
if($free >= 1000000000000){
	$prosto = round($free/1000000000000, 2)."TB";
}
elseif($free >= 1000000000){
	$prosto = round($free/1000000000, 2)."GB";
}
else if($free >= 1000000){
	$prosto = round($free/1000000, 2)."MB";
}
else if($free >= 1000){
	$prosto = round($free/1000, 2)."kB";
}
else{
	$prosto = round($free, 2)."B";
}

if($total >= 1000000000000){
	$vse = round($total/1000000000000, 2)."TB";
}
elseif($total >= 1000000000){
	$vse = round($total/1000000000, 2)."GB";
}
else if($total >= 1000000){
	$vse = round($total/1000000, 2)."MB";
}
else if($total >= 1000){
	$vse = round($total/1000, 2)."kB";
}
else{
	$vse = round($total, 2)."B";
}

echo "<div class='disk-label'>Prostor na disku strežnika:</div>";
echo "<div class='bar-cont'><div class='inner-bar' style='width: ".$percentage."%; background-color: ".$color."'><div>".$display."</div></div></div>";
echo "<div>Prosto ".$prosto." od ".$vse."</div>";

?>
</body>
</html>