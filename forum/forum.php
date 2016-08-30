<?php
	session_start();
    require "php/connection.php";
    require "php/functions.php";
    require "php/settings.php";

    if(!isset($_GET['id'])){
        header("Location: index.php");
        die();
    }
    $ID = mysqli_real_escape_string($mysql, $_GET['id']);
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
	
	<nav class="status-nav">
		<div class="max-width">
			<?php
				$forum_info = forum_id($ID);
				$category_info = category_id($forum_info['category_id']);
				echo "<a href='index.php'>Home</a> > <a href='category.php?id=".$category_info['id']."'>".$category_info['title']."</a> > <a href='forum.php?id=".$forum_info['id']."'>".$forum_info['title']."</a>";
			?>
		</div>
	</nav>

    <ul>
    	<div class="max-width">
			<?php 
				$query1="select * from topics WHERE id = ".$ID;    
				$result1 = $mysql->query($query1);
				while($row1 = $result1->fetch_assoc()){
					echo "<li>";
					echo "<a href='topic.php?id=".$row1['id']."'>".$row1['title']."</a>";
					echo "</li>";
				}
			?>
        </div   >
    </ul>
	<?php include "frame/footer.php";?>
</body>
</html>
