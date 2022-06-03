<!-- Ficheiro de ação que autentifica o user, nao produz html vai a base de dados introduzir um utilizador com base naqueles paramentros.  
<?php
    
    require('database/conection.php');
    require('database/customer.php');
    //require('database/employee.php'); 

    //get username and password from params:
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role; //aqui tenho de ver porque eu quero que os employees tenham acesso logo

    #if o login for valido:
    if (loginIsValid($email, $password)) {
        global $result;
        $_SESSION["email"] = $email;//-criar sessao para o user
        if ($result["role"] == "emp") { //nao 
            $_SESSION["role"] = $result["role"]; //cria sessao
            header("Location: customer_init.php");
            exit();
          }
         
    }
    else {
        $_SESSION["msg"] = "Login failed!";//-set error msg:"Login Failed!"
    }
    
    header("Location: init_page.php");//-redirecionar para a main 

?>