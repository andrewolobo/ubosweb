<?php
  include_once 'libraries/db_functions.php';
  
  
  $db = new DB_Functions();
	
	// get userID
	
	//	$userid = $db->getUserID($user_email);
	
	 //  if ($userid != false){
     //   while ($row = mysql_fetch_array($userid)) {  
     //      $user_data = $row["id"];
     
     //   }
	 //  }
	 // echo json_encode($user_data);
	  

    $item  = $db->getAllRows();
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
    		
            $b["updated_on"] = $row["updated_on"];
		
			$b["cat_id"] = $row["cat_id"];
		   
          //  $b["region"] = $row["region"];
            array_push($a,$b);
        }



















?>