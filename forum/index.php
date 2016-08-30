<?php
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

	<nav class="status-nav">
		<div class="max-width">
			<a href="index.php">Home</a>
		</div>
	</nav>
	
	<div class="max-width">
		<ul class="categories">
			<?php 
				$query="select * from categories";    
				$result = $mysql->query($query);

				while($row = $result->fetch_assoc()){
					echo "<li>";
					echo "<a href='category.php?id=".$row['id']."'>".$row['title']."</a>";
					echo "<ul class='forums'>";

					$query1="select * from forums WHERE category_id = ".$row['id'];    
					$result1 = $mysql->query($query1);
					while($row1 = $result1->fetch_assoc()){
						echo "<li>";
						echo "<a href='forum.php?id=".$row1['id']."'>".$row1['title']."</a>";
						echo "</li>";
					}

					echo "</ul>";
					echo "</li>";
				}
			?>
		</ul>
	</div>

	<?php include "frame/footer.php";?>
</body>
</html>
