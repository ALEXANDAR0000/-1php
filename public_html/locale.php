<?php
include_once("include/session.php");
include_once("../backend/utils/utils.php");

if (isset($_GET["lang"])) {
	$link = $_GET["link"];
	$_SESSION["Language"] = $_GET["lang"];
	$folder = "dist/Locale";
	
	$encoding = "UTF8";
	if ($_GET["lang"] == "en_US") {
		$domain = "messages-eng";
		$language = "en_US";
	} else {
		$domain = "messages-srb";
		$language = "sr-Latn-RS";
	}

	/*if (isset($_SESSION["LAST_NAME"])){
		$_SESSION["FIRST_NAME"]=transliteration($_SESSION["FIRST_NAME"]);
		$_SESSION["LAST_NAME"]=transliteration($_SESSION["LAST_NAME"]);
	}*/
	putenv('LANG=' . $language . '.' . $encoding);
	putenv('LANGUAGE=' . $language . '.' . $encoding);
	putenv('LC_ALL=' . $language . '.' . $encoding);
	
	//setlocale(LC_ALL, $language.'.utf8');
	setLocale(LC_ALL, $language . '.' . $encoding);
	bindtextdomain($domain, $folder);
	bind_textdomain_codeset($domain, $encoding);
	textdomain($domain);

	

	
	header('Location: ' . $link);
	exit();
}
?>
