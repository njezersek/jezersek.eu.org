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

    if(isset($_SESSION['user_id'])){
        $session_id = mysqli_real_escape_string($mysql, $_SESSION['user_id']);
        $session_user_info = user_id($session_id);
    }
	echo "nejc";
	if(isset($_POST['content_post'])&&isset($_POST['id_post'])){
		echo "test";
		$CONTENT = mysqli_real_escape_string($mysql, $_POST['content_post']);
		$TOPIC_ID = mysqli_real_escape_string($mysql, $_POST['id_post']);
		$POSTER_ID = $session_id;
		
		
		$query="INSERT INTO posts (id, topic_id, poster_id, content, post_date, post_edit_date, editor_id, enable_html, enable_js, enable_markdown, enable_smilies, hidden, hide_reason) VALUES (NULL, '".$TOPIC_ID."', '".$POSTER_ID."', '".$CONTENT."', NOW(), '', '', '', '', '', '', '', '')";
		$result = $mysql->query($query);
	}
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
				$topic_info = topic_id($ID);
				$forum_info = forum_id($topic_info['forum_id']);
				$category_info = category_id($forum_info['category_id']);
				echo "<a href='index.php'>Home</a> > <a href='category.php?id=".$category_info['id']."'>".$category_info['title']."</a> > <a href='forum.php?id=".$forum_info['id']."'>".$forum_info['title']."</a> > <a href='topic.php?id=".$topic_info['id']."'>".$topic_info['title']."</a>";
			?>
		</div>
	</nav>

    <section>
    	<div class="max-width">
        <?php 
        	echo "<h1>".$topic_info['title']."</h1>";
        ?>
            <div id="ajax">
                <?php 
                    $LAST_ID = 0;
                    $query="select * from posts WHERE topic_id = ".$ID;
                    $result = $mysql->query($query);
                    while($row = $result->fetch_assoc()){
                        $user_info = user_id($row['poster_id']);
                        $date = $newDate = date($SETTINGS['date_format'], strtotime($row['post_date']));
                        
                        if(isset($_SESSION['user_id'])){
                            $options = "<div class='options'><a class='option' onclick='comment(".$row['id'].")'>Comment</a></div>";
                        }
                        
                        echo "<div class='post'>";
                            echo "<div class='avatar' style='background-image: url(".$user_info['image'].")'></div>";
                            echo "<div class='info'>";
                                echo "<div class='name'>".$user_info['name']." ".$user_info['surname']."</div>";
                                echo "<div class='username'>".$user_info['username']."</div>";
                                echo "<div class='date'>".$date."</div>";
                            echo "</div>";
                            echo "<div class='content'>".$row['content']."</div>";
                            echo $options;
                            
                        
                        echo "</div>";
                        $query1="select * from comments WHERE post_id = ".$row['id'];
                        $result1 = $mysql->query($query1);
                        while($row1 = $result1->fetch_assoc()){
                            $user_info1 = user_id($row1['poster_id']);
                            $date1 = $newDate = date($SETTINGS['date_format'], strtotime($row1['post_date']));
                            echo "<div class='comment'>";
                            echo "<div class='avatar' style='background-image: url(".$user_info1['image'].")'></div>";
                            echo "<div class='info'>";
                                echo "<div class='name'>".$user_info1['name']." ".$user_info1['surname']."</div>";
                                echo "<div class='username'>".$user_info1['username']."</div>";
                                echo "<div class='date'>".$date1."</div>";
                            echo "</div>";
                            echo "<div class='content'>".$row1['content']."</div>";
                            echo "</div>";
                        }
                        echo "<div class='comment-editor-container'><div id='c".$row['id']."'></div></div>";
                        if($LAST_ID < $row['id'])$LAST_ID = $row['id'];
                    }
                ?>
            </div>
            <hr class="line">
			
			<form action="topic.php?id=<?php echo $ID;?>" method="POST">
				<div class="post post-editor">
					<?php
						if(isset($_SESSION['user_id'])){
							$session_id = mysqli_real_escape_string($mysql, $_SESSION['user_id']);
							$session_user_info = user_id($session_id);
							echo "<div class='avatar' style='background-image: url(".$session_user_info['image'].")'></div>";
							echo "<div class='info'>";
								echo "<div class='name'>".$session_user_info['name']." ".$session_user_info['surname']."</div>";
								echo "<div class='username'>".$session_user_info['username']."</div>";
								echo "<textarea name='content_post' id='content'></textarea>";
								echo "<input type='submit' class='submit' value='Submit'>";
								echo "<input hidden name='id_post' value='".$ID."'>";
								echo "<br style='clear: both; margin: 0'>";
							echo "</div>";
							
						}
						else{
							echo "<div class='notice'>If you want to post on this forum you have to <a href='login.php'>log in</a>!</div>";
						}
						
					?>
				</div>
			</form>
        </div>
    </section>
	<?php include "frame/footer.php";?>

	<script>
        function comment(id){
			if(document.getElementById("c"+id).innerHTML == ""){
				<?php
                    if(isset($_SESSION['user_id'])){
                        $session_id = mysqli_real_escape_string($mysql, $_SESSION['user_id']);
                        $session_user_info = user_id($session_id);                        
						
						echo "var userName = '".$session_user_info['name']."';";
						echo "var userSurname = '".$session_user_info['surname']."';";
						echo "var userUsername = '".$session_user_info['username']."';";
						echo "var userImage = '".$session_user_info['image']."';";
                    }
                    
                ?>
				document.getElementById("c"+id).innerHTML = "<div class='comment post-editor'><div class='avatar' style='background-image: url("+userImage+")'></div><div class='info'><div class='name'>"+userName+" "+userSurname+"</div><div class='username'>"+userUsername+"</div><textarea name='content' id='content"+id+"'></textarea><div class='submit' onclick='submitComment("+id+")'>Submit</div><br style='clear: both; margin: 0'></div></div>";
			}
			else{
				document.getElementById("c"+id).innerHTML = "";
			}
        }
        
        loadDoc();
	</script>
</body>
</html>
