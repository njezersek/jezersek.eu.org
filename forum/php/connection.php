<?php
require "sqlinfo.php";
$mysql = mysqli_connect($host,$username,$password,$dbname);

// Check connection
if (mysqli_connect_errno()){
    //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
    //echo "Success!";
}
?>