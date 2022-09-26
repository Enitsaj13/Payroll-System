<?php
session_start();
include('../database/dbconnection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

function send_password_reset($get_name,$get_email,$token)
{
	$mail = new PHPMailer(true);

	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                  
    $mail->isSMTP();
    $mail->SMTPAuth   = true;    

    $mail->Host       = 'smtp.gmail.com';                     
    $mail->Username   = 'payroll.system2k22@gmail.com';                    
    $mail->Password   = "vqavmdacdqkennao";  

    $mail->SMPTSecure = "tls";                            
    $mail->Port       = 587;    

    $mail->setFrom("payroll.system2k22@gmail.com",$get_name);
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = "Reset Password Notification";

    $email_template = "
    <h2>Hello</h2>
    <h3>You are receiving this email because we recieved a password reset request for you account.</h3>
    <br/></br>
    <a href='http://localhost/Final Project/forgotpass/changepass.php?token=$token&email=$get_email'>Click here</a>";
    $mail->Body = $email_template;
    $mail->send();

}
//get email
if(isset($_POST['resetpass'])){
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$token = md5(rand());

	$check_email = "SELECT email, name from employee WHERE email='$email' LIMIT 1";
	$check_email_run = mysqli_query($conn, $check_email);

	if(mysqli_num_rows($check_email_run)>0)
	{
		$row = mysqli_fetch_array($check_email_run);

		$get_name = $row['name'];
		$get_email = $row['email'];

		$update_token = "UPDATE employee SET verify_token = '$token' WHERE email='$get_email' LIMIT 1";
		$update_token_run = mysqli_query($conn,$update_token);

		if($update_token_run)
		{
			send_password_reset($get_name,$get_email,$token);
			$_SESSION['success'] = "Check your email for a password reset link.";
			header("location: forgetpassword.php");
			exit(0);
		}
		else
		{
			$_SESSION['error'] = "Error updating token.";
			header("location: forgetpassword.php");
			exit(0);		
		}

	}
	else
	{
		$_SESSION['error'] = "Email does not exist.";
		header("location: forgetpassword.php");
		exit(0);
	}
}
if(isset($_POST['updatepassword']))
{
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$new_password = mysqli_real_escape_string($conn, $_POST['newpassword']);
	$confirm_password = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

	$token = mysqli_real_escape_string($conn, $_POST['passwordtoken']);
	if(!empty($token))
	{
		if(!empty($email) && !empty($new_password) && !empty($confirm_password))
		{
			$check_token = "SELECT verify_token FROM employee WHERE verify_token='$token' LIMIT 1";
			$check_token_run = mysqli_query($conn,$check_token);

			if(mysqli_num_rows($check_token_run)>0)
			{
				if($new_password == $confirm_password)
				{
					$new_password = sha1($new_password); // encrypt the password before storing in the database
					$update_password = "UPDATE employee SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
					$update_password_run = mysqli_query($conn, $update_password);

					if($update_password_run)
					{
						$_SESSION['success'] = "New password updated successfully.";
						header("location: changepass.php");
						exit(0);
					}
					else
					{
						$_SESSION['error'] = "Error updating password.";
						header("location: changepass.php?token=$token&email=$email");
						exit(0);
					}
				}
				else
				{
					$_SESSION['error'] = "Passwords do not match.";
					header("location: changepass.php?token=$token&email=$email");
					exit(0);	
				}
			}
			else
			{
			$_SESSION['error'] = "Invalid token.";
			header("location: changepass.php?token=$token&email=$email");
			exit(0);	
			}
		}
		else
		{
			$_SESSION['error'] = "All fields are required.";
			header("location: changepass.php?token=$token&email=$email");
			exit(0);	
		}
	}
	else
	{
		$_SESSION['error'] = "No Token Available";
		header("location: changepass.php");
		exit(0);	
	}
}

?>