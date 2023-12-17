<?php
    require_once("../../../backend/database/Korisnici.php");
    require_once("../../../backend/database/Database.php");

    try{
        if(!isset($_POST['id'])){
            throw new Exception('Niste uneli id',500);
        }
        $id = $_POST['id'];
        if($id==""){
            throw new Exception('id nije postavljen',412);
        }
        Korisnici::deleteKorisnik($id, Database::getInstance() -> getConnection());

        header('Content-type: application/json');
        $result = array();
        $result["title"] = _("Brisanje korisnika");
        $result["message"] = _("Korisnik je uspešno izbrisan");
        echo json_encode($result);
        exit();
    } catch (Exception $e) {
    
        header('Content-type: application/json');
        http_response_code(500);
        $result = array();
        $result["message"] = _("Brisanje nije uspelo") . ': <br/>' . $e->getMessage();
        $result["title"] =  _("Brisanje korisnika");
        echo  json_encode($result);
        exit();
    }


?>