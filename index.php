<?php

/*Require database models */
require_once "model/vehicles_db.php";
require_once "model/makes_db.php";
require_once "model/types_db.php";
require_once "model/classes_db.php";

include "view/header.php";

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch ($action){
    case "viewVehicles":

        /*Sanitize selection paramaters*/
        $make_id    =  filter_input(INPUT_GET, 'Makes', FILTER_VALIDATE_INT);
        $type_id    =  filter_input(INPUT_GET, 'Types', FILTER_VALIDATE_INT);
        $class_id   =  filter_input(INPUT_GET, 'Classes', FILTER_VALIDATE_INT);

        $sort       =  filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING) ?? "price"; //default of price

        $filterArray = [];
        if(!empty($make_id)) $filterArray["make_id"] = $make_id;
        if(!empty($type_id)) $filterArray["type_id"] = $type_id;
        if(!empty($class_id)) $filterArray["class_id"] = $class_id;

        include "view/vehicle_list.php";
        break;

    default:
        include "view/vehicle_list.php";
        break;
}


include "view/footer.php";
//   echo "<pre>"; print_r($toDoItems) ;  echo "</pre>";
