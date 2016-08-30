<nav class="top-bar">
    <div class="max-width">
        <?php
        if(isset($_SESSION['user_id'])){
            $session_id = mysqli_real_escape_string($mysql, $_SESSION['user_id']);
            $user_info = user_id($session_id);
        ?>
        <a href="profile.php">You are logged in as <b><?php echo $user_info['username']?></b></a>
        <a href="logout.php">Logout</a>
        <?php
        }
        else{
        ?>
        <a href="login.php">Log in</a>
        <a href="register.php">Register</a>
        <?php
        }
        ?>
    </div>
</nav>
<header>
    <div class="max-width">
        <h1><?php echo $SETTINGS["page_title"]; ?></h1>
        <h2><?php echo $SETTINGS["page_subtitle"]; ?></h2>
    </div>
</header>
<nav class="navigation">
    <div class="max-width">
        <?php
        if(isset($_SESSION['user_id'])){
        ?>
        <a href="index.php">Profile</a>
        <a href="index.php">Inbox</a>
        <a href="index.php">Settings</a>
        <?php
        }
        ?>
        <a href="index.php">About</a>
        <?php
        if(isset($_SESSION['user_id'])){
        ?>
        <a href="index.php">Admin panel</a>
        <?php
        }
        ?>
    </div>
</nav>