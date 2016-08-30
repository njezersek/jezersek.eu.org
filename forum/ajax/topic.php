<?php 
    require "../php/connection.php";
    require "../php/functions.php";
    require "../php/settings.php";
    if(!isset($_GET['id'])||!isset($_GET['last_id'])){
        die("Error: bad request!");
    }
    $ID = mysqli_real_escape_string($mysql, $_GET['id']);
    $LAST_ID = mysqli_real_escape_string($mysql, $_GET['last_id']);
    
    $query="select * from posts WHERE topic_id = ".$ID." AND id > ".$LAST_ID;
    $result = $mysql->query($query);
    $array = [];
    while($row = $result->fetch_assoc()){
        $user_info = user_id($row['poster_id']);
        $date = $newDate = date($SETTINGS['date_format'], strtotime($row['post_date']));
        
        $user_array = Array("username" => $user_info['username'], "name" => $user_info['name'], "surname" => $user_info['surname'], "image" => $user_info['image'], "rank" => $user_info['rank'], "banned" => $user_info['banned']);
        $row['post_date'] = $date;
        $array[] = Array("user" => $user_array, "post" => $row);
    }
    echo json_encode($array);
?>