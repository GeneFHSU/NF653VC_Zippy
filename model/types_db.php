<?php

    function get_types() {
        global $db;
        $query = "SELECT * 
                    FROM types 
                    ORDER BY Type";
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    };

?>