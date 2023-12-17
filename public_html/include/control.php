<?php
include_once("session.php");
include_once(realpath(__DIR__ . '/../..')."/backend/conf/config.php");
if ( !isset($_SESSION["USERNAME"]) ){
	header("Location: ".Configuration::getHost()."/login.php");
	exit();
}else{
	if ((time() - $_SESSION['LAST_LOGIN_TIME']) > Configuration::getLoginTimeout()) {
		header("Location: ".Configuration::getHost()."/logout.php");
		exit;
	  } else {
		$_SESSION['LAST_LOGIN_TIME'] = time();
	  }
}
?>