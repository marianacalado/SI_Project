<!-- ficheiro de ação regista os users, nao tem html vai a base de dados introduzir um utilizador com base naqueles paramentros  -->

<?php 
  session_start();

  require('database/conection.php');
  require('database/customer.php'); //Ficheiro com functions do customer que vao buscar á db
  //require('database/employee.php'); //Ficheiro com functions que vao buscar á db

  

  $name = $_POST["name"];
  $email = $_POST["email"];
  $vat_num = $_POST["VAT number"];
  $phone_number = $_POST["phoneNumber"];
  $city = $_POST["city"];
  $address = $_POST["address"];
  $password = $_POST["password"];
  $role = "cust"

  //$array = getLastInsertedId(); //aqui está a ir buscar os clientes á base de dados 
  //$customer_id = getNewPersonId($array); //a pessoa tem de se registar

    //checks de tudo 
  if (strlen($name) == 0) {
    $_SESSION["msg"] = "Must put your Name!";
    header("Location: Register.php");
    die();
  }

  if (strlen($email) == 0) {
    $_SESSION["msg"] = "Must put your Email!";
    header("Location: Register.php");
    die();
  }
  
  if (strlen($vat_num) == 0) {
    $_SESSION["msg"] = "Must put your Vat Number!";
    header("Location: Register.php");
    die();
  }

  if (strlen($phone_number) == 0) {
    $_SESSION["msg"] = "Must put your Phone Number!";
    header("Location: Register.php");
    die();
  }

  if (strlen($city) == 0) {
    $_SESSION["msg"] = "Must put your City!";
    header("Location: Register.php");
    die();
  }

  if (strlen($address) == 0) {
    $_SESSION["msg"] = "Must put your Address!";
    header("Location: Register.php");
    die();
  }

  if (strlen($password) == 0) {
    $_SESSION["msg"] = "Must have a Password!";
    header("Location: Register.php");
    die();
  }

  //{UNIQUE (VAT_num, phone_num, e-mail)} Como por isto?
  // try {
  //   insertUser($customer_id, $name, $phone_number, $email,  $address, $city, $password, $vat_num, $role); //role tem de ser igual a um cost
  //   $_SESSION["msg"] = "Registration successful!";
  //   header('Location: customer_init.php');
  // } catch(PDOException $e) {
  //   $err_msg = $e->getMessage();

  //   if (strpos($err_msg, "UNIQUE")) {
  //     $_SESSION["msg"] = "Username already exists!";
  //   } else {
  //     $_SESSION["msg"] = "Registration failed! ($err_msg)";
  //   }
  //   header("Location: Register.php");
  // }

?>
