<?php
include_once("../../../public_html/include/session.php");
require_once('../../../backend/conf/config.php');
require_once('../../../backend/utils/utils.php');
include_once("../../../public_html/plugins/recaptcha/src/autoload.php");
require_once('../../../backend/database/Database.php');
require_once('../../../backend/database/User.php');

try{
	$recaptchaSecret = Configuration::getReCaptchaSecretKey();
	$user_ip = get_ip_address();
	if ($user_ip!="127.0.0.1" && $user_ip!="::1"){
		if ( !isset($_POST['g-recaptcha-response']) ) {
			throw new Exception("ReCaptcha nije postavljen", 500);
		}
		$client_captcha_response = $_POST['g-recaptcha-response'];
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$client_captcha_response&remoteip=$user_ip";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10); //timeout after 10 seconds
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$captcha_verify = curl_exec($ch);
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		$captcha_verify_decoded = json_decode($captcha_verify);
		if(!$captcha_verify_decoded->success){
			throw new Exception("ReCaptcha nije validan", 500);
		}
	}
	
	$logEMail= trim($_POST['logEMail']);
	$logPassword= trim($_POST['logPassword']);
	$result=User::getUser($logEMail,$logPassword,  Database::getInstance()->getConnection());
	if($result!=NULL ){header('Location:index.php');}


	$_SESSION["FIRST_NAME"] = "Ime";
	$_SESSION["LAST_NAME"] = "Prezime";
	$_SESSION["USERNAME"] = "ime.prezime@gmail.com";
	$_SESSION['LAST_LOGIN_TIME'] = time();

    
	
	header('Content-type: application/json');
	http_response_code (200);
	$result = array();
	$result["message"] = "ok";
	$result["redirect_page"] = "index.php";
	echo json_encode($result);
	exit();
}catch(Exception $e){
	header('Content-type: application/json');
	http_response_code ($e->getCode());
	$result = array();
	$result["title"] = _("Neuspešna prijava");
	$result["message"] = $e->getMessage();
	echo  json_encode($result);
	exit();
}
?>