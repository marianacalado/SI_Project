<!-- ficheiro de ação regista os users, nao tem html vai a base de dados introduzir um utilizador com base naqueles paramentros  -->

<?php
    #get username and password from params
    #verificar se o mail e password estao corretas
    #if o login for valido:
        //-criar sessao para o user 
        //-redirecionar para a main 
    #else:
        //-set error msg:"Login Failed!"
        //redirecionar para a main page 

    session_start();

    require('database/conection.php');
    require('database/customer.php'); //File with functions que vao buscar os dados á db

    $name = $_POST["name"];
    $email = $_POST["email"];
    $vat_num = $_POST["VAT number"];
    $phone_number = $_POST["phoneNumber"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    //$role = $_POST["password"];

    $array = getLastInsertedId(); //aqui está a ir buscar os clientes á base de dados 
    $customer_id = getNewPersonId($array); //isto se for possível adicionar pessoas que nao estejam na base de dados !!!! mudar no customer


    //fazer os checks todos FALTA!!
    try {
        if(strlen($email) == 0) {
            $_SESSION["msg"] = "Registration Successfull!";
            header('Location:customer_init.php'); //redireciona para a pagina perfil da pessoa
            die();
        }
    }  

    insertUser($customer_id, $name, $phone_number, $email,  $address, $city, $password, $vat_num, $role);

    // try{ //forma prof
    //     insertUser($customer_id, $name, $phone_number, $email,  $address, $city, $password, $vat_num, $role);
    //     $_SESSION["msg"] = "Registration Successfull!";
    //     header('Location:customer_init.php'); //redireciona para a pagina perfil da pessoa
    // }   
    // catch(PDOException $e){
    //         $_SESSION["msg"] = "Registration failed!";
    //         header('Location:Register.php');
    // }


    //try { //sempre que quisermos  exemplo prof
        //   $stmt = $dbh->prepare('SELECT * FROM Product WHERE id_category=?'); //isto vai dar erro 
        //   $stmt->execute(array($id_category)); //executa da erro 
        //   $products = $stmt->fetchAll()
        //   var_dumb($products);
        // } catch (PDOException $e) {
        //   die(e$e->getMessage());//para a execução de codigo e para 
        // }
    


    
?>
