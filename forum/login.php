<?php
	/*
	1	pioneer		objavlja, ustvari public topic, spreminja svoj profil
	2	user		komentira, lika
	3	power user	uporablja markup, uporablja smejkote
	4	super user 	uporablja html, ustvatja forume
	5	moderator	ureja objave/komentarje, briše objave/komentarje, briše topice, zaklepa topice
	5	admin		dodaja kategorije, briše kategorije, briše forume, uporablja js, ureja uporabnike
	6 	owner		spreminje nastavitve stani
	*/

	session_start();
    require "php/connection.php";
    require "php/functions.php";
    require "php/settings.php";
?>

<!DOCTYPE html>
<html lang="sl">
<head>
	<?php 
		include "frame/head.php";
	?>
</head>
<body>
	<?php include "frame/header.php";?>

	<?php
		$error = "";
		if(isset($_POST['username'])){
			$username = mysqli_real_escape_string($mysql, $_POST['username']);
			$password = sha1(mysqli_real_escape_string($mysql, $_POST['password']));

			$query = "SELECT * FROM users WHERE username = '".$username."'";
			$result = $mysql->query($query);
			if($row = $result->fetch_assoc()){
				if($row['password'] == $password){
					$_SESSION['user_id'] = $row['id'];
					header("Location: index.php");
					die();
				}
				else{
					$error = "<div class='error'>Username or password are not correct.</div>";
				}
			}
			else{
				$error = "<div class='error'>This username does not exist.</div>";
			}
		}

	?>

	<nav class="status-nav">
		<div class="max-width">
			<a href="index.php">Home</a>
		</div>
	</nav>
	
	<div class="max-width">
		<section>
			<h1>Log in</h1>
			<form method="post" actinon="login.php">
				<label>Username</label><br>
				<input name="username" type="text"><br>
				
				<label>Password</label><br>
				<input name="password" type="password"><br>
				
				<input class="submit" type="submit" value="Log in">
				<br>
				<?php
					echo $error;
				?>
			</form>
		</section>
	</div>

	<?php include "frame/footer.php";?>
</body>
</html>
