<?php
if (!isset($_SESSION)){
	session_start();
}else{
	header("location: login.php");
	exit();
}
?>