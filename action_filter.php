<?php
  session_start();
  
  require('database/conection.php');
  //require('database/category.php'); 
  //require('database/product.php');
  //require('database/suplier.php');

  $id_suplier = $_GET["Supplier Select"];
  $id_brand = $_GET["Brand Select"];
  
  if($id_suplier=="none" && $id_brand=="none"){
    $stmt = $dbh->prepare('SELECT * FROM Product'); 
    $stmt->execute(); 
    $result_ = $stmt->fetchAll();
  }
  elseif ($id_suplier=="none"){
    $stmt = $dbh->prepare('SELECT * FROM Product WHERE brand_id=?'); 
    $stmt->execute(array($id_brand)); 
    $result_ = $stmt->fetchAll();
  }
  elseif ($id_brand=="none"){
    $stmt = $dbh->prepare('SELECT * FROM Product 
                            JOIN SupProduct 
                            ON Product.id_product = SupProduct.product_id 
                            WHERE SupProduct.suplier_id = ?');
    $stmt->execute(array($id_suplier)); 
    $result_ = $stmt->fetchAll();
  }
  else {
    $stmt = $dbh->prepare('SELECT * FROM Product 
                            JOIN SupProduct 
                            ON Product.id_product = SupProduct.product_id 
                            WHERE SupProduct.suplier_id = ? 
                            AND Product.brand_id = ?');
                            
    $stmt->execute(array($id_suplier, $id_brand)); 
    $result_ = $stmt->fetchAll();
  }

  $_SESSION["session_products"] = $result_; 
    
?>