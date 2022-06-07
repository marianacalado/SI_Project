<?php 
  session_start();

  require('database/conection.php');
  require('database/customer_emp.php'); 
  
  $name = $_POST["name"];
  $email = $_POST["e_mail"];
  $vat_num = $_POST["VAT_num"];
  $phone_number = $_POST["phone_num"];
  $city = $_POST["city"];
  $address = $_POST["address"];
  $password = $_POST["password"];
  $role = "cust"; //só se pode registar customers 

  //$array = getLastInsertedId();
  //$customer_id = getNewPersonId($array); //a pessoa tem de se registar
  $customer_id = getUserIdByEmail($email);

  //checks de tudo 
  if (strlen($name) == 0) {
    $_SESSION["msg"] = "Must insert your Name!";
    header("Location: Register.php");
    die();
  }

  if (strlen($email) == 0) {
    $_SESSION["msg"] = "Must insert your Email!";
    header("Location: Register.php");
    die();
  }
  
  if (len($vat_num) == 0) {
    $_SESSION["msg"] = "Please insert your Vat Number with 9 numbers!";
    header("Location: Register.php");
    die();
  }

  if (len($phone_number) == 0) {
    $_SESSION["msg"] = "Please insert your Phone Number!";
    header("Location: Register.php");
    die();
  }

  if (strlen($city) == 0) {
    $_SESSION["msg"] = "Please insert your City!";
    header("Location: Register.php");
    die();
  }

  if (strlen($address) == 0) {
    $_SESSION["msg"] = "Please insert your Address!";
    header("Location: Register.php");
    die();
  }

  if (strlen($password) < 4) {
    $_SESSION["msg"] = "Your Password is too short.";
    header("Location: Register.php");
    die();
  }

  //{UNIQUE (VAT_num, phone_num, e-mail)} 
  try {
    insertUser($customer_id, $name, $phone_number, $email,  $address, $city, $password, $vat_num, $role); 
    $_SESSION["msg"] = "Registration Successful!";
    header('Location: customer_init.php');
  } catch(PDOException $e) {
    $err_msg = $e->getMessage();

    if (strpos($err_msg, "Customer.email")==true) {
      $_SESSION["msg"] = "This email already exists!";
      die(header('Location: register.php'));
    }
    if (strpos($err_msg, "Customer.phone_num")==true) {
      $_SESSION["msg"] = "This phone number already exists!";
      die(header('Location: register.php'));
    }
    if (strpos($err_msg, "Customer.VAT_num")==true) {
      $_SESSION["msg"] = "This VAT number already exists!";
      die(header('Location: register.php'));
    }   
    else {
      $_SESSION["msg"] = "Registration failed! ($err_msg)";
      die(header('Location: register.php'));
    }
  }
?>
