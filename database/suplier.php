<?php 
    require('database/conection.php');
    
    function getSuplier(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Suplier'); 
        $stmt->execute(); 
        return $stmt->fetchAll();
    }

?>