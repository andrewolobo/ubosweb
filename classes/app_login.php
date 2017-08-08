<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    public function dologinWithPostData()
    {
		//echo "Here ...";
		
		
		$user_emails = $_POST['user_email'];
		
		$user_password =  $_POST['user_password'] ;
		
		echo $user_emails ;
		
		echo $user_password ;
		
		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
		
	   $sql = "SELECT user_name, user_email, user_password_hash FROM users WHERE user_email = '" . $_POST['user_email'] . "';";
		$response = array();
		
		
		       echo   $result_of_login_check = $this->db_connection->query($sql);
        // check login form contents
        
     

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

			echo "Hello ....";
			
                // escape the POST stuff
                $user_email = $this->db_connection->real_escape_string($_POST['user_email']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
             $sql = "SELECT user_name, user_email, user_password_hash FROM users WHERE user_email = '" . $user_email . "'";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {
					
					echo "here ....";

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
					
					
                    $message = "This user does not exist.";
					
					array_push($response, array("code" => $code , "message" => $message));
						
						echo json_encode($response);
						
                }
            } else {
				
				$code = "Login failed";
				
               $message = "Database connection problem.";
				
					array_push($response, array("code" => $code , "message" => $message));
						
						echo json_encode($response);
            }
        
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "You have been logged out.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}

$login = new Login();



$login->dologinWithPostData();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
   // include("views/logged_in.php");
   echo "User is logged in...";

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
  //  include("views/not_logged_in.php");
  
  echo "User is not logged in  logged ";
}


