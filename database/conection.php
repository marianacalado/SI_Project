<?php    
    $dbh = new PDO('sqlite:database/DDL.db'); //CRIA A LIGAÇÃO E GUARDA NA VARIAVEL 
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //retona com nomes nas colunas em vez de penas o indice
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //trow an exception
?>
<!-- $stmt = $dbh->prepare('SELECT * FROM Category');
$stmt->execute(); resultado fica guardado nesta variavel statement

$result = $stmt->fetchAll() //agora esta guardado nesta variavel

print_r($result) //print array

foreach ($result as $row) { //CICLO FOR: VAI BUSCARLINHA A LINHA
  echo $row['address'];
}


--> 