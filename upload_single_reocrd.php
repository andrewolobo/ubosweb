<?php
 // include the configs / constants for the database connection
require_once("config/db.php");

    // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			
 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $price = $_POST['price'];
		$id = $_POST['id'];
    
        
        $get_result = $con->query("INSERT INTO prices(COLUMN_PRICE, ITEM_ID) VALUES ($price, $id)"); 
 
        if($get_result === true){
        echo "Successfully Uploaded";
        }else{
        echo "Price data not uploaded, Please try again";
        }
    }else{
        echo 'error';
    }
?>