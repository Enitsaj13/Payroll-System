<?php
// includes all the files needed for the page
include ('database/dbconnection.php');
include('logout.php');
include ('functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Payroll System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="./fonts/font-awesome-4.7.0/css/font-awesome.min.css">
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

        .form-control {
            color: gray;
        }
    </style>
 

    <div id="main-wrapper">
        <!-- ============================================================== -->

        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
           
                <div class="navbar-header">
                    <a class="navbar-brand" href="userdashboard.php">
                            <!-- Logo icon --><b>
                            
                                <img src="./assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Logo icon -->
                            </b>
                        
                            <!-- Logo text --><span>
                            
                            <img src="./assets/images/text-logo.png" alt="homepage" class="dark-logo" style="height: 60px;"/>


                        </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
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
                    
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0" style="position: relative; left: 88rem;">
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                          <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic"><img
                              src="assets/images/user.png"
                              alt="user"
                              class=""/>
                            <span class="hidden-md-down">User &nbsp;</span>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                      </ul>
                </div>
            </nav>
        </header>
        <!-- ======================================= -->
      
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">     
                        <li> <a class="waves-effect waves-dark" href="userdashboard.php" aria-expanded="false">
                            <i class='bx bxs-dashboard'></i><span class="hide-menu">Dashboard</span></a>
                        </li>     
                        <li> <a class="waves-effect waves-dark" href="userspage.php" aria-expanded="false">
                            <i class='bx bxs-user-circle'></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="ledger.php" aria-expanded="false">
                            <i class='bx bx-columns'></i><span class="hide-menu">Ledger</span></a>
                        </li>
                        
                        <li> <a class="waves-effect waves-dark" href="index.php?logout='1'" aria-expanded="false">
                            <i class='bx bxs-log-out-circle'></i><span class="hide-menu">Sign out</span></a>
                        
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
                        <h3 class="text-themecolor">User Details</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <i class='bx bx-home ms-1 mt-2'></i>
                            <i class='bx bx-chevron-right mt-2'></i>
                            <li class="breadcrumb-item active">My Information</li>
                        </ol>
                    </div>
                </div>
                     <!-- display success using session -->

                     <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>
                        </svg>

                        <?php 

                            if(isset($_SESSION['success'])){


                                echo "<div id='success' class='alert alert-success pull-center alert-dismissible fade show text-center w-50' role='alert'>
                                <svg class='bi flex-shrink-0 me-2' width='17' height='17' mr-1 role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span></button>
                                    ".$_SESSION['success']."
                                </div>";

                                unset($_SESSION['success']);
                            }
                        ?>
                                
           
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="mt-4">
                                <img src="<?php echo 'images/' . $_SESSION['user']['image_upload']; ?>" 
								alt="profile picture" class="img-cicle" width="150">
                                    <h4 class="card-title mt-2">
                                        <?php echo $_SESSION['user']['name']; ?>
                                    </h4>
                                    <h6 class="card-subtitle">Payroll System 2022</h6>
                                    <div class="row text-center justify-content-md-center">

        
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
          
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" method="GET" action="userupdate.php">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $_SESSION['user']['name']; ?>"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?php echo $_SESSION['user']['email']; ?>"
                                                class="form-control form-control-line" name="example-email"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Contact</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $_SESSION['user']['contact']; ?>"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $_SESSION['user']['address']; ?>"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Date hired</label>
                                        <div class="col-md-12">
                                            <input type="date" value="<?php echo $_SESSION['user']['date_hired']; ?>"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Department</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $_SESSION['user']['department']; ?>"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Position</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $_SESSION['user']['position']; ?>"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Employee Type</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $_SESSION['user']['employee_type']; ?>"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" value="<?php echo $_SESSION['user']['password']; ?>"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                 
                                  
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" name="update" class="btn btn-info rounded">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
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
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>