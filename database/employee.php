<?php 
   session_start();

   function getEmployee(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Employee'); //atererar
        $stmt->execute();
        return $stmt->fetchAll();
    }
?>