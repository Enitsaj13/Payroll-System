<?php
// include all the php files that are necessary for this page
include ('database/dbconnection.php');
include ('functions.php');

    // insert data into the database
    if(isset($_POST['submit'])) {
        register();
    }

    function register() {

        // insert all the data into the database 
        // avoiding undefined array key error
        global $conn;
        
        $name = escape($_POST['name']);
        $email = escape($_POST['email']);
        $address = escape($_POST['address']);
        $date_hired = ($_POST['date_hired']);
        $password = escape($_POST['password']);

        if (isset($_POST['department'])) {
            $department = escape($_POST['department']);
        } else {
            $department = "";
        }
        if (isset($_POST['contact'])) {
            $contact = escape($_POST['contact']);
        } else {
            $contact = "";
        }
        if (isset($_POST['position'])) {
            $position = escape($_POST['position']);
        } else {
            $position = "";
        }
        if (isset($_POST['employee_type'])) {
            $employee_type = escape($_POST['employee_type']);
        } else {
            $employee_type = "";
        }
        

        // IMPORTANT upload an image to the specific folder 
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image_upload"]["name"]);

        // move the image to the folder (images)
        move_uploaded_file($_FILES["image_upload"]["tmp_name"], $target_file);

        // send the imagename to the database
        $image = basename($_FILES["image_upload"]["name"]);

        // accept specific file types
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // IMPORTANT
        // form validation for the input field 

        if (empty($name)) { 
            $_SESSION['error'] = "Name is required.";

        }else if (!preg_match("/^[a-zA-Z ]*$/", $name)){
            $_SESSION['error'] = "Only letters and white space allowed in name.";
    
        }else if (empty($email)) { 
            $_SESSION['error'] = "Email is required.";

        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = "Invalid email format. Please enter a valid email.";

        }else if (empty($contact)) {
            $_SESSION['error'] = "Contact is required.";
            
        }else if (!preg_match("/^[0-9]*$/", $contact)){
            $_SESSION['error'] = "Only numbers allowed in contact number.";
            
        }else if (empty($address)) {
            $_SESSION['error'] = "Address is required.";
        
        }else if (empty($date_hired)) {
            $_SESSION['error'] = "Date hired is required.";
        
        }else if (empty($department)) {
            $_SESSION['error'] = "Department is required.";
            
        }else if (empty($position)) {
            $_SESSION['error'] = "Position is required.";
            
        }else if (empty($employee_type)) {
            $_SESSION['error'] = "Employee type is required.";
            
        }else if (empty($password)) {
            $_SESSION['error'] = "Password is required.";
            
            // password must be at least 8 characters long and must contain at least one number and one letter.
        }else if (!preg_match("/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/", $password)){
            $_SESSION['error'] = "Password must be at least 8 characters long and must contain at least one number and one letter.";
            
            // check if the email is already exist in the database.
            }else if ($email != "") {
                $sql = "SELECT * FROM employee WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    $_SESSION['error'] = "Email already exists.";
                }
            
        // if image is not uploaded
        if (empty($image)) {
            $_SESSION['error'] = "Please upload an image.";
        }
        // accept only jpg, jpeg, png, gif file types
        else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        // allow only certain file size
        else if ($_FILES["image_upload"]["size"] > 1000000) {
            $_SESSION['error'] = "Sorry, your file is too large.";
        }
    

        /*================================================================*/
        // if there are no errors, insert the student info to the database
        if (empty($_SESSION['error'])) {

            $password = sha1($password); // encrypt the password before storing in the database
            $query = "INSERT INTO employee (name, email, contact, address, date_hired, department, position, employee_type, password, image_upload)
             VALUES ('$name', '$email', '$contact', '$address', '$date_hired', '$department', '$position', '$employee_type', '$password', '$image')";

            $result = mysqli_query($conn, $query);

            if ($result) {
                // if the query is successful
                $_SESSION['success'] = "Employee added successfully.";
                
            } else {
                // if the query is not successful
                $_SESSION['error'] = "Something went wrong. Please try again.";
               

            }
        }
    }
}

?>


