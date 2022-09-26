<?php
  // all the files that are needed to include
  include ('database/dbconnection.php');
  include ('addregister.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll System</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/registration.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://img.icons8.com/emoji/48/000000/school-emoji.png" type="image/x-icon">

  </head>
  <body>

    <style>

      .reg-btn {
        width: 44rem;
      }

      #box-section {
        position: relative;
        right: 5.5rem;
        top: 2rem;

      }

      #error, #success {
        width: 51rem;
        margin: 2rem auto;
        border-radius: 25px;
        position: relative;
        top: 3rem;
      }
      
    </style>

        <!-- svg icon for the alert error, success using session -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>

      <!-- display error and success using session -->
      <?php 
              
        // if session error is set then display it
        if(isset($_SESSION['error'])){
        
          echo "<div id='error' class='alert alert-danger alert-dismissible fade show text-center m-auto' role='alert'>
          <svg class='bi flex-shrink-0 me-2' width='21' height='21' mr-1 role='img' aria-label='Danger:'><use xlink:href='#check-circle-fill'/></svg>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span></button>
            ".$_SESSION['error']."
          </div>";
          
          unset($_SESSION['error']);
        }
        // if session success is set then display it
        if(isset($_SESSION['success'])){


          echo "<div id='success' class='alert alert-success alert-dismissible fade show text-center m-auto' role='alert'>
          <svg class='bi flex-shrink-0 me-2' width='21' height='21' mr-1 role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span></button>
            ".$_SESSION['success']."
          </div>";

          unset($_SESSION['success']);
        }

      ?>

  <section id="box-section">
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div id="regform" class="mt-5 border p-4 bg-white" style="border-radius: 10px; width: 820px;">
              <div id="card-reg" class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">
                    Payroll Registration Form
                </h3>

               
                <form method="POST" action="#" enctype='multipart/form-data' id="regform">
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <h6>
                          <label class="form-label">Employee Name <span class="text-danger">*</span>
                          </label>
                        </h6>
                        <input type="text" name="name" class="form-control form-control-mb" spellcheck="false" autocomplete="off" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <h6>
                          <label class="form-label">Email <span class="text-danger">*</span>
                          </label>
                        </h6>
                      <input type="text" name="email" class="form-control form-control-mb" spellcheck="false" autocomplete="off" />
                      </div>
                    </div>  
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <h6>
                          <label class="form-label">Contact Number <span class="text-danger">*</span>
                          </label>
                        </h6>
                      <input type="number" name="contact" class="form-control form-control-mb" spellcheck="false" autocomplete="off" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <h6>
                          <label class="form-label">Address <span class="text-danger">*</span>
                          </label>
                        </h6>
                      <input type="text" name="address" class="form-control form-control-mb" spellcheck="false" autocomplete="off" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <h6>
                          <label class="form-label">Date Hired <span class="text-danger">*</span>
                          </label>
                        </h6>
                      <input type="date" name="date_hired" class="form-control form-control-mb" spellcheck="false" autocomplete="off" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <h6>
                          <label class="form-label">Department Assigned <span class="text-danger">*</span>
                          </label>
                        </h6>
                          <select id="department" autocomplete="off" name="department">
                              <option disabled selected></option>
                              <option value="IT_Department">IT Department</option>
                              <option value="Accountant">Accountant</option>
                              <option value="Sales">Sales</option> 
                              <option value="Head_Office">Head Office</option> 
                          </select>                      
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <h6>
                          <label class="form-label">Position <span class="text-danger">*</span>
                          </label>
                        </h6>
                          <select id="position" autocomplete="off" name="position">
                              <option disabled selected></option>
        
                          </select>                      
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <h6>
                          <label class="form-label">Employee Type <span class="text-danger">*</span>
                          </label>
                        </h6>
                        <select class="type" autocomplete="off" name="employee_type">
                              <option disabled selected></option>
                              <option value="Regular">Regular</option>
                              <option value="Contractual">Contractual</option>
                              <option value="Part-time">Part-time</option> 
                              <option value="Consultant">Consultant</option> 
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <h6>
                          <label class="form-label">Password <span class="text-danger">*</span>
                          </label>
                        </h6>
                      <input type="password" name="password" class="form-control form-control-mb" spellcheck="false" autocomplete="off" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <h6>
                          <label class="form-label">Upload Image <span class="text-danger">*</span>
                          </label>
                        </h6>
                      <input type="file" name="image_upload" class="form-control form-control-mb" accept="image/*">
                      </div>
                    </div>
                <div class="div-btn">
                  <input type="submit" name="submit" value="Register" class="btn reg-btn"></input>
                <div class="div-redirect">
                    <label class="registered">Already registered? <a class="redirect" href="index.php">Login</a></label>
                        </div>
                    </div>
                </form>                   
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
    <!-- js droplist -->
    <script src="js/droplist.js"></script>
  </body>
</html>