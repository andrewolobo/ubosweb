<?php
/**
 * DB operations functions
 */
class DB_Functions {
 
    private $db;
 
    //put your code here
    // constructor
    function __construct() {
        include_once 'config/db.php';
		  include_once 'config/db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
 
    }
 

     /**
     * Getting all indicators
     */
    public function getIndicators() {
        $result = mysql_query("select * FROM indicators");
        return $result;
    }

	     /**
     * Getting all categories
     */
    public function getCategories() {
        $result = mysql_query("select * FROM categories");
        return $result;
    }
	
	/**
	Get Key Indicators
	
	*/
  
    /** get updated row for item **/

   	public function getUnsyncRow($id , $timestamp) {
		// echo "select * FROM indicators WHERE indicatorId = $id AND updated_on = '$timestamp'";
		// echo 'select * FROM indicators WHERE `indicatorId` ='.$id.' AND `updated_on` = "'.$timestamp.'"';
        $results = mysql_query('select * FROM indicators WHERE `indicatorId` ='.$id.' AND `updated_on` = "'.$timestamp.'"');
        return $results;
    }
	
	
	/**  Get update for row  **/
	
	public function getRowUpdate($id)
	{
	// echo "select * FROM indicators WHERE indicatorId = $id";
    $result = mysql_query("select * FROM indicators WHERE indicatorId = $id");
    return $result;	
	}

	// get all indicator item values in remote database
	
	public function getAllRows()
	{
		
		$result = mysql_query("select * FROM indicators");
		return $result;
	}
	

}
 
?>