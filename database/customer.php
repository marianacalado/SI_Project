<?php 
    //Function that get the last inserted member id 
    function getLastInsertedId()
    {
        global $dbh;
        $stmt = $dbh->prepare("SELECT id_customer FROM Customer WHERE id_customer LIKE 'M%'");//-tem de se alterar
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //Function that generates the id of a new customer
    function getNewPersonId($array)
    {
        if(sizeof($array) == 0) {
            return $person_id = 'M1';
        } else {     
            $last_id = json_encode($array[count($array)-1]);
            $num_last = intval(substr($last_id, 15, -2));
            return $person_id = 'M'.(strval($num_last+1));
        } 
    }
    
    // function getStaff(){
    //     global $dbh;
    //     $stmt = $dbh->prepare('SELECT * FROM Person WHERE person_id LIKE "PT%" OR person_id LIKE "NT%" OR person_id LIKE "CW%" OR person_id LIKE "MW%" ');
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    // function getProfessionals($id_info) {
    //     global $dbh;
    //     switch ($id_info){
    //         case "PT":
    //             $stmt = $dbh->prepare('SELECT * FROM Person WHERE person_id LIKE "PT%"');
    //             break;
    //         case "PE":
    //             $stmt = $dbh->prepare('SELECT * FROM Person WHERE person_id LIKE "PT%"');
    //             break;
    //         case "NS":
    //             $stmt = $dbh->prepare('SELECT * FROM Person WHERE person_id LIKE "NT%"');
    //             break;    
    //     }
            
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

?>