<?php
/**
 * Creates Unsynced rows data as JSON
 */
    include_once "libraries/db_functions.php";
	
//	echo "get items ...";
	
    $db = new DB_Functions();
	
	// get userID
	
	$userid = $db->getUserID($_SESSION['user_email']);
	
	// retrieve user_id from array
	
	if ($userid  != false){
        while ($user_row = mysql_fetch_array($userid)) {   
            $get_user_id = $user_row["user_id"];		

        }
	}	
	
	// get the outlet ID
	
	$outlet_id = $db->getUserOutletID($get_user_id);
	
	   $a_outlets = array();
    $b_outlets = array();
	$sql_or_string = "";
	
	if ($outlet_id != false){
        while ($row = mysql_fetch_array($outlet_id)) {   
		
         $b_outlets["outlet_id"] = $row["outlet_id"];	
			
			// build SQL string to chain items from the outlet ID
			
			if($sql_or_string == "")
			{
				
				$sql_or_string .= " outlet_id =".$b_outlets["outlet_id"];
				
			}
			else
			{
			
			$sql_or_string .= " OR outlet_id =".$b_outlets["outlet_id"];
			}

            
				
			
		  
    //  echo json_encode($a_items);
    } 
		}
		 $sql_or_string;
		
		// retrieve items 

            $items = $db->getItems($sql_or_string);
	
		$a = array();
            $a_items = array();
            $b_items = array();
    
	            if ($items != false){
                   while ($row = mysql_fetch_array($items)) {   
                        $b_items["id"] = $row["id"];		
                        $b_items["item_id"] = $row["item_id"];
                        //  $b["outlet_code"] = $row["outlet_code"];
                        array_push($a_items,$b_items);
                       }
					    echo json_encode($a_items);
                }
				
		
?>
