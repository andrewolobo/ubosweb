 <?php // echo $_SESSION['user_name']; 


//include 'views/getusers.php';


    include_once "libraries/db_functions.php";
	 $db = new DB_Functions();
	// get userID
	
	
		
		//echo  $hold_user_id;
   
    $categories = $db->getCategories();
    $a = array();
    $b = array();
    
	if ($categories != false){
        while ($row = mysql_fetch_array($categories)) {   
		
           
			$b["cat_id"] = $row["id"];
			$b["cat_name"] = $row["category_name"];

          //  $b["region"] = $row["region"];
		  
            array_push($a,$b);
        }
		
        echo json_encode($a);
		
    }
	
 ?>

