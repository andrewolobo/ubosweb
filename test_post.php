<?php
		if($_SERVER['REQUEST_METHOD']=='POST')
{
	
	  $a = array();
    $b = array();
	
	$b["cat_id"] = 1;
			$b["update"] = "true";
          //  $b["region"] = $row["region"];
		  
            array_push($a,$b);
			 echo json_encode($a);
}


?>