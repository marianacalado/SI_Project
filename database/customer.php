<?php 
    //SÓ ESTA FUNÇÃO OU PODE SE ADICIONAR PESSOAS QUE NAO ESTAO NA BASE DE DADOS?
    
    //Function that get the last inserted member id 
    function getLastInsertedId()
    {
        global $dbh;
        $stmt = $dbh->prepare("SELECT id_customer FROM Customer WHERE id_customer LIKE 'M%'");//-tem de se alterar
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //Function that generates the id of a new member
    function getNewPersonId($array)
    {
        if(sizeof($array) == 0) {
            return $person_id = 'M1';
        } else {     
            $last_id = json_encode($array[count($array)-1]);
            $num_last = intval(substr($last_id, 15, -2));
            return $person_id = 'M'.(strval($num_last+1));
        } 
    }

    //Function that creates a new Customer
    function insertUser($customer_id, $name, $phone_number, $email,  $address, $city, $password, $vat_num, $role) //Falta role
    {
        global $dbh; //definir como variavel global
        $stmt = $dbh->prepare('INSERT INTO Customer (id_customer, name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (?,?,?,?,?,?,?,?,?)');
        $stmt->execute(array($customer_id, $name, $phone_number, $email,  $address, $city, sha1($password), $vat_num, $cust));  //role aqui tem de se dar um valor de cust como role nao e preciso pedir 
    }

     //Function que verifica se o login é valido
     
    function loginIsValid($email, $password) 
    {
         global $dbh; //definir como variavel global
         $stmt = $dbh->prepare('SELECT * FROM Customers WHERE e_mail=? AND password= ?');
         $stmt->execute(array($email, sha1($password)));  
         return $stmt->fetch(); //ou falso ou array que retorna linha caso seja válido
    }
    







    
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