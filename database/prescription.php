<?php 
    session_start();
    require('database/conection.php');

    function PrescriptionRegistIsValid($id_prescription, $benf_name, $doct_name){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Prescription WHERE id_prescription = ? AND benf_name = ? AND doct_name=?');
        $stmt->execute(array($id_prescription, $benf_name, $doct_name));
        return $stmt->fetch();
    }

?>