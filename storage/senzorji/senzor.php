<?php
    require "php/connection.php";
    if(!isset($_GET['id'])){
        header("location: index.php");
        die();
    }
    $id = mysqli_real_escape_string($mysql,$_GET['id']);
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
                <span> > </span>
                <?php
                    $query = "SELECT * FROM senzor WHERE ID_SENZORJA = ".$id;
                    $result = $mysql->query($query);
                    while($row=$result->fetch_assoc()){
                        $id_prostora = $row['ID_PROSTORA'];
                        $id_vrsen = $row['ID_VRSEN'];
                    }
    
                    $query = "SELECT * FROM prostor WHERE ID_PROSTORA = ".$id_prostora;
                    $result = $mysql->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<a href='prostor.php?id=".$row['ID_PROSTORA']."'>".$row['NAZIV_PROSTORA']."</a>";   
                    }
                ?>
                <span> > </span>
                <?php 
                    $query = "SELECT * FROM vrsta_senzorja WHERE ID_VRSEN = ".$id_vrsen;
                    $result = $mysql->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<a href='senzor.php?id=".$_GET['id']."'>".$row['NAZIV_VRSEN']."</a>";
                    }
                ?>
            </div>
            <div class="cont">
                <h1>Izberite senzor</h1>
                <table>
                    <tr>
                        <th>ID meritve</th>
                        <th>Temperatura</th>
                        <th>Vlaga</th>
                        <th>Hrup</th>
                        <th>Svetloba</th>
                        <th>Zrak</th>
                        <th>Čas</th>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM meritev WHERE ID_SENZORJA = ".$id;
                        $result = $mysql->query($query);
                        while($row=$result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>".$row['ID_MERITVE']."</td>";
                            echo "<td>".$row['TEMPERATURA']."</td>";
                            echo "<td>".$row['VLAGA']."</td>";
                            echo "<td>".$row['HRUP']."</td>";
                            echo "<td>".$row['SVETLOBA']."</td>";
                            echo "<td>".$row['ZRAK']."</td>";
                            echo "<td>".$row['CAS']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </main>
    </body>
</html>
