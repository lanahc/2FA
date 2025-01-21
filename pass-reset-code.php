<?php
include('dbconn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function send_password_reset($get_name,$get_email,$token)
{
    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = '***';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', $get_name);
    $mail->addAddress('joe@example.net', $get_email);     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset Password Notification';
    $mail->Body    = "<h2>Hello!</h2>
    <h3>You are receiving this email because we received a password request for your account.</h3
    <br><br/>
    <a href = 'http://localhost/TWO%20FA/passchange.php?token=$token&email=$get_email'> Click Me </a>
    ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

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