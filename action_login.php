<!-- Ficheiro de ação que autentifica o user, nao produz html vai a base de dados introduzir um utilizador com base naqueles paramentros.  
<?php
    
    session_start(); //para dar uso a variavel session

    //get username and password from params:
    $email = $_POST["email"];
    $password = $_POST["password"];
    //$role; //aqui nao percebo como por role

    //verificar se o mail e password estão corretas
    require('database/conection.php');

    //Function que verifica se o login é valido
    function loginIsValid($email, $password) {
        global $dbh; //definir como variavel global
        global $result;
        $stmt = $dbh->prepare('SELECT * FROM Customers WHERE e_mail=? AND password= ?');
        $stmt->execute(array($email, sha1($password)));  
        $result = $stmt->fetch(); //ou falso ou array que retorna linha caso seja válido
        return $result;
    }

    #if o login for valido:
    if (loginIsValid($email, $password)) {
        global $result;
        $_SESSION["email"] = $email;//-criar sessao para o user
        header("Location: customer_init.php"); 
    }
    else {
        $_SESSION["msg"] = "Login failed!";//-set error msg:"Login Failed!"
    }
        header("Location: init_page.php");//-redirecionar para a main 

?>