<?php
    require_once('../../../backend/database/Database.php');
    require_once('../../../backend/database/Korisnici.php');
   
    header('Content-type: application/json');
    $resenja=Korisnici::getAllKorisnici(Database::getInstance()->getConnection());
	echo json_encode($resenja);
    exit();

?>