<?php 
  session_start();

  require('database/conection.php');
  //require('database/prescription.php');
  
  $id_prescription = $_POST["id_prescription"];
  $benf_name = $_POST["benf_name"];
  $doct_name = $_POST["doct_name"];

  //$order_id = ir buscar pelo product id, a order id na tabela prodorder

    // registo 

    //this fuctions will go to folder prescription
    function insertPrescription($id_prescription, $benf_name, $doct_name) {
        global $dbh;
        $stmt1 = $dbh->prepare('SELECT product_id FROM Prescription WHERE id_prescription = ?');
        $stmt1->execute(array($id_prescription));
        $product_id= $stmt->fetch(); 
        $stmt2 = $dbh->prepare('INSERT INTO Prescription (id_prescription, doct_name, benf_name, product_id, order_id) VALUES (?, ?, ?, ?, ?)');
        $stmt2->execute(array($id_prescription, $benf_name, $doct_name, $product_id));     
    }


?>