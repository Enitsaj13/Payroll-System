<?php

// mysqli connection 
$conn = mysqli_connect("localhost", "root", '', "payroll");

// $conn = mysqli_connect("sql211.epizy.com", "epiz_32139794", 'VzZVpYlsVuG', "epiz_32139794_student_registration");

// handling errors
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
 
?>

 
