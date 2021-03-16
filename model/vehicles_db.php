<?php

require("model/database.php");

function get_vehicles($sort="price",$filterArray=null)
{
    global $db;
    $filters = array();

    if(isset($filterArray['make_id'])) array_push($filters," make_id = :make_id ");
    if(isset($filterArray['type_id'])) array_push($filters," type_id = :type_id ");
    if(isset($filterArray['class_id'])) array_push($filters," class_id = :class_id ");

    /*https://stackoverflow.com/questions/2542410/how-do-i-set-order-by-params-using-prepared-pdo-statement */
    /*Cannot bind to order by value */
    //Sanitize sort value
    if($sort != "price" && $sort != "year") $sort = "price";//only permitted values

    $query = "SELECT * FROM vehicles
                LEFT JOIN classes ON vehicles.class_id = classes.ID
                LEFT JOIN makes ON vehicles.make_id = makes.ID
                LEFT JOIN types ON vehicles.type_id = types.ID "
                .(empty($filters) ? "" : " WHERE ".implode(" AND ", $filters))
                ." ORDER BY $sort DESC ";

    $statement = $db->prepare($query);

    //$statement->bindValue(':sort', 'price', PDO::PARAM_STR); //cannot bind to Order By

    if(isset($filterArray['make_id'])) $statement->bindValue(':make_id', $filterArray["make_id"]);
    if(isset($filterArray['type_id'])) $statement->bindValue(':type_id', $filterArray["type_id"]);
    if(isset($filterArray['class_id'])) $statement->bindValue(':class_id', $filterArray["class_id"]);

    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}
?>