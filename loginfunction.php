<?php
// include all the php files that are necessary for this page
include('database/dbconnection.php');
include('functions.php');

// login using email and password
if (isset($_POST['submit'])) {
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);

    if (isset($_POST['remember'])) {
        $remember = escape($_POST['remember']);
    } else {
        $remember = "";
    }

    // Storing google recaptcha response in $recaptcha variable
    //$recaptcha = $_POST['g-recaptcha-response'];

    if (empty($email)) {
        $_SESSION['error'] = "Email is required.";

    } else if (empty($password)) {
        $_SESSION['error'] = "Password is required.";
        // check if the email is valid
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";

    }
    //Gotta turn off the annoying captcha;
    /*else if ($recaptcha == '') {
        $_SESSION['error'] = "Please check the captcha.";
    }

  
    // secret key for google recaptcha
    $secret_key = '6LfblfMgAAAAABFTywpZKkqZV5-dR28LKv4epfPA';
  
    // Hitting request to the URL, Google will
    // respond with success or error scenario
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha;
  
    // Making request to verify captcha
    $response = file_get_contents($url);
  
    // Response return by google is in
    // JSON format, so we have to parse that json
    $response = json_decode($response);*/

    // if no error in the captcha and the validation, then login the user
    //Old if including captcha;
    //if (count($errors) == 0 && $response -> success == true) {
    if (count($errors) == 0) {
        
        //$password = sha1($password); // encrypt the password before storing in the database
        
        $query = "SELECT * FROM employee WHERE email='".$email."' AND password='".$password."';";
        $results = mysqli_query($conn, $query);
        //return $_SESSION['error'] = json_encode($results);
        if (mysqli_num_rows($results) == 1) { // user found in database

            // check if user is admin or user and put user data in session
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin') {

                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in. Welcome Admin " . $_SESSION['user']['name'];
                header('location: admin/home.php');		  
            } else {
                
                date_default_timezone_set('Asia/Manila');
                $todays_date = date("y-m-d h:i:sa");
                $query = 
                "UPDATE employee 
                SET user_timein='".$todays_date."', user_timeout='', isActive='Active' 
                WHERE email='".$email."'";
                mysqli_query($conn, $query);
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in. Welcome " . $_SESSION['user']['name'];

                header('location: userspage.php');
            }
      
        } else {
            $_SESSION['error'] = json_encode($_SESSION['userEmailCred']);//json_encode("Invalid username or password.");
        }
    }   
}


?>