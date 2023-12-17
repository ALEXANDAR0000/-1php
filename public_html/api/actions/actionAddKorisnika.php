<?php

require_once('../../../backend/database/Database.php');
require_once('../../../backend/database/Korisnici.php');
try{
	
	
	
	$jmbg=intval($_POST['jmbg']);
	$ime = ($_POST['ime']);
	$prezime=($_POST['prezime']);	
	$adresa=($_POST['adresa']);
	$datum_rodjenja=($_POST['datum_rodjenja']);
	
	
	Korisnici::addKorisnik($datum_rodjenja, $ime, $prezime, $jmbg, $adresa,  Database::getInstance()->getConnection());
	
	
	header('Content-type: application/json');
	$result = array();
	$result["title"] = _("Dodavanje korisnika");
	$result["message"] = _("Korisnik je uspešno dodat");
	echo json_encode($result);
	exit();
	
}catch(Exception $e){

	header('Content-type: application/json');
	http_response_code (500);
	$result = array();
	$result["message"] = _("Dodavanje nije uspelo").': <br/>'.$e->getMessage();
	$result["title"] =  _("Dodavanje korisnika");
	echo  json_encode($result);
	exit();

}
?>