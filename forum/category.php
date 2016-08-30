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
			$category_info = category_id($ID);
			echo "<a href='index.php'>Home</a> > <a href='category.php?id=".$category_info['id']."'>".$category_info['title']."</a>";
		?>
		</div>
	</nav>
	<div class="max-width">
		<ul class="forum-tiles">
			<?php 
				$query1="select * from forums WHERE category_id = ".$ID;    
				$result1 = $mysql->query($query1);
				while($row1 = $result1->fetch_assoc()){
					echo "<li>";
					echo "<a href='forum.php?id=".$row1['id']."'>".$row1['title']."</a>";
					echo "</li>";
				}
			?>
		</ul>
	</div>
	<?php include "frame/footer.php";?>
</body>
</html>
