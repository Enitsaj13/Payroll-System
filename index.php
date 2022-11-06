<?php
// include all the necessary files in this page
include('loginfunction.php');
include('database/dbconnection.php');
include('cookie.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Payroll System</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/loginothers.css">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- recaptcha -->
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->

  
  </head>
  <body>
    
  <style>
    .g-recaptcha {
      margin-top: 4rem;
    }

    .create-text {
      position: relative;
      top: 3.5rem;
    }

  

    .forgot-text-pass {
      position: relative;
      bottom: 1.5rem;
    }
    
    .container-login100-form-btn {
      width: 100%;
      display: -webkit-box;
      display: -webkit-flex;
      display: -moz-box;
      display: -ms-flexbox;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding-top: 20px;
      position: relative;
      bottom: 2rem;
    }

    /* Checkbox */
    #remember {
      margin: 1.3rem 0 0 2.3rem;
      position: relative;
      top: -10px;
    }

    .bxs-right-arrow {
        position: relative;
        top: 1px;
    }

    #error {
      border-radius: 25px; 
    }
    

  </style>
    

   <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-pic js-tilt" data-tilt>
            <img src="assets/images/img-login.svg" alt="IMG">
          </div>
          
          <form class="login100-form" method="POST" action="#" id="EmployeeForm">
            <span class="login100-form-title"> Payroll Management System </span>

            <!-- svg icon for the alert error session -->
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
            </svg>

               <!-- display error and success using session -->
              <?php 
              
              // if session error is set then display it
              if(isset($_SESSION['error'])){
              
                echo "<div id='error' class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='21' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
                  ".$_SESSION['error']."
                </div>";
                
                unset($_SESSION['error']);
              }
      
              ?>

            <div class="wrap-input100">
              <!-- echo the cookie if the user clicked the remember -->
              <input class="input100" type="text" name="email" 
              value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];};?>"
              spellcheck="false" autocomplete="off" placeholder="Email">

              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class='bx bxs-envelope' aria-hidden="true"></i>
              </span>
            </div>
            <div class="wrap-input100">
              
            <input class="input100" type="password" name="password"
            value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];};?>"
             placeholder="Password">

              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class='bx bxs-lock' aria-hidden="true"></i>
              </span>
            </div>
            <div id="remember" class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input remember">
                <label class="form-check-label">Remember me</label>
            </div>
            <div class="container-login100-form-btn">
              <button type="submit" name="submit" class="login100-form-btn">Login</button>
            </div>
            <div class="text-center p-t-12 forgot-text-pass">
              <span class="txt1"> Forgot </span>
              <a class="txt2" href="forgotpass/forgetpassword.php"> Password? </a>
            </div>
            <div class="text-center p-t-136">
              <a class="create-text" href="registration.php">
                Create your Account
                <i class='bx bxs-right-arrow' aria-hidden="true"></i>
              </a>
            </div>
<<<<<<< Updated upstream
=======
            <!-- <div class="g-recaptcha" data-sitekey="6LfblfMgAAAAAAxA-RhPiciz3wj40JspNifoBstw"></div> -->
>>>>>>> Stashed changes
          </form>
        </div>
      </div>
    </div>

    <!-- jquery -->
    <script src="assets/node_modules/jquery/jquery.min.js"></script>
    <!-- bootstrap popper Core javaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <!-- tilt function -->
    <script src="assets/node_modules/jquery/tilt.jquery.min.js"></script>
    <script>
      $(".js-tilt").tilt({
        scale: 1.1,
      });
    </script>
    <!-- main js -->
    <script src="js/mainlogin.js"></script>
  </body>
</html>
