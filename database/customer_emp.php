<?php 
    require('database/conection.php');
    
    //Function que verifica se o login é valido--login
    function loginIsValid($email, $password) {
        global $dbh; //definir como variavel global
        global $result;
        $stmt = $dbh->prepare('SELECT * FROM Customer WHERE e_mail = ? AND password = ?'); //selecionar todos os clientes
        $stmt->execute(array($email, sha1($password)));  
        $result = $stmt->fetch(); //ou falso ou array que retorna linha caso seja válido
        $_SESSION["cena"] = $result; //print db
        if($result == false) {
            $stmt = $dbh->prepare('SELECT * FROM Employee WHERE e_mail = ? AND password = ?'); //selecionar todos os clientes
            $stmt->execute(array($email, sha1($password)));  
            $result = $stmt->fetch();
            if($result != false) {
                $result["role"] = "emp";
            }
        }
        else {
            $result["role"] = "cust";
        }

        return $result;
        
    }

    // function getLastUser () {
    //     global $dbh;
    //     $stmt = $dbh->prepare('SELECT * FROM user 
    //                           ORDER BY id DESC LIMIT ?');
    //     $stmt->execute(array(1));
    //     return $stmt->fetch();
    // }
    
    // function getUserById ($userid){
    //     global $dbh;
    //     $stmt = $dbh->prepare('SELECT * FROM Costumer WHERE id = ?');
    //     $stmt->execute(array($costumer_id));
    //     return $stmt->fetch();
    // }

    //registo----------------------------
    function getUserIdByEmail($email){
        global $dbh;
        $stmt = $dbh->prepare('SELECT id_customer from Customer where e_mail = ?');
        $stmt->execute(array($email));//executa query na base de dados 
        return $stmt->fetch();
    }

    //Função que faz o insert de um novo customer 
    function insertUser($customer_id, $name, $phone_number, $email,  $address, $city, $password, $vat_num, $role) //Falta verificar role
    {
        global $dbh; //definir como variavel global
        $stmt = $dbh->prepare('INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (?,?,?,?,?,?,?,?,?)');
        $stmt->execute(array($customer_id, $name, $phone_number, $email,  $address, $city, sha1($password), $vat_num, $role));  //role tem valor de cust como um empl nao e preciso de se registar
    }

        // //Function that get the last inserted member id 
    // function getLastInsertedId()
    // {
    //     global $dbh;
    //     $stmt = $dbh->prepare("SELECT id_customer FROM Customer WHERE id_customer LIKE 'M%'");
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    // //Function that generates the id of a new customer
    // function getNewPersonId($array)
    // {
    //     if(sizeof($array) == 0) {
    //         return $person_id = 'M1';
    //     } else {     
    //         $last_id = json_encode($array[count($array)-1]);
    //         $num_last = intval(substr($last_id, 15, -2));
    //         return $person_id = 'M'.(strval($num_last+1));
    //     } 
    // }


    // function getEmployee(){
    //     global $dbh;
    //     $stmt = $dbh->prepare('SELECT * FROM Employee'); //atererar
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    // function getStaff(){
    //     global $dbh;
    //     $stmt = $dbh->prepare('SELECT * FROM Person WHERE person_id LIKE "PT%" OR person_id LIKE "NT%" OR person_id LIKE "CW%" OR person_id LIKE "MW%" ');
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    // function getProfessionals($id_info) {
    //     global $dbh;
    //     switch ($id_info){
    //         case "PT":
    //             $stmt = $dbh->prepare('SELECT * FROM Person WHERE person_id LIKE "PT%"');
    //             break;
    //         case "PE":
    //             $stmt = $dbh->prepare('SELECT * FROM Person WHERE person_id LIKE "PT%"');
    //             break;
    //         case "NS":
    //             $stmt = $dbh->prepare('SELECT * FROM Person WHERE person_id LIKE "NT%"');
    //             break;    
    //     }
            
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }
    

?>