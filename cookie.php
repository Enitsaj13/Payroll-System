<?php
// include all the necessary files
include ('./database/dbconnection.php');

        // setting up the cookie
        if (isset($_POST['submit'])) {

            $email = escape($_POST['email']);

            $password = escape($_POST['password']);

            if (isset($_POST['remember'])) {
                $remember = escape($_POST['remember']);
            } else {
                $remember = "";
            }
            
            
            // if the user check the remember me checkbox, then set the cookie for 30 days
            if ($remember == "on") {
                setcookie('email', $email, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
            } else {
                setcookie('email', "", time() - (86400 * 30), "/");
                setcookie('password', "", time() - (86400 * 30), "/");
            }
            
        }

?>