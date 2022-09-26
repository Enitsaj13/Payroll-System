<?php

	session_start();
	include ('database/dbconnection.php');

    // Delete a user in the database
    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "DELETE FROM payroll_process WHERE id=$id";
        
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // success
            $_SESSION['success'] = 'Employee deleted successfully';
            header('location: salary.php');
        } else {
            // error
            $_SESSION['error'] = 'Something went wrong while deleting';
            header('location: salary.php');
        }
    }

?>

 


