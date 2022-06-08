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

  $new_product_id = $_GET["id_product"];

  //incremesntar 
  if (array_key_exists($new_products_id, $_SESSION ["cart"])){
    $_SESSION ["cart"][$new_product_id]["quantity"] = 
  }
  else
  {
    $_SESSION["cart"][$new_product_id] = $new_product;
  }

  var_dump($_SESSION["cart"]);
  //quantidade de qual produto

?>