<?php 
    require "connection.php";
    
    $query="select * from settings";    
    $result = $mysql->query($query); 
    
    $SETTINGS = [];
    while($row = $result->fetch_assoc()){
            $SETTINGS[$row['name']] = $row['value'];
    }
?>