<?php

include_once(realpath(__DIR__. '/..') .'/conf/config.php');
class Database{
	protected  static $instance = null;
	
	public static function getInstance(){
		if (!isset(self::$instance)) {
			 self::$instance = new self();
		}
		return self::$instance;
	}

	public function getConnection(){
		$connectionInfo = array( "Database"=>Configuration::getDBName(), "UID"=>Configuration::getDBUser(), "PWD"=>Configuration::getDBPassword(),"ReturnDatesAsStrings"=>true, "CharacterSet" => "UTF-8");
		$conn = sqlsrv_connect( Configuration::getDBServer(), $connectionInfo);
		if ($conn===false){
			throw new Exception("Failed to connect to MSSQL:" . print_r(sqlsrv_errors(), true));
			exit();
		}
		return $conn;
	}
}
?>