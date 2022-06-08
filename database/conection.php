<?php    
  $dbh = new PDO('sqlite:database/DDL.db'); //CRIA A LIGAÇÃO E GUARDA NA VARIAVEL 
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //retona com nomes nas colunas em vez de penas o indice
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //trow an exception

?>