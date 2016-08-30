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
		$unverified = false;
        if (isset($_POST['username'])) {

            $username = mysqli_real_escape_string($mysql,$_POST['username']);
            $password = sha1(mysqli_real_escape_string($mysql,$_POST['password'])); 

            $query="select * from users where username='$username'";    
            $result = $mysql->query($query); 
            $unverified = false;

            if ($row = $result->fetch_assoc()) {
                if ($row['password']==$password){
                    if($row['verified']==1){
                        $_SESSION['auth']=$row['id'];
                        $wrongpass = false;
                        header('Location: profile.php');
                    }
                    else{
                        $wrongpass = false;
                        $unverified = true;
                    }
                }
                else{  
                    $wrongpass = true;
                }
            }
            else{  
                $wrongpass = true;
            }
        }
        else{
            $wrongpass = false;
        }

        include "php/frame/header.php";
    ?>
    <main>
        <div class="signin-cont"><section class="signin">
            <h1>Sign in</h1>
            <form method="post" action="signin.php">
                <p><input name="username" class="input" type="text" placeholder="Username"></p>
                <p><input name="password" class="input" type="password" placeholder="Password"></p>
                <p><input class="submit" type="submit" value="Sign in"></p>
            </form>
            
            <?php 
                if($wrongpass){
                    echo "<br style='clear: both'><div class='warning'>Wrong username or password.</div>";
                }
                if($unverified){
                    echo "<br style='clear: both'><div class='warning'>Your email isn't verified yet! Go to your email inbox and verify your account.</div>";
                }
            ?>
            <p>Don't have an account? Get one right now. Click <a href="signup.php">here</a> to get started.</p>
        </section></div>
    </main>
</body>
</html>
