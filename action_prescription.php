<?php 
  session_start();

  require('database/conection.php');
  //require('database/prescription.php');
  
  $id_prescription = $_POST["id_prescription"];
  $benf_name = $_POST["benf_name"];
  $doct_name = $_POST["doct_name"];

    // registo 
    //this fuctions will go to folder prescription
    function insertPrescription($id_prescription, $benf_name, $doct_name) {
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO Prescription (id_prescription, doct_name, benf_name) VALUES (?, ?, ?)');
        $stmt->execute(array($id_prescription, $benf_name, $doct_name));
    }
    
    //checks
    if (strlen($id_prescription) == 0 ) {
    $_SESSION["msg"] = "Must insert id number";
    header("Location: NewOrder.php");
    die();
    }

    if (strlen($benf_name) == 0) {
    $_SESSION["msg"] = "Must insert id number.";
    header("Location: NewOrder.php");
    die();
    }

    if (strlen($doct_name) == 0) {
    $_SESSION["msg"] = "Password must have at least 4 characters.";
    header("Location: NewOrder.php");
    die();
    }
    
    try {
        insertPrescription($id_prescription, $benf_name, $doct_name);
        $_SESSION["msg"] = "Registration successful!";
        header('Location: myOrders.php');
    } catch(PDOException $e) {
        $err_msg = $e->getMessage(); //por mensAEM 
        $_SESSION["msg"] = "Registration failed! ($err_msg)";
        header("Location: NewOrder.php");

        // if (strpos($err_msg, "UNIQUE")) {
        //     $_SESSION["msg"] = "Presccription already exists!";
        // } else {
        //     $_SESSION["msg"] = "Registration failed! ($err_msg)";
        // }

        // header("Location: NewOrder.php");
    }

?>