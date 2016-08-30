<?php
    require "php/connection.php";
    
    if (isset($_GET['logoff'])) {
		unset($_SESSION['auth'], $auth);
		header('Location: index.php');
	}
    
    
    if(isset($_GET['id'])){
		$id = $_GET['id'];
        if(isset($_SESSION['auth'])){
            if($id != $_SESSION['auth']){
                $myprofile = false;
            }
            else{
                $myprofile = true;
            }
        }
	}	
    else if(isset($_SESSION['auth'])){
		$id = $_SESSION['auth'];
        $myprofile = true;
	}
	else{
		$id = 0;
        $myprofile = false;
	}
	
	
?>
<!DOCTYPE html>
<html lang="sl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Raptor 2 - Flowchart Interpreter</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="raptor, raptor2, 2, flowchart, interpreter, flowchart interpreter, js, programming, learning, school, beta, code, Raptor, JavaScript, online, pro, education">
    <meta name="description" content="Raptor is an open-source web aplication for creating and running chatrflows. It uses JavaScript syntax, so it is a very good start if you want to learn more advanced languages in the future.">
    <meta name="author" content="Nejc Jezeršek">
	</head>
<body>
	<?php
        include "php/frame/header.php";
    ?>
    <main>
        <div class="profile">
                <?php 
                    $query="select * from users where id=".$id;    
                    $result = $mysql->query($query); 

                    if($row = $result->fetch_assoc()){
                ?>
                    <div class="user">
                        <div class="image">
                            <img src="media/unknownuser.png">
                        </div>
                        <div class="info">
                <?php
                        echo "<h2>".$row['firstname']." ".$row['surname']."</h2>";
                        echo "<h3>".$row['username']."</h3>";
                        if($myprofile)echo '<a href="profile.php?logoff=true">Sign out</a>';
                ?>
                        </div>
                    </div>
                <?php
                    }
                    if($id == 0){
                        echo '<div class="warning">You have to <a href="signin.php">sign in</a>.</div>';
                    }
                    else{
                    }
                ?>
		
            </div>
		</div>
    </main>
</body>
</html>
