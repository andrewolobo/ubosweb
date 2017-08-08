<?php
 // include the configs / constants for the database connection
// require_once("config/db.php");

 include_once "libraries/db_functions.php";
 

    // create a database connection, using the constants from config/db.php (which we loaded in index.php)
        //    $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			
 
    if($_SERVER['REQUEST_METHOD']=='POST'){
	
		
		echo    $outlet_id = $_POST['outlet_ld'];
       echo     $price = $_POST['price'];
		echo    $item_qty = $_POST['item_Qty'];
		echo    $item_unit = $_POST['item_Unit'];
		echo    $item_longitude = $_POST['item_longitude'];
		echo    $item_latitude = $_POST['item_latitude'];
		 echo   $item_date = $_POST['item_Date'];
		echo    $item_remarks = $_POST['item_remarks'];
		echo    $id = $_POST['_id'];
    
	    $db = new DB_Functions();
    $insert_data = $db->insertData($outlet_id, $price, $item_qty, $item_unit, $item_longitude, $item_latitude, $item_date, $item_remarks,$id);
        
      //  $get_result = $con->query("INSERT INTO prices(COLUMN_PRICE, ITEM_ID) VALUES ($price, $id)"); 
 
        if($insert_data === true){
        echo "Your Data has been Successfully Inserted";
        }else{
        echo "Your Data has not been Successfully Inserted, Please try again";
        }
    }else{
        echo 'error';
    }
?>