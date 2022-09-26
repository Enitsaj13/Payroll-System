<?php
include('database/dbconnection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    </style>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center lh-1 mb-2">
                <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip for the month of June 2021</span>
            </div>
            <div class="d-flex justify-content-end"> <span>Working Branch:ROHINI</span> </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder"><?php echo $row['name']; ?></div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">EMP Name</span> <small class="ms-3">Ashok</small> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">PF No.</span> <small class="ms-3">101523065714</small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">NOD</span> <small class="ms-3">28</small> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">ESI No.</span> <small class="ms-3"></small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Mode of Pay</span> <small class="ms-3">SBI</small> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Designation</span> <small class="ms-3">Marketing Staff (MK)</small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Ac No.</span> <small class="ms-3">*******0701</small> </div>
                        </div>
                    </div>
                </div>
                <table class="mt-4 table table-bordered">
                    <thead class="bg-info text-white">
                        <tr>
                            <th scope="col">Earnings</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Deductions</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Basic</th>
                            <td>16250.00</td>
                            <td>PF</td>
                            <td>1800.00</td>
                        </tr>
                        <tr>
                            <th scope="row">DA</th>
                            <td>550.00</td>
                            <td>ESI</td>
                            <td>142.00</td>
                        </tr>
                        <tr>
                            <th scope="row">HRA</th>
                            <td>1650.00 </td>
                            <td>TDS</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">WA</th>
                            <td>120.00 </td>
                            <td>LOP</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">CA</th>
                            <td>0.00 </td>
                            <td>PT</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">CCA</th>
                            <td>0.00 </td>
                            <td>SPL. Deduction</td>
                            <td>500.00</td>
                        </tr>
                        <tr>
                            <th scope="row">MA</th>
                            <td>3000.00</td>
                            <td>EWF</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">Sales Incentive</th>
                            <td>0.00</td>
                            <td>CD</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th scope="row">Leave Encashment</th>
                            <td>0.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Holiday Wages</th>
                            <td>500.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Special Allowance</th>
                            <td>100.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Bonus</th>
                            <td>1400.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Individual Incentive</th>
                            <td>2400.00</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="border-top">
                            <th scope="row">Total Earning</th>
                            <td>25970.00</td>
                            <td>Total Deductions</td>
                            <td>2442.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : 24528.00</span> </div>
                
            </div>
           
        </div>
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