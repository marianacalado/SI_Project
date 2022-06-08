 
<?php 
    require('database/conection.php');
    
    function getCategory(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Category'); 
        $stmt->execute(); 
        return $stmt->fetchAll();
    }

    function getCategoryById($id_category) { //esta função vai a tabela das categorias logo por nas categorias 
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Category WHERE id_category=?'); 
        $stmt->execute(array($id_category)); 
        return $stmt->fetch();
    }
?>