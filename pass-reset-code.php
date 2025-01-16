<?php
include('dbconn.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function send_password_reset($get_name,$get_email,$token)
{
    
}

if(isset($POST['password_reset_link']))
{
    $email =mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email * FROM users WHERE email = '$email' LIMIT 1 ";
    $check_email_run = mysqli_query($con,$check_email);

    if(mysqli_num_rows($check_email_run) >0)
    {
      $row = mysqli_fetch_array($check_email_run);
      $get_name = $row['name'];
      $get_email = $row['email'];


      $update_token = "UPDATE users SET verify_token= '$token' WHERE email = '$get_email' LIMIT 1";
      $update_token_run = mysqli_query($con, $update_token);

      if ($update_token_run)
      {
        send_password_reset($get_name,$get_email,$token);
        $_SESSION['status'] = "We emailed you a password reset link";
        header("Location:passreset.php");
        exit(0);
      }
      else
      {
        $_SESSION['status'] = "Something went wrong. #1";
        header("Location:passreset.php");
        exit(0);
      }
    }
    else
    {
        $_SESSION['status'] = "No Email Found";
        header("Location:passreset.php");
        exit(0);
    }
}

?>