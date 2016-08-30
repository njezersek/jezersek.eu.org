<?php
    require "php/connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Nadzorna plošča</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <aside>
            <?php include "frame/aside.php"?>
        </aside>
        <main>
            <div class="top">
                <a href="index.php">Domov</a>
            </div>
            <div class="cont">
                <h1>Izberite prostor</h1>
                <?php 
                    $query = "SELECT * FROM prostor ORDER BY ID_PROSTORA DESC";
                    $result = $mysql->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<a class='tile' href='prostor.php?id=".$row['ID_PROSTORA']."'>".$row['NAZIV_PROSTORA']."</a>";   
                    }
                ?>
            </div>
        </main>
    </body>
</html>
