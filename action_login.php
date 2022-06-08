<?php
    session_start();
    
    require('database/conection.php');
    require('database/customer_emp.php');

  
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    
    if (loginIsValid($email, $password)) {
        global $result;
        $_SESSION["email"] = $email;
        if ($result["role"] == "cust") { 
            $_SESSION["role"] = $result["role"];
            header("Location: customer_init.php");
            exit();
        } 
        else 
        {
            $_SESSION["role"] = $result["role"]; 
            header("Location: employee_init.php"); 
            exit();
        }     
    }     
    else {
        $_SESSION["msg3"] = "Login failed!";
    }
    
    header("Location: Login.php");
?>