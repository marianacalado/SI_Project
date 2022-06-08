<?php 
    require('database/conection.php');
    
    //Login----------------------
    function loginIsValid($email, $password) {
        global $dbh; //definir como variavel global
        global $result;
        $stmt = $dbh->prepare('SELECT * FROM Customer WHERE e_mail = ? AND password = ?'); //selecionar todos os clientes
        $stmt->execute(array($email, sha1($password)));  
        $result = $stmt->fetch(); //ou falso ou array que retorna linha caso seja válido
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

    //registo----------------------------
    //Função que faz o insert de um novo customer 
    function insertUser($name, $phone_number, $email,  $address, $city, $password, $vat_num, $role) //Falta verificar role
    {
        global $dbh; //definir como variavel global
        $stmt = $dbh->prepare('INSERT INTO Customer (name, phone_num, e_mail, address, city, password, VAT_num, role) VALUES (?,?,?,?,?,?,?,?)');
        $stmt->execute(array($name, $phone_number, $email,  $address, $city, sha1($password), $vat_num, $role));  //role tem valor de cust como um empl nao e preciso de se registar
    }

    function getLastUser () {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Customer ORDER BY id_customer DESC LIMIT ?');
        $stmt->execute(array(1));
        return $stmt->fetch();
    }

    //---------------------------------------------
    function getCustomerByEmail(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Customer WHERE e_mail=?');
        $stmt->execute(array($_SESSION["email"]));
        return $stmt->fetch();
    }

    function getEmployeeByEmail(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Employee WHERE e_mail=?');
        $stmt->execute(array($_SESSION["email"]));
        return $stmt->fetch();
    }

?>