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


    // // Verifica se o utilizador chegou a pagina atraves da pagina de login
    // if(isset($_POST['login_button'])) {

    //     $username = htmlspecialchars($_POST['username']);
    //     $password = $_POST['password'];

    //     // Se a password ou username estiverem em branco
    //     if(empty($username) || empty($password)) 
    //     {
    //         // redireciona para a pagina inicial
    //         header("Location: ../pages/login.php?error=emptyfields");
    //         exit();
    //     }
    //     else {

    //         $validation = validateUser($username, $password);

    //         // username and password match
    //         if($validation != false) {

    //             $_SESSION['userID'] = $validation['idUser'];
    //             $_SESSION['name'] = $validation['name'];
    //             $_SESSION['username'] = $validation['username'];
    //             $_SESSION['profile_picture'] = getPhotoPathUser($_SESSION['userID']);


    //             header("Location: ../index.php?login=success");
    //             exit();
    //         }
    //         else {
    //             header("Location: ../pages/login.php?error=wrongpassword");
    //             exit();
    //         }
    //     }
    // }
    // else {
    //     // Redireciona para a pagina login, em caso contrario 
    //     header("Location: ../pages/login.php");
    //     exit();
    // }
?>