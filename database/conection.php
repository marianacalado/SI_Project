<?php    
  $dbh = new PDO('sqlite:database/DDL.db'); //CRIA A LIGAÇÃO E GUARDA NA VARIAVEL 
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //retona com nomes nas colunas em vez de penas o indice
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //trow an exception

  //por isto na lista 
  // try { //sempre que quisermos 
  //   $stmt = $dbh->prepare('SELECT * FROM Product WHERE id_category=?'); //isto vai dar erro 
  //   $stmt->execute(array($id_category)); //executa da erro 
  //   $products = $stmt->fetchAll()
  //   var_dumb($products);
  // } catch (PDOException $e) {
  //   die(e$e->getMessage());//para a execução de codigo e para 
  // }
?>