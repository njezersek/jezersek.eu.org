<?php
    require "php/connection.php";
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

        if (
            (isset($_GET['c']))
            &&
            (isset($_GET['u']))
        ){

            $code = mysqli_real_escape_string($mysql,$_GET['c']);
            $username = mysqli_real_escape_string($mysql,$_GET['u']); 

            $query="select * from users where username='$username'";    
            $result = $mysql->query($query); 
            $usernameCorrect = false;

            if($row = $result->fetch_assoc()) {
                if ($row['verificationCode']==$code){
                    $_SESSION['auth']=$row['id'];
                    $error = false;
                }
                else{  
                    $error = true;
                    $usernameCorrect = true;
                }
            }
            else{ 
                $error = true;
            }
        }
        else{
            $error = true;
        }
    
        if(!$error){
            $query="UPDATE `users` SET `verified` = '1', `verificationCode` = '' WHERE `username` = '$username'";
            if($mysql->query($query)){
            
            }
            else{
                $error = true;
            }
        }

        include "php/frame/header.php";
    ?>
    <main>
        <section class="about">
            <h1>Email verification</h1>
            
            <?php 
                if($error){
                    if($usernameCorrect){
                        echo "<div class='warning-cont'><div class='warning'>Your email address is already verified!</div>";
                    }
                    else{
                        echo "<div class='warning-cont'><div class='warning'>We could not verify your email address :(</div>";
                    }
                }
                else{
                    echo "<p>We have successfully verified your email. Now you can go to your <a href='profile.php'>profile page</a>.</p>";
                }
            ?>
        </section>
    </main>
</body>
</html>
