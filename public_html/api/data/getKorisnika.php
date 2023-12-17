<?php
    require_once("../../../backend/database/Korisnici.php");
    require_once("../../../backend/database/Database.php");

    
        if(!isset($_GET['id'])){
            throw new Exception('Niste unijeli id',500);
        }
        $id = $_GET['id'];
        if($id==""){
            throw new Exception('id nije postavljen',412);
        }
       
        echo json_encode( Korisnici::getKorisnika($id, Database::getInstance()->getConnection()));
        
        


?>