<?php

// include the dbconnection.php file
include ('database/dbconnection.php');
// session
session_start();
$_SESSION['userEmailCred'] = "";


// variable declaration
$name = "";
$errors = array(); 

  
    // displaying the error message
    function display_error() {
        global $errors;
    
        if (count($errors) > 0){
            echo '<div class="error">';
                foreach ($errors as $error){
                    echo $error .'<br>';
                }
            echo '</div>';
        }
    }

    // IMPORTANT 
    // return the user by id
    function getUserById($id){
        global $conn;
        $query = "SELECT * FROM employee WHERE id=" . $id;
        $result = mysqli_query($conn, $query);

        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    // escape the string input
    function escape($val){
        global $conn;
        return mysqli_real_escape_string($conn, trim($val));
    }

    // IMPORTANT 
    // 
    function isLoggedIn()
    {
	    if (isset($_SESSION['user'])) {
		    return true;
	    }else{
		    return false;
	}
    }

    // IMPORTANT
    // display the image to the user page 
    $results = mysqli_query($conn, "SELECT * FROM employee");
    $studentinfo = mysqli_fetch_all($results, MYSQLI_ASSOC);

    
    
  
?>