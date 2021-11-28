<?php

require_once "con.php";
$uid = NULL;
session_unset();
session_destroy();

header("Location: signin.php");

?>