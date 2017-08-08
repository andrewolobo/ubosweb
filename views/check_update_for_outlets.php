
<?php



    include_once "libraries/db_functions.php";
	
    $db = new DB_Functions();
    $updates_outlets = $db->getUpdatesOutlets($_SESSION['user_email']);
    $a = array();
    $b = array();
    
	if ($updates_outlets != false){
        while ($row = mysql_fetch_array($updates_outlets)) {   
            $b["id"] = $row["id"];		
            $b["outlet_name"] = $row["outlet_name"];
          //  $b["region"] = $row["region"];
            array_push($a,$b);
        }
		
			//$file_name = $_SESSION['user_email']."-outlets.json";
			//$file = fopen($file_name,"w");
        // fwrite($file,json_encode($a));
      // fclose($file);
		
      echo json_encode($a);
    }
	
 ?>

