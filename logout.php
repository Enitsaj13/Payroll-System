<?php

    // log out the user if clicked the button and expire the cookies 
    if (isset($_GET['logout'])) {

        session_destroy();
        unset($_SESSION['user']);
        header("location: index.php");  
        
    }       
?>