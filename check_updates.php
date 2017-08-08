<?php
/**
 * Creates Unsynced rows data as JSON
 */
    include_once 'libraries/db_functions.php';
	
	// get post array 
	
	$id = $_POST["id"] ;
	$timestamp = $_POST["timestamp"];
	
		if($_SERVER['REQUEST_METHOD']=='POST')
{
	
    $db = new DB_Functions();
	
	// get userID
	
	//	$userid = $db->getUserID($user_email);
	
	 //  if ($userid != false){
     //   while ($row = mysql_fetch_array($userid)) {  
     //      $user_data = $row["id"];
     
     //   }
	 //  }
	 // echo json_encode($user_data);
	  

    $item  = $db->getUnsyncRow($id ,$timestamp);
   // $item  = $db->getUnsyncRow(1 ,"2017-07-15 19:20:50");

	//echo $item;
  // echo $count = sizeof($item);
   
   // $count;
   
 
	
    $a = array();
    $b = array();

	
	if ($item != false){
		
		//echo "here..";
		
        while ($row = mysql_fetch_array($item)) {   
		
          $b["id"] = $row["indicatorId"];		
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
			$b["timestamp"] = $row["updated_on"];
			$b["cat_id"] = $row["cat_id"];
		   $b["update"] = "false";
          //  $b["region"] = $row["region"];
            array_push($a,$b);
        }
		
		if(empty($a))
		{
		//	echo "empty json string";
			// echo "Empty rowset";
		$update = $db->getRowUpdate($id);
		
		if ($update != false){
        while ($row = mysql_fetch_array($update)) {   
            $b["id"] = $row["indicatorId"];		
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
			$b["timestamp"] = $row["updated_on"];
			$b["cat_id"] = $row["cat_id"];
			$b["update"] = "true";
          //  $b["region"] = $row["region"];
		  
            array_push($a,$b);
        }
		
		
        echo json_encode($a);

	}
		}
		else{
       echo json_encode($a);
		}
	}
	else
	{
			echo "Empty rowset";
		// return new update value
		
		
	
	}
}
	

?>