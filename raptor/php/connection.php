<?php
require "sqlinfo.php";
//                  localhost, root, ********, raptor
$mysql = mysqli_connect($host,$username,$password,$dbname);

// Check connection
if (mysqli_connect_errno()){
    //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
    //echo "Success!";
}

session_start();
?>