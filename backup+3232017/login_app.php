<?php

/**
 * Class login
 * handles the user's login and logout process
 */

    /**
     * log in with post data
     */
  
		 session_start();
		 
		 /**
     * @var object The database connection
     */
    $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
     $messages = array();

		 
		$response = array();
		
		echo $_POST['user_email'] ; 
		
		
		echo $_POST['user_password'] ;
		
        // check login form contents
        if (empty($_POST['user_email'])) {
            $errors = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $errors = "Password field was empty.";
        } elseif (!empty($_POST['user_email']) && !empty($_POST['user_password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $db_connection = new mysqli("127.0.0.1", "root", "", "cpi_capi_db");
			
			define('HOST','localhost');
            define('USER','root');
            define('PASS','');
           define('DB','cpi_capi_db');
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 
if(!$con)
{
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

else {
echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($con) . PHP_EOL;

           
            // if no connection errors (= working database connection)
            if (!empty($_POST['user_email']) && !empty($_POST['user_password'])) {

                // escape the POST stuff
                $user_email = $con->real_escape_string($_POST['user_email']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                echo $sql = "SELECT user_name, user_email, user_password_hash
                        FROM users
                        WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_email . "';";
                $result_of_login_check = $con->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_login_status'] = 1;
						$code = "Login Successful";
						
						array_push($response, array("code" => $code , "username" => $_SESSION['user_name'] , "useremail" =>  $_SESSION['user_email'] ));
						
						echo json_encode($response);

                    } else {
						
						$code = "Login failed";  
						
						$message = "Wrong password. Try again.";
						
						array_push($response, array("code" => $code , "message" => $message));
						
						echo json_encode($response);
						
                      
                    }
                } else {
					
					$code = "Login failed";  
					
					
                   echo  $message = "This user does not exist.";
					
					array_push($response, array("code" => $code , "message" => $message));
						
						echo json_encode($response);
						
                }
            } else {
				
				echo "Login failed...";
				
				$code = "Login failed";
				
               $message = "Database connection problem.";
				
					array_push($response, array("code" => $code , "message" => $message));
						
						echo json_encode($response);
            }
        }
		
		}
    
mysqli_close($con);
    