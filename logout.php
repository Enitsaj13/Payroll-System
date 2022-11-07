<?php
	include('database/dbconnection.php');
	include('functions.php');

    // log out the user if clicked the button and expire the cookies 

        if($_SESSION['user']['user_type'] == "user"){
        	$email = $_SESSION['user']['email'];
        	date_default_timezone_set('Asia/Manila');
            $todays_date = date("y-m-d h:i:sa");
        	$query = 
	            "UPDATE employee 
	            SET user_timeout='".$todays_date."', isActive='InActive' 
	            WHERE email='".$email."'";
	        mysqli_query($conn, $query);
        }
        session_destroy();
        unset($_SESSION['user']);
        unset($_SESSION['userEmailCred']);
        header("location: index.php");  
?>