<?php
include('dbconn.php');


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
    }
    else
    {
        $_SESSION['status'] = "No Email Found";
        header("Location:passreset.php");
        exit(0);
    }
}

?>