<!--//makes connections to database-->

<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "project9";

session_start();
$uid = $_SESSION['uid'];

$con = mysqli_connect($host,$user,$pass,$database);



?>