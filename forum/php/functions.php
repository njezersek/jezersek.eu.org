<?php 
    function category_id($ID){
        require "connection.php";

        $query="select * from categories WHERE id = ".$ID;    
        $result = $mysql->query($query);

        if($row = $result->fetch_assoc()){
            return $row;
        }
    }

    function forum_id($ID){
        require "connection.php";

        $query="select * from forums WHERE id = ".$ID;    
        $result = $mysql->query($query);

        if($row = $result->fetch_assoc()){
            return $row;
        }
    }

    function topic_id($ID){
        require "connection.php";

        $query="select * from topics WHERE id = ".$ID;    
        $result = $mysql->query($query);

        if($row = $result->fetch_assoc()){
            return $row;
        }
    }

    function post_id($ID){
        require "connection.php";

        $query="select * from posts WHERE id = ".$ID;    
        $result = $mysql->query($query);

        if($row = $result->fetch_assoc()){
            return $row;
        }
    }

    function user_id($ID){
        require "connection.php";

        $query="select * from users WHERE id = ".$ID;    
        $result = $mysql->query($query);

        if($row = $result->fetch_assoc()){
            return $row;
        }
    }

    function query($QUERY){
        require "connection.php";

        $result = $mysql->query($QUERY);
        $return = [];
        while($row = $result->fetch_assoc()){
            $return[] = $row;
        }
    }
?>