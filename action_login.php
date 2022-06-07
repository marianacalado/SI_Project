<?php
    session_start();
    
    require('database/conection.php');
    require('database/customer_emp.php');

    //get username and password from params:
    $email = $_POST["email"];
    $password = $_POST["password"];
    //$role; //aqui tenho de ver porque eu quero que os employees tenham acesso logo

    #if o login for valido:
    if (loginIsValid($email, $password)) {
        global $result;
        $_SESSION["email"] = $email;//-criar sessao para o user
        if ($result["role"] == "cust") { 
            $_SESSION["role"] = $result["role"]; //cria sessao
            header("Location: customer_init.php");
            exit();
        } 
        else 
        {
            $_SESSION["role"] = $result["role"]; //cria sessao
            header("Location: employee_init.php"); 
            exit();
        }     
    }     
    else {
        $_SESSION["msg"] = "Login failed!";//-set error msg:"Login Failed!"
    }
    
    header("Location: Login.php");//-redirecionar para o login
?>