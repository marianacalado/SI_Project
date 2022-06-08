<?php 
    require('database/conection.php');
    
    function getBrand(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Brand'); 
        $stmt->execute(); 
        return $stmt->fetchAll();
    }

?>