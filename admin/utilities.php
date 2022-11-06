<?php
// includes all the files needed for the page
include ('../database/dbconnection.php');
include ('../functions.php');
include('../logout.php');

if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (!in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
        }
    }
}

function restoreMysqlDB($filePath, $conn) {
    $sql = '';
    $error = '';
    $mysqli = new mysqli("localhost", "root", "", "payroll");
    $mysqli->query('SET foreign_key_checks = 0');
    if ($result = $mysqli->query("SHOW TABLES")) {
      while($row = $result->fetch_array(MYSQLI_NUM)) {
        $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
      }
    }
    $mysqli->query('SET foreign_key_checks = 1');

    if (file_exists($filePath)) {
        $lines = file($filePath);

        foreach ($lines as $line) {

            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }

            $sql .= $line;

            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach

        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
    } // end if file exists
    return $response;
}
?>

<?php
$connect = new PDO("mysql:host=localhost;dbname=payroll", "root", "");
$get_all_table_query = "SHOW TABLES";
$statement = $connect->prepare($get_all_table_query);
$statement->execute();
$result = $statement->fetchAll();

if(isset($_POST['table']))
{
 $output = '';
 foreach($_POST["table"] as $table)
 {
  $show_table_query = "SHOW CREATE TABLE " . $table . "";
  $statement = $connect->prepare($show_table_query);
  $statement->execute();
  $show_table_result = $statement->fetchAll();

  foreach($show_table_result as $show_table_row)
  {
   $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
  }
  $select_query = "SELECT * FROM " . $table . "";
  $statement = $connect->prepare($select_query);
  $statement->execute();
  $total_row = $statement->rowCount();

  for($count=0; $count<$total_row; $count++)
  {
   $single_result = $statement->fetch(PDO::FETCH_ASSOC);
   $table_column_array = array_keys($single_result);
   $table_value_array = array_values($single_result);
   $output .= "\nINSERT INTO $table (";
   $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
   $output .= "'" . implode("','", $table_value_array) . "');\n";
  }
 }
 $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
 $file_handle = fopen($file_name, 'w+');
 fwrite($file_handle, $output);
 fclose($file_handle);
 header('Content-Description: File Transfer');
 header('Content-Type: application/octet-stream');
 header('Content-Disposition: attachment; filename=' . basename($file_name));
 header('Content-Transfer-Encoding: binary');
 header('Expires: 0');
 header('Cache-Control: must-revalidate');
 header('Pragma: public');
 header('Content-Length: ' . filesize($file_name));
 ob_clean();
 flush();
 readfile($file_name);
 unlink($file_name);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Payroll System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../css/colors/default.css" id="theme" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Data table css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Montserrat:wght@500;600&family=Poppins:wght@500&display=swap" rel="stylesheet">


</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        #error, #success {
        border-radius: 25px;

        }

        .form-control, h4 {
            color: gray;
        }
    </style>


    <div id="main-wrapper">
        <!-- ============================================================== -->

        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->

                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">
                            <!-- Logo icon --><b>

                                <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Logo icon -->
                            </b>

                            <!-- Logo text --><span>

                            <img src="../assets/images/text-logo.png" alt="homepage" class="dark-logo" style="height: 60px;"/>


                        </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class='bx bx-menu-alt-left'></i></a> </li>
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a
                                class="nav-link hidden-sm-down" href="javascript:void(0)">
                                <i class='bx bxl-react bx-spin bx-md' style="color: #33b5e5; position: relative;
                                top: 5px; right: 1.3rem;"></i></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav my-lg-0" style="position: relative; left: 88rem;">
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                          <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic"><img
                              src="../assets/images/admin.png"
                              alt="user"
                              class=""/>
                            <span class="hidden-md-down">Admin &nbsp;</span>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                      </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">

                    <ul id="sidebarnav">

                    <li> <a class="waves-effect waves-dark" href="home.php" aria-expanded="false">
                            <i class='bx bxs-dashboard'></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="employee.php" aria-expanded="false">
                            <i class='bx bxs-user-detail'></i><span class="hide-menu">Employee</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="payroll.php" aria-expanded="false">
                            <i class='bx bx-credit-card' ></i><span class="hide-menu">Payroll</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="deduction.php" aria-expanded="false">
                            <i class='bx bxs-dollar-circle'></i><span class="hide-menu">Salary</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="computation.php" aria-expanded="false">
                            <i class='bx bxs-report'></i><span class="hide-menu">Summary Reports</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="utilities.php" aria-expanded="false">
                            <i class='bx bx-wrench'></i><span class="hide-menu">Utility Management</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="adminprofile.php" aria-expanded="false">
                            <i class='bx bxs-cog'></i><span class="hide-menu">Settings</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="../index.php?logout='1'" aria-expanded="false">
                            <i class='bx bxs-log-out-circle'></i><span class="hide-menu">Sign out</span></a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- =================================== -->


        <div class="page-wrapper">

            <!-- ======================================== -->
            <div class="container-fluid">

                <div class="row page-titles">

                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Utility Management</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <i class='bx bx-home ms-1 mt-2'></i>
                            <i class='bx bx-chevron-right mt-2'></i>
                            <li class="breadcrumb-item active">Backup and Restoration</li>
                        </ol>
                    </div>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    </svg>



                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="mt-4">
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-lg-10 ">
                                            <form method="post" action="" enctype="multipart/form-data">
                                            <input type="file" name="backup_file" class="form form-control-user mb-2"><br>
                                            <input type="submit" name="restore" value="Restore" class="btn btn-primary btn-user" style="width:100%">
                                            </form>
                                        </div>
                                        <div class="col-lg-10">
                                    <div class="row px-5 mt-4">
                                        <div class="col-lg-5">
                                            <h3>BACKUP</h3>
                                            <form id="export_form" method="post">
                                            <h5>Select Tables for Export</h5>
                                            <?php
                                                foreach($result as $table) {
                                            ?>
                                            <div class='checkbox'>
                                                <label><input type='checkbox' class='checkbox_table' name='table[]' value='<?php echo $table[0]; ?>' />
                                                    <?php echo $table[0]; ?>
                                                </label>
                                            </div>
                                            <?php } ?>
                                            <input type='checkbox' onClick='toggle(this)' />&nbsp;&nbsp;&nbsp;<b>Check All</b><br>
                                            <script language="JavaScript">
                                                function toggle(source) {
                                                    checkboxes = document.getElementsByName('table[]');
                                                        for(var i=0, n=checkboxes.length;i<n;i++) {
                                                            checkboxes[i].checked = source.checked;
                                                        }
                                                }
                                            </script>
                                            <input type="submit" name="submit" id="submit" class="btn btn-info btn-block mb-4" value="Backup">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <h3>RESTORE</h3>
                                        <form method="post" action="" enctype="multipart/form-data">
                                        <input type="file" name="backup_file" class="form form-control-user mb-2"><br>
                                        <input type="submit" name="restore" value="Restore" class="btn btn-primary btn-user" style="width:100%">
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- footer -->

            <footer class="footer text-center"> © 2022 Payroll System</a> </footer>

        </div>

    </div>

    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <!--Wave Effects -->
    <script src="../js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../js/custom.min.js"></script>
</body>

</html>
