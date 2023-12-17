<?php
class Configuration {

	//host
	public static $host =  "https://restitucija.rs";
	public static $host_test =  "https://test.restitucija.rs";
	public static $host_debug = "http://alexaadd";

	//login timeout
	protected static $login_timeout  = 900;
	protected static $login_timeout_test = 900;
	protected static $login_timeout_debug = 900;

	///< recaptha
	private static $reCaptchaPublicKey="6LfO17UcAAAAACeW4IhvETUarwIbr4U2x5a2iSSt";
	private static $reCaptchaSecretKey="6LfO17UcAAAAADuXXEEzxLySkS5yjJMqHHnjHxtc";
	// Database
	protected static $db_server ='HP-NT';
	protected static $db_server_test = 'HP-NT';
	protected static $db_server_debug ='HP-NT';	
	
	protected static $db_user = 'alexa';
	protected static $db_user_test = 'alexa';
	protected static $db_user_debug = 'alexa';
	
	protected static $db_dbname  = 'Demo2DB';
	protected static $db_dbname_test = 'Demo2DB';
	protected static $db_dbname_debug = 'Demo2DB';
	
	protected static $db_password  = 'alexa';
	protected static $db_password_test = 'alexa';
	protected static $db_password_debug = 'alexa';

	
	public static $version = "1.0.0";

	
	public static function getTitle(){				
		return _("Example");
	}	

	public static function isProduction(){	
		if ($_SERVER['SERVER_NAME']=='alexaadd.rs' || $_SERVER['SERVER_NAME']=='alexaadd.rs'){
			return true;
		}else{
			return false;
		}
	}

	public static function isDebug(){
		if ($_SERVER['SERVER_NAME']=='localhost' || $_SERVER['SERVER_NAME']=='127.0.0.1' || $_SERVER['SERVER_NAME']=='alexaadd'){
			return true;
		}else{
			return false;
		}
	}

	public static function getDBName(){		
		if ( self::isDebug()){
			return self::$db_dbname_debug;
		}else if (self::isProduction()){
			return self::$db_dbname;
		}else{
			return self::$db_dbname_test;
		}
	}
	public static function getDBUser(){
		if ( self::isDebug()){
			return self::$db_user_debug;
		}else if (self::isProduction()){
			return self::$db_user;
		}else{
			return self::$db_user_test;
		}
	}

	public static function getDBPassword(){		
		if ( self::isDebug()){
			return self::$db_password_debug;
		}else if (self::isProduction()){
			return self::$db_password;
		}else{
			return self::$db_password_test;
		}
	}
	public static function getDBServer(){
		if ( self::isDebug()){
			return self::$db_server_debug;
		}else if (self::isProduction()){
			return self::$db_server;
		}else{
			return self::$db_server_test;
		}
	}
	public static function getReCaptchaPublicKey(){	
		return self::$reCaptchaPublicKey;
	}
	public static function getReCaptchaSecretKey(){
		return self::$reCaptchaSecretKey;
	}
	public static function getLoginTimeout(){		
		if ( self::isDebug()){
			return self::$login_timeout_debug;
		}else if (self::isProduction()){
			return self::$login_timeout;
		}else{
			return self::$login_timeout_test;
		}
	}
	public static function getHost(){
		if (self::isDebug()){
			return self::$host_debug;
		}else if (self::isProduction()){
			return self::$host;
		}else{
			return self::$host_test;
		}
		
	}
	
}
	

?>