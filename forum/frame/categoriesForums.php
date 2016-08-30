<ul>
    <?php 
        $query="select * from categories";    
        $result = $mysql->query($query);

        while($row = $result->fetch_assoc()){
            echo "<li>";
            echo "<a href='category.php?id=".$row['id']."'>".$row['title']."</a>";
            echo "<ul>";

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