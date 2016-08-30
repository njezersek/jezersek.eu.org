<?php

$mysql = mysqli_connect("localhost","root","Deve10p3r","simplChat");

// Check connection
if (mysqli_connect_errno()){
    //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
    //echo "Success!";
}

session_start();
?>
