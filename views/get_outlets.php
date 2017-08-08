 <?php // echo $_SESSION['user_name']; 


//include 'views/getusers.php';


    include_once "libraries/db_functions.php";
	 $db = new DB_Functions();
	// get userID
	
	$userid = $db->getUserID($_SESSION['user_email']);
	
	// retrieve user_id from array
	
	if ($userid  != false){
        while ($user_row = mysql_fetch_array($userid)) {   
            $get_user_id = $user_row["user_id"];		

        }
	}	
		
		//echo  $hold_user_id;
   
    $outlets = $db->getOutlets($get_user_id);
    $a = array();
    $b = array();
    
	if ($outlets != false){
        while ($row = mysql_fetch_array($outlets)) {   
            $b["id"] = $row["id"];		
            $b["outlet_id"] = $row["outlet_id"];
          //  $b["region"] = $row["region"];
            array_push($a,$b);
        }
		
			$file_name = $_SESSION['user_email']."-outlets.json";
			$file = fopen($file_name,"w");
        fwrite($file,json_encode($a));
      fclose($file);
		
        echo json_encode($a);
    }
	
 ?>

