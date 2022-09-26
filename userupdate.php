<?php
// include all the necessary files
include ('database/dbconnection.php');
session_start();

    // edit the user details
    if (isset($_GET['update'])) {

        $id = $_GET['id'];
        $name = $_GET['name'];
        $email = $_GET['email'];
        $contact = $_GET['contact'];
        $address = $_GET['address'];
        $date_hired = $_GET['date_hired'];
        $department = $_GET['department'];
        $position = $_GET['position'];
        $employee_type = $_GET['employee_type'];
        $password = $_GET['password'];
        $query = "UPDATE employee SET name = '$name', email = '$email', contact = '$contact', address = '$address', date_hired = '$date_hired', department = '$department', position = '$position', employee_type = '$employee_type', password = '$password' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = "Details updated successfully";
            header('location: userspage.php');
        } else {
            $_SESSION['error'] = "Failed to update details";
            header('location: userspage.php');
        }
    }

?>  