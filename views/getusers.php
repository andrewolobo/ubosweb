<?php
/**
 * Creates Unsynced rows data as JSON
 */
    include_once "libraries/db_functions.php";
	
    $db = new DB_Functions();
    $outlets = $db->getOutlets();
    $a = array();
    $b = array();
    
	if ($outlets != false){
        while ($row = mysql_fetch_array($outlets)) {   
            $b["id"] = $row["id"];		
            $b["outlet_name"] = $row["outlet_name"];
            $b["region"] = $row["region"];
            array_push($a,$b);
        }
        echo json_encode($a);
    }
?>