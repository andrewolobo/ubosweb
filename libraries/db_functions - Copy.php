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
     * Getting all indicators
     */
    public function getOutlets() {
        $result = mysql_query("select * FROM outlets");
        return $result;
    }
	
	/**
	* Insert Remote data
	*/
	
	 public function insertData($price , $id) {
		// echo "INSERT INTO prices(COLUMN_PRICE, ITEM_ID) VALUES ($price, '$id')" ; 
        $result = mysql_query("INSERT INTO prices(COLUMN_PRICE, ITEM_ID) VALUES ($price, '$id')");
        return $result;
    }
}
 
?>