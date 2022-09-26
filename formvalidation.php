<?php

  // form validation for the input field in the edit page, and it is different from the add page   

  if (empty($name)) {
    $_SESSION['error'] = "Name is required";
    header('location: employee.php');

} else if (empty($email)) {
    $_SESSION['error'] = "Email is required";
    header('location: employee.php');

} else if (empty($contact)) {
    $_SESSION['error'] = "Contact is required";
    header('location: employee.php');

} else if (empty($address)) {
    $_SESSION['error'] = "Address is required";
    header('location: employee.php');
    
} else if (empty($date_hired)) {
    $_SESSION['error'] = "Date Hired is required";
    header('location: employee.php');

} else if (empty($department)) {
    $_SESSION['error'] = "Department is required";
    header('location: employee.php');

} else if (empty($position)) {
    $_SESSION['error'] = "Position is required";
    header('location: employee.php');

} else if (empty($employee_type)) {
    $_SESSION['error'] = "Employee Type is required";
    header('location: employee.php');

} 

?>