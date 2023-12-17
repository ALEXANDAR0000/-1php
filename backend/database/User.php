
<?php
class User{

    public static function getUser($logEmail, $logPassword,$conn){
    
        $sql = "SELECT * FROM [user] WHERE email=? AND password=?";
        
        if (!$conn){
            throw new Exception("User (getUser) -  Connection failed: " . print_r(sqlsrv_errors(), true));
        }
        $params=array(&$logEmail,hash('sha256',&$logPassword));
        $stmt = sqlsrv_prepare($conn, $sql, $params);
        if (!$stmt) {
            throw new Exception("User (getUser) -  Biding fialed: " . print_r(sqlsrv_errors(), true));
        }
        $exe=sqlsrv_execute($stmt);
        if (!$exe) { 
            throw new Exception("User (getUser) -  Execute failed: " . print_r(sqlsrv_errors(), true));
        } 
    

        while( $row = sqlsrv_fetch_array($stmt)) {

            $result [] = $row;
           
        }
          
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
        return $result;
    }


}
?>