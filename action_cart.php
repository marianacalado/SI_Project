<?php
  session_start();
  
  require('database/conection.php');

  if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = array();
  }

  $new_product = array( //info do produto e adiciona-lo
      "id_product"=>$_GET["id_product"],
      "name"=>$_GET["name"],
      "unit_price"=>$_GET["unit_price"],
      "quantity"=>$_GET["quantity"]
    );

   $new_product_id = $_GET["id_product"] = $new_product;


  var_dump($_SESSION["cart"]);
  //quantidade de qual produto


  
   
?>