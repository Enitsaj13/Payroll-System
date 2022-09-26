<?php
include ('../database/dbconnection.php');

// search the user
if (isset($_POST['search'])) {
    
    $search = $_POST['search'];
    $query = "SELECT * FROM employee WHERE name LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $contact = $row['contact'];
            $address = $row['address'];
            $date_hired = $row['date_hired'];
            $department = $row['department'];
            $position = $row['position'];
            $employee_type = $row['employee_type'];
            $password = $row['password'];
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$name</td>";
            echo "<td>$email</td>";
            echo "<td>$contact</td>";
            echo "<td>$address</td>";
            echo "<td>$department</td>";
            echo "<td>$position</td>";
            echo "<td>$employee_type</td>";
            echo "<td>$password</td>";
            echo "</tr>";
        }
    } else {
        // if no result found, then display the following message
        $_SESSION['error'] = "No macthing records found";
    }
}

?>