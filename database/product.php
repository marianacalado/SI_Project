<?php 

    function getProductsByCategoryId($id_category) { //por no file de products
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Product WHERE category_id=?'); //seleciona todos os produtos de uma determinada categoria 
        $stmt->execute(array($id_category)); 
        return $stmt->fetchAll();
    }

?>