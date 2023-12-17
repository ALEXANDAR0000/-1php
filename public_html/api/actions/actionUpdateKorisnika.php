<?php
require_once('../../../backend/database/Database.php');
require_once('../../../backend/database/Korisnici.php');

try{
	$jmbg=($_POST['jmbg']);
	$ime = ($_POST['ime']);
	$prezime=($_POST['prezime']);	
	$adresa=($_POST['adresa']);
	$datum_rodjenja=($_POST['datum_rodjenja']);
	
	if (!isset($_POST['id'])) {
		throw new Exception('Niste uneli id', 500);
	}
	$id = $_POST['id'];
	if ($id == "") {
		throw new Exception('id is not set', 412);
	}

			
	

	
	
	Korisnici::updateKorisnika($id, $datum_rodjenja, $ime, $prezime, $jmbg, $adresa, Database::getInstance()->getConnection());
	
	header('Content-type: application/json');
	$result = array();
	$result["title"] = _("Izmjena korisnika");
	$result["message"] = _("Korisnik je uspešno izmenjen");
	echo json_encode($result);
	exit;
	
}catch(Exception $e){

	header('Content-type: application/json');
	http_response_code (500);
	$result = array();
	$result["message"] = _("Izmjena nije uspela").': <br/>'.$e->getMessage();
	$result["title"] =  _("Izmjena korisnika");
	echo  json_encode($result);
	exit;

}

?>