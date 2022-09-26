<?php
// include all the necessary files for this page
include('../database/dbconnection.php');
include('../logout.php');
session_start();

// display the input in the payroll pages (e.g. Rate, Late, Leave, etc.)

if (isset($_GET['save'])) {

    // get the input from the user
    $name = $_GET['name'];
    $department = $_GET['department'];
    $position = $_GET['position'];
    $rate = $_GET['rate'];
    $day_work = $_GET['day_work'];
    $overtime = $_GET['overtime'];
    $late = $_GET['late'];
    $leave_number = $_GET['leave_number'];
    $absence = $_GET['absence'];
    $deductions = $_GET['deductions'];
    $grosspay = $_GET['grosspay'];
    $netpay = $_GET['netpay'];

    if (empty($day_work)) {
        $_SESSION['error'] = "Please input the number of days work.";
    }
    else if ($day_work > 15) {
        $_SESSION['error'] = "The number of days work cannot be more than 15.";
    }
    // late, leave, absence and overtime are not required, so if they are not inputted, set them to 0
    else if (empty($late)) {
        $late = 0;
    } else if (empty($leave_number)) {
        $leave_number = 0;
    } else if (empty($absence)) {
        $absence = 0;
    } else if (empty($overtime)) {
        $overtime = 0;
    } else if (empty($deductions)) {
        $deductions = 0;
    } else if (empty($grosspay)) {
        $grosspay = 0;
    } else if (empty($netpay)) {
        $netpay = 0;
    } else if ($late > 5) {
        $_SESSION['error'] = "Late cannot be more than 5.";
        header('location: payroll.php');
    } else if ($leave_number > 5) {
        $_SESSION['error'] = "Leave cannot be more than 5.";
        header('location: payroll.php');
    } else if ($absence > 5) {
        $_SESSION['error'] = "Only 5 absence days are allowed.";
        header('location: payroll.php');
    }


    // rate + day work
    $total_work = $rate * $day_work + $overtime;
    
    
    // compute the grosspay
    $grosspay = ($rate * $day_work) + ($overtime * 400);

    // computation for the deductions of SSS / PhilHealth / PAGIBIG
    $sss = $grosspay * 0.03;
    
    $health = $grosspay * 0.02;

    $pagibig = $grosspay * 0.02;
    
    // compute the absence deduction  
    $absence_deduction  = ($rate * $day_work / $day_work ) * $absence;
    
    // compute the leave deduction
    $leave_deduction = ($rate * $day_work / $day_work ) * $leave_number * 0.5;

    // computation for the tax
    if ($grosspay < 25000) {

        $tax = $grosspay * 0.05;
    }
    else if ($grosspay >= 25000)
    {
        $tax = $grosspay * 0.1;
    }
    else if ($grosspay >= 50000)
    {
        $tax = $grosspay * 0.12;
    }
    else if ($grosspay >= 65000)
    {
        $tax = $grosspay * 0.15;
    }
    else if ($grosspay >= 86000)
    {
        $tax = $grosspay * 0.17;
    }

    // compute the deductions of SSS / PhilHealth / PAGIBIG / Tax / late / leave / absence
    $deductions = ($sss + $health + $pagibig + $tax) + ($late * 125) + $leave_deduction + $absence_deduction;

    // compute the netpay
    $netpay = $grosspay - $deductions;
    

    // check if the input is valid
    if (empty($_SESSION['error'])) {
        // insert the input into the database
        $sql = "INSERT INTO payroll_process (name, department, position, rate, day_work, overtime, late, leave_number, absence, grosspay, deductions, netpay) VALUES ('$name', '$department', '$position', '$rate', '$day_work', '$overtime', '$late', '$leave_number', '$absence', '$grosspay', $deductions, '$netpay')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // success
            $_SESSION['success'] = "Payroll has been saved.";
            header('location: payroll.php');
        } else {
            // error
            $_SESSION['error'] = "Payroll has not been saved.";
            header('location: payroll.php');
        }
    }

}


?>