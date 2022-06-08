<?php
    session_start();
    
    require('database/conection.php');
    require('database/category.php'); 
    require('database/product.php');
    //require('database/suplier.php');

    $name = $_GET["name"];

    function getSuplier(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Suplier'); 
        $stmt->execute(); 
        return $stmt->fetchAll();
      }
    
      $supliers = getSuplier();
    
      $id_suplier= $_GET['id_suplier'];
    
      function getSuplierById($id_suplier) {  
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Suplier WHERE id_suplier=?'); 
        $stmt->execute(array($id_suplier)); 
        return $stmt->fetch();
      }
    
      $suplier = getSuplierById($id_suplier);

        #se botao isset x queri de produtos x
    //     if (loginIsValid($email, $password)) {
    //         global $result;
    //         $_SESSION["email"] = $email;//-criar sessao para o user
    //         if ($result["role"] == "cust") { 
    //             $_SESSION["role"] = $result["role"]; //cria sessao
    //             header("Location: customer_init.php");
    //             exit();
    //         } 
    //         else 
    //         {
    //             $_SESSION["role"] = $result["role"]; //cria sessao
    //             header("Location: employee_init.php"); 
    //             exit();
    //         }     
    //     }     
    //     else {
    //         $_SESSION["msg3"] = "Login failed!";//-set error msg:"Login Failed!"
    //     }
        
    //     header("Location: Login.php");//-redirecionar para o login
?>