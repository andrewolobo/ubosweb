 <?php // echo $_SESSION['user_name']; 


//include 'views/getusers.php';


    include_once "libraries/db_functions.php";
	 $db = new DB_Functions();
	// get userID
	
	
		
		//echo  $hold_user_id;
   
    $indicators = $db->getIndicators();
    $a = array();
    $b = array();
    
	if ($indicators != false){
        while ($row = mysql_fetch_array($indicators)) {   
		
            $b["indicatorId"] = $row["indicatorId"];		
            $b["title"] = $row["title"];
			$b["headline"] = $row["headline"];		
            $b["summary"] = $row["summary"];
			$b["unit"] = $row["unit"];		
            $b["description"] = $row["description"];
			$b["data"] = $row["data"];		
            $b["period"] = $row["period"];
			$b["url"] = $row["url"];		
            $b["updated_on"] = $row["updated_on"];
			$b["change_type"] = $row["change_type"];
			
			$b["change_value"] = $row["change_value"];
			$b["change_desc"] = $row["change_desc"];
			$b["index_value"] = $row["index_value"];
			//$b["timestamp"] = $row["updated_on"];
			$b["cat_id"] = $row["cat_id"];
          //  $b["region"] = $row["region"];
		  
            array_push($a,$b);
        }
		
        echo json_encode($a);
		
    }
	
 ?>

