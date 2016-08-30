<?php
	session_start();
    require "php/connection.php";
    require "php/functions.php";
    require "php/settings.php";

    if(!isset($_GET['id'])){
        header("loacation: index.html");
        die();
    }
    $ID = mysqli_real_escape_string($mysql, $_GET['id']);

    if(isset($_SESSION['user_id'])){
        $session_id = mysqli_real_escape_string($mysql, $_SESSION['user_id']);
        $session_user_info = user_id($session_id);
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
            <div class="post post-editor">
                <?php
                    if(isset($_SESSION['user_id'])){
                        $session_id = mysqli_real_escape_string($mysql, $_SESSION['user_id']);
                        $session_user_info = user_id($session_id);
                        echo "<div class='avatar' style='background-image: url(".$session_user_info['image'].")'></div>";
                        echo "<div class='info'>";
                            echo "<div class='name'>".$session_user_info['name']." ".$session_user_info['surname']."</div>";
                            echo "<div class='username'>".$session_user_info['username']."</div>";
                            echo "<textarea name='content' id='content'></textarea>";
                            echo "<div class='submit' onclick='submit()'>Submit</div>";
                            echo "<br style='clear: both; margin: 0'>";
                        echo "</div>";
                        
                    }
                    else{
                        echo "<div class='notice'>If you want to post on this forum you have to <a href='login.php'>log in</a>!</div>";
                    }
                    
                ?>
            </div>
        </div>
    </section>
	<?php include "frame/footer.php";?>

	<script>
        var last_id = <?php echo $LAST_ID ?>;
		function loadDoc() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					display(xhttp.responseText);
                    setTimeout(loadDoc, 1000);
				}
			};
			xhttp.open("GET", "ajax/topic.php?id=<?php echo $ID ?>&last_id="+last_id, true);
			xhttp.send();
		}
        
        function display(response){
            var posts = JSON.parse(response);
            //console.log(posts);
            for(i=0; i<posts.length; i++){              
                document.getElementById("ajax").innerHTML += "<div class='post'><div class='avatar' style='background-image: url("+posts[i].user.image+")'></div><div class='info'><div class='name'>"+posts[i].user.name+" "+posts[i].user.surname+"</div><div class='username'>"+posts[i].user.username+"</div><div class='date'>"+posts[i].post.post_date+"</div></div><div class='content'>"+posts[i].post.content+"</div></div><?php if(isset($_SESSION['user_id'])){
                            $options = "<div class='options'><a class='option' onclick='comment(".$row['id'].")'>Comment</a></div>";
                        }?>";
                if(posts[i].post.id > last_id)last_id = posts[i].post.id;
            }
        }
        
        function submit(){
            var content = document.getElementById('content').value;
            if(content.length > 0){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                    if(xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById('content').value = "";
                    }
                };

                xhttp.open("POST", "ajax/upload_post.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("content="+encodeURIComponent(content)+"&topic_id=<?php echo $ID ?>");
            }
        }
		
		function submitComment(id){
            var content = document.getElementById('content'+id).value;
            if(content.length > 0){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById('content'+id).value = "";
                    }
                };
                xhttp.open("POST", "ajax/upload_comment.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("content="+encodeURIComponent(content)+"&post_id="+id);
            }
        }
        
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
