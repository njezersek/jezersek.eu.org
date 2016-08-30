<header>
    <div class="container">
        <a class="logo-a" href="index.php">
            <div class="logo-cont">
                <img src="media/logo.png" class="logo">
                <div class="title">Raptor 2 <sub style="font-size: 10px">BETA</sub></div>
            </div>
        </a>
            <?php
                if(isset($_SESSION['auth'])){
                    $query="select * from users where id=".$_SESSION['auth'];    
           		 $result = $mysql->query($query); 

            		if($row = $result->fetch_assoc()){
						$user = $row['username'];
						$name = $row['firstname']." ".$row['surname'];
					}
            ?>
            
        <div class="user-dropdown">
            <div class="dropdown">
				<div class="user">
					<img src="media/unknownuser.png">
					<a href="profile.php"><?php echo $name ?></a>
				</div>
				<div class="menu">
					<a href="profile.php">My Profile</a>
					<a href="projects.php">My Projects</a>
					<a href="settings.php">Settnigs</a>
					<a href="profile.php?logoff=true">Sign out</a>
				</div>
			</div>
        </div>
            
            <?php 
                }
                else{
            ?>
        <div class="signin-cont">
            <a href="signin.php">Sign in</a>
        </div>
            <?php
                }
                
            ?>
    </div>
</header>