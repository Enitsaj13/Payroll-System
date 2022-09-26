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
    <link href="./assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">



</head>

<body class="fix-header fix-sidebar card-no-border">

 
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">
                        <!-- Logo icon --><b>
                           
                            <img src="./assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Logo icon -->
                        </b>
                      
                        <!-- Logo text --><span>
                          
                        <img src="./assets/images/text-logo.png" alt="homepage" class="dark-logo" />


                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up"
                                href="javascript:void(0)"><i class='bx bx-menu-alt-left'></i></a> </li>
                        <!-- Search -->
                        <li class="nav-item hidden-xs-down search-box"> <a
                                class="nav-link hidden-sm-down" href="javascript:void(0)">
                                <i class="fa-spin fa fa-refresh"></i></a>
                        </li>
                    </ul>
                  
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                          <a
                            class="nav-link dropdown-toggle waves-effect waves-dark profile-pic"
                            href="#"
                            id="navbarDropdown"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            ><img
                              src="https://jastineformentera.netlify.app/images/about.jpg"
                              alt="user"
                              class=""
                            />
                            <span class="hidden-md-down">Jastine Formentera &nbsp;</span>
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
                        <li> <a class="waves-effect waves-dark" href="attendance.php" aria-expanded="false">
                        <i class='bx bx-calendar'></i><span class="hide-menu">Attendance</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="payroll.php" aria-expanded="false">
                            <i class='bx bx-credit-card' ></i><span class="hide-menu">Payroll</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="deduction.php" aria-expanded="false">
                        <i class='bx bx-calculator' ></i><span class="hide-menu">Deduction</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="user.php" aria-expanded="false">
                            <i class='bx bxs-user-check'></i><span class="hide-menu">Users</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false">
                            <i class='bx bxs-log-out-circle'></i><span class="hide-menu">Sign out</span></a>

                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
>
        <div class="page-wrapper">
           
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Attendance Monitoring</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <i class='bx bx-home ms-1 mt-2'></i>
                            <i class='bx bx-chevron-right mt-2'></i>
                            <li class="breadcrumb-item active">Hours and Days</li>
                        </ol>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <a href="https://www.wrappixel.com/templates/adminwrap/"
                            class="btn waves-effect waves-light btn btn-rounded btn-info pull-right hidden-sm-down text-white"> Add Item</a>
                    </div>
                </div>
    
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div>
                                        <h5 class="card-title mb-0">Employee Chart</h5>
                                    </div>
                                </div>
                                <div class="" id="sales-chart" style="height: 370px;"></div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4 no-block">
                                    <h5 class="card-title mb-0 align-self-center">Our Visitors</h5>
                                </div>
                                <div id="visitor" style="height:345px; width:100%;"></div>
                       
                            </div>
                        </div>
                    </div>
                </div>
        
        
            <footer class="footer"> © 2022 Payroll System</a> </footer>
         
        </div>
     
    </div>


    <script src="./assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="./assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
 
 

</body>

</html>
