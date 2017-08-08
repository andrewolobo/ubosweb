<!-- if you need user information, just put them into the $_SESSION variable and output them here 
Hey, <?php // echo $_SESSION['user_email']; ?>. You are logged in.
Try to close this browser tab and open it again. Still logged in! ;)
-->

<?php
/**
 * Creates Unsynced rows data as JSON
 */
    include_once "libraries/db_functions.php";
	
//	echo "get items ...";
	
    $db = new DB_Functions();
    $updates_items = $db->getUpdatesItems($_SESSION['user_email']);
    $a = array();
    $b = array();
    
	if ($updates_items  != false){
        while ($row = mysql_fetch_array($updates_items )) {   
            $b["id"] = $row["id"];		
            $b["item_name"] = $row["item_name"];
            $b["outlet_code"] = $row["outlet_code"];
            array_push($a,$b);
        }
		
		//$file_name = $_SESSION['user_email']."-items.json";
			// $file = fopen($file_name,"w");
        // fwrite($file,json_encode($a));
    //  fclose($file);
	  
       echo json_encode($a);
    }
?>
<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" 


<a href="index.php?logout">Logout</a>

-->