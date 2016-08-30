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
        include "php/frame/header.php";
    ?>
    <main>
       <div class="warning-cont"> <div class="warning">This is an early beta version of this software. Some features may not work just right.</div></div>
        <section class="about">
            <h1>What is Raptor?</h1>
            <p>Raptor is an open-source web aplication for creating and running flowcharts. It uses JavaScript syntax, so it is a very good start if you want to learn more advanced languages in the future. So what are you waiting for?</p>
            <div class="center">
                <a href="editor/index.html"><div class="cta">TRY IT OUT</div></a>
                <?php 
					if(!isset($_SESSION['auth'])){
				?>
				<div class="or">or</div>
                <a href="signup.php"><div class="cta">SIGN UP</div></a>
				<?php 
					}
				?>
            </div>
            <p>It is free for everybody.</p>
            <img src="media/screen.png">
            <div class="label">Screenshot of Raptor</div>
        </section>
        <section class="presentation">
            <div class="container">
                <a>
                    <h1>Get Help</h1>
                    <img src="media/help.png">
                    <p>Learn from our tutorials and build your own awesome aplication.</p>
                </a>
                <a>
                    <h1>See Examples</h1>
                    <img src="media/examples.png">
                    <p>Take a look at project we prepared for you.</p>
                </a>
                <a href="source.php">
                    <h1>Get Source-code</h1>
                    <img src="media/code.png">
                    <p>Raptor is completely open-source. You can download and modify the source code right now.</p>
                </a>
            </div>
        </section>
        <section class="about">
            <h1>Support development</h1>
            <p>We need your help to make Raptor better. We would be very glad of your financial support.</p>
            <div class="center">
                <div class="cta">DONATE</div>
            </div>
        </section>
        <section class="news">
            <div class="container">
                <h1>Whats new</h1>
                <article>
                    <h2>Get Help</h2>
                    <p>Learn from our tutorials and build your own awesome aplication.</p>
                </article>
                <article>
                    <h2>See Examples</h2>
                    <p>Take a look at project we prepared for you.</p>
                </article>
                <article>
                    <h2>Get Source-code</h2>
                    <p>Raptor is completely open-source. You can download and modify the source code right now.</p>
                </article>
            </div>
        </section>
    </main>
</body>
</html>
