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
		<?php 
			if (isset($_POST['username'])) {
				
				$username = mysqli_real_escape_string($mysql,$_POST['username']);
				$email = mysqli_real_escape_string($mysql,$_POST['email']); 
				$password = sha1(mysqli_real_escape_string($mysql,$_POST['password'])); 
				$firstname = mysqli_real_escape_string($mysql,$_POST['firstname']); 
				$surname = mysqli_real_escape_string($mysql,$_POST['surname']); 
				$day = mysqli_real_escape_string($mysql,$_POST['day']); 
				$month = mysqli_real_escape_string($mysql,$_POST['month']); 
				$year = mysqli_real_escape_string($mysql,$_POST['year']); 
				$gender = mysqli_real_escape_string($mysql,$_POST['gender']); 
				$birthDate = $year."-".$month."-".$day;
				$today = date("Y-m-d");
				$verificationCode = sha1($username.rand(1111,9999));
				
				$query="select * from users where username='$username'";    
				$result = $mysql->query($query); 
				if ($row = $result->fetch_assoc()) {
					$error = true; //username exist
				}
				
				if(strlen($username) < 3)$error = true;
				if(strlen($email) < 1)$error = true;
				if(strlen($password) < 8)$error = true;
				if(strlen($firstname) < 2)$error = true;
				if(strlen($surname) < 2)$error = true;
				
				if(!$error){
					//add new user
					$query="INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `surname`, `email`, `birthDate`, `date`, `about`, `img`, `verified`, `verificationCode`, `gender`) VALUES (NULL, '$username', '$password', '$firstname', '$surname', '$email', '$birthDate', '$today', '', '', '0', '$verificationCode', 'male');";
					$result = $mysql->query($query);
					
					$to = $email;
					$subject = "Raptor 2 - Verify your email address!";
					$message = "<body style='margin: 0; font-family: Roboro, sans-serif;'>";
					$message .= "<div style='background: #0c66a0; padding: 10px; color: #fff; padding: 0;'>";
					$message .= "  <div style='padding: 0; max-width: 1000px; margin: 0 auto 0; display: block;'>";
					$message .= "    <img src='http://raptor2.ddns.net/media/logo.png' style='width: 40px; height: 40px; margin: 0 10px; vertical-align: middle;'>";
					$message .= "    <h1 style='margin: 0; font-size: 20px; font-weight: 100; display: inline-block; padding: 0; display: inline-block;
					  vertical-align: middle; colour: #fff; font-size: 26px'>Raptor 2</h1>";
					$message .= "  </div>";
					$message .= "</div>";
					$message .= "<div style='padding: 10px; max-width: 1000px; margin: 0 auto 0;'>";
					$message .= "  <h1>Dear ".$firstname.",</h1>";
					$message .= "  <p style='font-size: 20px'>Thanks for signing up. We want to make sure that we have your real email. Please visit the link below to confirm your email:</p>";
					$message .= "  <p style='font-size: 20px'><a href='http://raptor2.ddns.net/verify.php?c=".$verificationCode."&u=".$username."'>http://raptor2.ddns.net/verify.php?c=".$verificationCode."&u=".$username."</a></p>";
					$message .= "  <p style='font-size: 16px; color: #777'>This email was sent to you automaticly from <a href='raptor2.ddns.net'>raptor2</a>. If you didn't request this email please delete it.</p>";
					$message .= "</div>";
					$message .= "</body>";
					$from = "Raptor 2 <raptor2info@gmail.com>";
					$headers = "From: Raptor 2 <raptor2info@gmail.com>\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=UTF-8";

					mail($to,$subject,$message,$headers);
					
					$registered = true;
					
				}
				else{
					$registered = false;
				}
			}
			else{
				$registered = false;
				$error = false;
			}
			if(!$registered){
		?>
        <div class="signin-cont"><section class="signin">
            <h1>Sign up</h1>
            <form onsubmit="if(!validateForm())event.preventDefault();" method="post" action="signup.php">
                <p><input name="username" id="username" class="input" type="text" placeholder="Userame" onfocus="tuchedUsername = true" autocomplete="off"></p>
                <p><input name="email" id="email" class="input" type="text" placeholder="Email" onfocus="tuchedEmail = true" autocomplete="off"></p>
                <p><input name="password" id="password" class="input" type="password" placeholder="Password" onfocus="tuchedPassword = true" autocomplete="off"></p>
                <p><input id="confirm" class="input" type="password" placeholder="Confirm password" onfocus="tuchedConfirm = true" autocomplete="off"></p>
                <p><input name="firstname" id="firstname" class="input" type="text" placeholder="First name" onfocus="tuchedFirstname = true" autocomplete="off"></p>
                <p><input name="surname" id="surname" class="input" type="text" placeholder="Surname" onfocus="tuchedSurname = true" autocomplete="off"></p>
				<label>Select your birth date:</label>
                <p class="select-date" onclick="tuchedDate = true">
                    <select name="day" id="select-day"></select>
                    <select name="month" id="select-month">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select name="year" id="select-year"></select>
                </p>
				<label>Select your gender:</label>
				<p class="select-gender" onclick="tuchedGender = true">
                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </p>
                <p><input id="submit" class="submit" type="submit" value="Sign up"></p>
            </form>
			<div id="errors" class="errors"></div>
			<div class="errors">
			<?php
				if($error)echo "<p>Something went wrong. We could not register your account :(</p>";
			?>
			</div>
            <p>Already have an account? Click <a href="signin.php">here</a> to sign in.</p>
        </section></div>
		<?php
		}
		else{
		?>
			<section class="about">
				<h1>You have successfully signed up!</h1>
				<p>Ther is one more thing to do. You have to verify your email address. We sent you an email with verification code. Go to your <a href="https://<?php echo explode("@",$email)[count(explode("@",$email))-1] ?>">email inbox.</a></p>
			</section>
		<?php
		}
		?>
    </main>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        var daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
        today = new Date(),
          // default targetDate is christmas
          targetDate = new Date(today.getFullYear(), today.getMonth()+1, today.getDate());

        setDate(targetDate);
        setYears(5) // set the next five years in dropdown

        $("#select-month").change(function() {
          var monthIndex = $("#select-month").val();
          setDays(monthIndex);
        });

        function setDate(date) {
          setDays(date.getMonth());
          $("#select-day").val(date.getDate());
          $("#select-month").val(date.getMonth());
          $("#select-year").val(date.getFullYear());
        }

        // make sure the number of days correspond with the selected month
        function setDays(monthIndex) {
          var optionCount = $('#select-day option').length,
            daysCount = daysInMonth[monthIndex];

          if (optionCount < daysCount) {
            for (var i = optionCount; i < daysCount; i++) {
              $('#select-day')
                .append($("<option></option>")
                  .attr("value", i + 1)
                  .text(i + 1));
            }
          } else {
            for (var i = daysCount; i < optionCount; i++) {
              var optionItem = '#select-day option[value=' + (i + 1) + ']';
              $(optionItem).remove();
            }
          }
        }

        function setYears(test) {
          var thisYear = today.getFullYear();
          var year = 1900;
          var val = thisYear-year;
          for (var i = val; i > 0; i--) {
            $('#select-year')
              .append($("<option></option>")
                .attr("value", year + i)
                .text(year + i));
          }
        }
    </script>
    <script>
		validateForm();
        var existingUsers = [
            <?php 
                $query="select username from users";    
                $result = $mysql->query($query); 

                while($row = $result->fetch_assoc()){
                    echo "'".$row['username']."',";
                }
            ?>
            'admin'
        ]
        
        window.addEventListener('keyup', function(event){
            verify();
        });
        window.addEventListener('mousedown', function(event){
            verify();
        });
        
        var tuchedUsername = false;
        var tuchedEmail = false;
        var tuchedPassword = false;
        var tuchedConfirm = false;
        var tuchedFirstname = false;
        var tuchedSurname = false;
        var tuchedDate = false;
        
        function verify(){
			var errors = "";
			
            if(tuchedPassword){
                if(document.getElementById('password').value.length >= 8){
					if(document.getElementById('password').value.length <= 64){
						document.getElementById('password').style.borderColor = "#50aa44";
					}
					else{
						document.getElementById('password').style.borderColor = "#aa4444";
						errors += "<p>Password must be shorter than 64 characters!</p>";
					}
                }
                else{
                    document.getElementById('password').style.borderColor = "#aa4444";
					errors += "<p>Password must be at least 8 characters long!</p>";
                }
            }
			if(tuchedConfirm){
				if(document.getElementById('password').value != document.getElementById('confirm').value){
					document.getElementById('confirm').style.borderColor = "#aa4444";
					errors += "<p>Passwords do not match!</p>";
				}
				else{
					if(document.getElementById('password').value.length >= 8){
						document.getElementById('confirm').style.borderColor = "#50aa44";
					}
					else{
						document.getElementById('confirm').style.borderColor = "#aa4444";
					}
				}
			}
            if(tuchedEmail){
                if(document.getElementById('email').value.indexOf("@") != -1){
                    document.getElementById('email').style.borderColor = "#50aa44";
                }
                else{
                    document.getElementById('email').style.borderColor = "#aa4444";
					errors += "<p>This email is not valid!</p>";
                }
            }
            if(tuchedFirstname){
                if(document.getElementById('firstname').value.length >= 2){
                    if(document.getElementById('firstname').value.length <= 64){
                        document.getElementById('firstname').style.borderColor = "#50aa44";
                    }
                    else{
                        document.getElementById('firstname').style.borderColor = "#aa4444";
				        errors += "<p>First name must be shorter than 64 characters!</p>";
                    }
                }
                else{
                    document.getElementById('firstname').style.borderColor = "#aa4444";
					errors += "<p>First name must be at least 2 characters long!</p>";
                }
            }
            if(tuchedSurname){
                if(document.getElementById('surname').value.length >= 2){
                    if(document.getElementById('surname').value.length <= 64){
                        document.getElementById('surname').style.borderColor = "#50aa44";
                    }
                    else{
                        document.getElementById('surname').style.borderColor = "#aa4444";
				        errors += "<p>Surname must be shorter than 64 characters!</p>";
                    }
                }
                else{
                    document.getElementById('surname').style.borderColor = "#aa4444";
					errors += "<p>Surname must be at least 2 characters long!</p>";
                }
            }
            if(tuchedUsername){
                if(existingUsers.indexOf(document.getElementById('username').value) != -1){
                    document.getElementById('username').style.borderColor = "#aa4444";
					errors += "<p>This username is already taken!</p>";
                }
                else{
					if(document.getElementById('username').value.length >= 3){
						if(document.getElementById('username').value.length <= 64){
                            document.getElementById('username').style.borderColor = "#50aa44";
                        }
                        else{
                            document.getElementById('username').style.borderColor = "#aa4444";
                            errors += "<p>Username must be shorter than 64 characters!</p>";
                        }
					}
					else{
						document.getElementById('username').style.borderColor = "#aa4444";
						errors += "<p>Userame must be at least 3 characters long!</p>";
					}
                }
            }
			
			ok = true;
			if(!(document.getElementById('password').value.length >= 8))ok = false;
			if(document.getElementById('password').value != document.getElementById('confirm').value)ok = false;
			if(document.getElementById('email').value.indexOf("@") == -1)ok = false;
			if(!(document.getElementById('firstname').value.length >= 2))ok = false;
			if(!(document.getElementById('surname').value.length >= 2))ok = false;
			if(!(document.getElementById('username').value.length >= 3))ok = false;
			
			if(!ok)errors += " "
			
			document.getElementById('errors').innerHTML = errors;
			
			if(errors.length == 0){
				document.getElementById("submit").className = "submit";
				return true;
			}
			else{
				document.getElementById("submit").className = "disabled";
				return false;
			}
        }
		
		function validateForm(){
			if(!verify())return false;
			else return true;
		}
    </script>
</body>
</html>
