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
                    $query = "SELECT * FROM prostor WHERE ID_PROSTORA = ".$id;
                    $result = $mysql->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<a href='prostor.php?id=".$row['ID_PROSTORA']."'>".$row['NAZIV_PROSTORA']."</a>";   
                    }
                ?>
            </div>
            <div class="cont">
                <h1>Izberite senzor</h1>
                <?php 
                    $query = "SELECT * FROM vrsta_senzorja";
                    $result = $mysql->query($query);
                    $vrsta_senzorja = [];
                    while($row=$result->fetch_assoc()){
                        $vrsta_senzorja[] = $row;
                    }

                    $query = "SELECT * FROM senzor WHERE ID_PROSTORA = ".$id;
                    $result = $mysql->query($query);
                    while($row=$result->fetch_assoc()){
                        for($i=0;$i<count($vrsta_senzorja);$i++){
                            if($row['ID_VRSEN'] == $vrsta_senzorja[$i]['ID_VRSEN']){
                                $vrsta = $vrsta_senzorja[$i]['NAZIV_VRSEN'];
                            }
                        }
                        $senzor3d = false;
                        if($row['ID_VRSEN'] == 1){
                            $senzor3d = $vrsta;
                        }
                        else{
                            echo "<a class='tile' href='senzor.php?id=".$row['ID_SENZORJA']."'>".$row['ID_SENZORJA']." / ".$vrsta."</a>"; 
                        }
                    }
                
                    if($senzor3d){
                        echo "<a class='tile' href='senzor3d.php?id=".$_GET['id']."'>".$senzor3d."</a>"; 
                    }
                ?>
            </div>
        </main>
    </body>
</html>
