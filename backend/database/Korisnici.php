<?php

class Korisnici{

    public static function getAllKorisnici($conn){
        $sql = "SELECT * FROM korisnik";

        if (!$conn){
            throw new Exception("Korisnici (getAllKorisnici) -  Connection failed: " . print_r(sqlsrv_errors(), true));
        }
        $stmt= sqlsrv_query($conn, $sql);
        if (!$stmt) { 
            throw new Exception("Korisnici (getAllKorisnici) -  Execute failed: " . print_r(sqlsrv_errors(), true));
        }
        $ret = array();
        $i= 0;
        while ($row = sqlsrv_fetch_array($stmt)){
            
            $ret[$i] = array(
                "no" => $i+1,
                "id" => $row["id"],
                "datum_rodjenja" => $row["datum_rodjenja"],
                "ime" => $row["ime"],
                "prezime" => $row["prezime"],
                "jmbg" => $row["jmbg"],
                "adresa" => $row["adresa"],
            );
           
            $ret[$i]["datum_rodjenja"]=join(".", array_reverse(explode('-', $ret[$i]["datum_rodjenja"])));
            $i++; 
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
        return $ret;
    }


    public static function addKorisnik($datum_rodjenja, $ime, $prezime, $jmbg, $adresa, $conn){
    
        $sql = "INSERT INTO korisnik (datum_rodjenja, ime, prezime, jmbg, adresa)
				VALUES (?, ?, ?, ?, ?);";
        
        if (!$conn){
            throw new Exception("Korisnici (addKorisnik) -  Connection failed: " . print_r(sqlsrv_errors(), true));
        }
        $params=array(&$datum_rodjenja, &$ime, &$prezime, &$jmbg, &$adresa);
        $stmt = sqlsrv_prepare($conn, $sql, $params);
        if (!$stmt) {
            throw new Exception("Korisnici (addKorisnik) -  Biding fialed: " . print_r(sqlsrv_errors(), true));
        }
        $exe=sqlsrv_execute($stmt);
        if (!$exe) { 
            throw new Exception("Korisnici (addKorisnik) -  Execute failed: " . print_r(sqlsrv_errors(), true));
        } 
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
        return true;
    }
    public static function getKorisnika($id, $conn){
    
        $sql = "SELECT * FROM korisnik WHERE id=$id";
        
        if (!$conn){
            throw new Exception("Korisnici (addKorisnik) -  Connection failed: " . print_r(sqlsrv_errors(), true));
        }
        $params=array(&$id);
        $stmt = sqlsrv_prepare($conn, $sql, $params);
        if (!$stmt) {
            throw new Exception("Korisnici (getKorisnik) -  Biding fialed: " . print_r(sqlsrv_errors(), true));
        }
        $exe=sqlsrv_execute($stmt);
        if (!$exe) { 
            throw new Exception("Korisnici (getKorisnik) -  Execute failed: " . print_r(sqlsrv_errors(), true));
        } 

        

        $datum_rodjenja='';
        $ime='';
        $prezime='';
        $jmbg='';
        $adresa='';
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC )) {
            $datum_rodjenja= $row['datum_rodjenja'];
            $ime= $row['ime'];   
            $prezime= $row['prezime'];
            $jmbg= $row['jmbg'];
            $adresa= $row['adresa'];
            $result [] = $row;
           
        }
          
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
        return $result;
    }


    public static function deleteKorisnik($id,$conn){
        $sql = "DELETE FROM korisnik where id=?";

        if (!$conn){
            $message=print_r(sqlsrv_errors(), true);
            if (isset(sqlsrv_errors()[0]["message"])){
                $message=sqlsrv_errors()[0]["message"];
            }
            throw new Exception("Korisnici (deleteKorisnik) -  Connection failed: " . $message);
        }

        $params = array(&$id);
        $stmt = sqlsrv_prepare($conn, $sql, $params);
        if(!$stmt){
            $message=print_r(sqlsrv_errors(), true);
            if (isset(sqlsrv_errors()[0]["message"])){
                $message=sqlsrv_errors()[0]["message"];
            }
            throw new Exception("Korisnici (deleteKorisnik) -  Biding failed: " . $message);
        }
        $exe = sqlsrv_execute($stmt);
        if(!$exe){
            $message=print_r(sqlsrv_errors(), true);
            if (isset(sqlsrv_errors()[0]["message"])){
                $message=sqlsrv_errors()[0]["message"];
            }
            throw new Exception("Korisnici (deleteKorisnik) -  Execute failed: " . $message);
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
        return true;
    }
    public static function updateKorisnika($id, $datum_rodjenja,  $ime, $prezime, $jmbg, $adresa, $conn){
        
        $sql = "UPDATE korisnik SET  datum_rodjenja=?, ime=?, prezime=?, jmbg=?, adresa=?  WHERE id=?";
        
        if (!$conn){
            $message=print_r(sqlsrv_errors(), true);
            if (isset(sqlsrv_errors()[0]["message"])){
                $message=sqlsrv_errors()[0]["message"];
            }
            throw new Exception("Korisnici (updateKorisnici) -  Connection failed: " . $message);
        }
        $params=array(&$datum_rodjenja,&$ime, &$prezime, &$jmbg, &$adresa, &$id);
        $stmt = sqlsrv_prepare($conn, $sql, $params);
        if (!$stmt) {
            $message=print_r(sqlsrv_errors(), true);
            if (isset(sqlsrv_errors()[0]["message"])){
                $message=sqlsrv_errors()[0]["message"];
            }
            throw new Exception("Korisnici (updateKorisnika) -  Biding failed: " .$message);
        }
        $exe=sqlsrv_execute($stmt);
        if (!$exe) { 
            $message=print_r(sqlsrv_errors(), true);
            if (isset(sqlsrv_errors()[0]["message"])){
                $message=sqlsrv_errors()[0]["message"];
            }
            throw new Exception("Korisnici (updateKorisnika) -  Execute failed: " . $message);
        } 
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
        return true;
    }
}




?>