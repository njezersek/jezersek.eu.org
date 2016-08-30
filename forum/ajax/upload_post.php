<?php
    session_start();
    require "../php/connection.php";
    require "../php/functions.php";
    require "../php/settings.php";
    if(isset($_SESSION['user_id'])){
        $session_id = mysqli_real_escape_string($mysql, $_SESSION['user_id']);
        $user_info = user_id($session_id);
    }
    else{
        die("Error: unauthorised!");
    }
	echo $_POST['content'];
    if(!isset($_POST['content'])||!isset($_POST['topic_id'])){
        die("Error: bad request!");
    }
    $CONTENT = mysqli_real_escape_string($mysql, $_POST['content']);
    $TOPIC_ID = mysqli_real_escape_string($mysql, $_POST['topic_id']);
    $POSTER_ID = $session_id;
	
    
    $query="INSERT INTO posts (id, topic_id, poster_id, content, post_date, post_edit_date, editor_id, enable_html, enable_js, enable_markdown, enable_smilies, hidden, hide_reason) VALUES (NULL, '".$TOPIC_ID."', '".$POSTER_ID."', '".$CONTENT."', NOW(), '', '', '', '', '', '', '', '')";
    $result = $mysql->query($query);
?>