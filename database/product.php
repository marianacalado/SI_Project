<?php 

    require('database/conection.php');

    function getProductsByCategoryId($id_category) { 
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Product WHERE category_id=?'); 
        $stmt->execute(array($id_category)); 
        return $stmt->fetchAll();
    }

?>