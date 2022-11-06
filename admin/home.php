<?php
include('../database/dbconnection.php');
include('../logout.php');
session_start();
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

    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body class="fix-header fix-sidebar card-no-border">

    <style>

        body {
            font-family: 'Montserrat', sans-serif;
        }

        i, .h3, h5 {
            color: grey;
        }

        #success {
        border-radius: 25px;
       
        }

    </style>


    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
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
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up"
                                href="javascript:void(0)"><i class='bx bx-menu-alt-left'></i></a> </li>
                   
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

        <div class="page-wrapper">
           
            <div class="container-fluid">
            
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <i class='bx bx-home ms-1 mt-2'></i>
                            <i class='bx bx-chevron-right mt-2'></i>
                            <li class="breadcrumb-item active">Charts and Analytics</li>
                        </ol>
                    </div>
                   
                </div>
                <!-- ======Displaying the message=========== --> 
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    </svg>

					<?php 
                    
					
						// if session success is set then display it
                        if(isset($_SESSION['success'])){


							echo "<div id='success' class='alert alert-success alert-dismissible fade show text-center w-50' role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='17' height='17' mr-1 role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span></button>
								".$_SESSION['success']."
							</div>";

							unset($_SESSION['success']);
						}
					?>

                 <!-- Content Row -->
                 <div class="row">

                <!-- Total Registered -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary h-100 py-2 rounded">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Registered</div>
                                    <div class="h3 mb-0 font-weight-bold">
                                        <?php
                                            $sql = "SELECT * FROM employee";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_num_rows($result);
                                            echo $row;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class='bx bxs-group bx-lg'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Department -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success h-100 py-2 rounded">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Department</div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800">4</div>
                                </div>
                                <div class="col-auto">
                                    <i class='bx bxl-docker bx-lg'></i><i class=""></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Position-->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info h-100 py-2 rounded">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Position </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h3 mb-0 mr-3 font-weight-bold text-gray-800">12</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class='bx bxl-slack bx-lg'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning h-100 py-2 rounded">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Salary</div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800">
                                        $50,000
                                    </div>
                                </div>
                                <div class="col-auto">
                                <i class='bx bx-money-withdraw bx-lg'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
    
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8">
                        <div class="card rounded">
                            <div class="card-body">
                                <class="d-flex no-block">
                                        <h5 class="card-title mb-0">Employee Position Bar Chart</h5>
                                        <!-- creating bar chart based on the number of employee in the database -->
                                        <canvas id="myChart" width="400" height="170"></canvas>
                                        <script>
                                        const ctx = document.getElementById('myChart').getContext('2d');
                                        const myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['Encoder', 'Programmer', 'Designer', 'Project Manager', 'DB Admin', 'Junior Accountant',
                                            'Head Accountant', 'Sales Rep', 'Sales Manager', 'Departmet Sect', 'Office Clerk', 'Liaison'],
                                                datasets: [{
                                                    label: '#',
                                                    data: [5, 11, 3, 5, 2, 3, 8, 3, 4, 2, 6, 3],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255, 99, 132, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                        </script>
                                                                        
                               
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card rounded">
                            <div class="card-body">
                                <div class="d-flex mb-4 no-block">
                                    <h5 class="card-title mb-0 align-self-center">Department Line Chart</h5>
                                </div>

                                <div>
                                    <canvas id="myChartDepartment" height="259"></canvas>
                                </div>

                                <script>
                                const labels = [
                                    'IT Department',
                                    'Accoutant Department',
                                    'Sales Department',
                                    'Head Office Department',
                                ];

                                const data = {
                                    labels: labels,
                                    datasets: [{
                                    label: '',
                                    backgroundColor: 'rgb(255, 99, 132)',
                                    borderColor: 'rgb(255, 99, 132)',
                                    data: [25, 12, 9, 9],
                                    }]
                                };

                                const config = {
                                    type: 'line',
                                    data: data,
                                    options: {}
                                };
                                </script>

                                <script>
                                const myChartDepartment = new Chart(
                                    document.getElementById('myChartDepartment'),
                                    config
                                );
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
        
        
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

    <!-- js data tables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

 

</body>

</html>