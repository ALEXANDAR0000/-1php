<?php
include_once("include/session.php");
$temp=$_SESSION["Language"]; //backup language session
session_unset();
session_destroy();
session_start();
$_SESSION["Language"] = $temp; //restore only language session
header("location: login.php");
exit();
?>