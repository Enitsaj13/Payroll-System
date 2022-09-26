<?php
include('../loginfunction.php');
include('../database/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Change password</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/loginothers.css">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

  </head>
  <body>
    
    <style>
      .remember {
      color: white;
      }
      .remember:checked {
        accent-color: #0099cc;
      }
      #error, #success {
      border-radius: 25px; 
      position: relative;
      bottom: 4rem;
      
      }
      .login100-pic {
        width: 370px;
        position: relative;
        bottom: 4rem;
      }

      .login100-pic img {
        width: 100%;
        height: 100%;
      }

      .wrap-input100, .login100-form-title {
        position: relative;
        bottom: 3rem;
      }

      .login100-form-btn {
        position: relative;
        bottom: 2rem;
      }

      .bxs-left-arrow {
        position: relative;
        top: 1px;
      }

    </style>


   <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-pic js-tilt" data-tilt>
            <img src="../assets/images/Reset password-amico.svg" alt="IMG">
          </div>
          
          <form class="login100-form" method="POST" action="resetpass.php">
            <span class="login100-form-title"> Change Password </span>

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
             
              <input type="hidden" name="passwordtoken" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
            <div class="wrap-input100">
              <input class="input100" type="text" name="email" value ="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" spellcheck="false" autocomplete="off" placeholder="Email">

              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class='bx bxs-envelope' aria-hidden="true"></i>
              </span>
            </div>

            <div class="wrap-input100">
              <input class="input100" type="password" name="newpassword"  spellcheck="false" autocomplete="off" placeholder="Password">

              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class='bx bxs-lock' aria-hidden="true"></i>
              </span>
            </div>
            <div class="wrap-input100">
              <input class="input100" type="password" name="confirmpassword"  spellcheck="false" autocomplete="off" placeholder="Confirm Password">

              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class='bx bxs-lock' aria-hidden="true"></i>
              </span>
            </div>

        
            <div class="container-login100-form-btn">
              <button type="submit" name="updatepassword" class="login100-form-btn">Update Password</button>
            </div>
            <div class="text-center p-t-136 reset-text">
              <a class="create-text" href="../index.php">
                <i class='bx bxs-left-arrow' aria-hidden="true"></i>
                Back to Login
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>

     <!-- js bootstrap -->
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
    <!-- tilt function -->
    <script src="../assets/node_modules/jquery/tilt.jquery.min.js"></script>
    <script>
      $(".js-tilt").tilt({
        scale: 1.1,
      });
    </script>
    <!-- main js -->
    <script src="../js/mainlogin.js"></script>
  </body>
</html>
