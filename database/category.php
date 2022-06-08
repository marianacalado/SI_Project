 
<?php 
    require('database/conection.php');
    
    function getCategory(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Category'); 
        $stmt->execute(); 
        return $stmt->fetchAll();
    }

    function getCategoryById($id_category) { 
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Category WHERE id_category=?'); 
        $stmt->execute(array($id_category)); 
        return $stmt->fetch();
    }
?>