<!-- ficheiro de ação que autentifica o user, nao produz html vai a base de dados introduzir um utilizador com base naqueles paramentros  
    <?php
    session_start();                                         // starts the session

    require_once('database/connection.php');                 // database connection
    require_once('database/users.php');                      // user table queries

    if (userExists($_POST['username'], $_POST['password']))  // test if user exists
        $_SESSION['username'] = $_POST['username'];            // store the username

    header('Location: ' . $_SERVER['HTTP_REFERER']);         // redirect to the page we came from
    ?> 
##APAGAR ISTO DE CIMA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

<?php
    
    session_start(); //para dar uso a variavel session

    //get username and password from params:
    $email = $_POST["email"];
    $password = $_POST["password"];

    #verificar se o mail e password estão corretas
    require('database/conection.php');
    require('database/customer.php'); //File with functions que vao buscar os dados á db


    //FALTA VERIFICAR ISTO!!!!
    #if o login for valido:
            //-criar sessao para o user 
        //-redirecionar para a main 
    #else:
        //-set error msg:"Login Failed!"
        //redirecionar para a main page 
    if(loginIsValid($email, $password)) {
        $_SESSION["email"] = $email; //criar sessao para o user
        header('Location:customer_init.php'); //redireciona para a pagina perfil da pessoa
    } else{
        $_SESSION["msg"] = "Login Fail!";//-set error msg:"Login Failed!"
        header('Location:init_page.php'); //redireciona para a pagina main
        
        
        ##die();
    }

?>