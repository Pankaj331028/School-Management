<?php

require_once("config.php");
$formData=$_REQUEST;
 print_r($formData);
 die();
 $email=$formData['email'];
 if($_SERVER['REQUEST_METHOD']=="POST" && (isset($formData['submit']))){

     $emailData=$con->query($email);
     $token=md5(rand());
     $check_email="SELECT email FROM users WHERE email='$emailData' LIMIT 1";
      $resultChecck_email=$con->query($check_email);

     if($resultChecck_email->num_rows>0){
      $row=$resultChecck_email->fetch_assoc();
      $get_name=$row['name'];
      $get_email=$row['email'];
       $update_token="UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1 ";
       $update_token_run=$con->query($update_token);

       if($update_token_run){
            send_password_reset($get_name,$get_email,$token);
            $_SESSION['error']=" WE E-mail You a password reset link..";
         header("Location:reset-password-from.php");

       }else{
         $_SESSION['error']="Something went worng. #1..";
         header("Location:reset-password-from.php");
       }

     }else{
      $_SESSION['error']="NO Email Found";
      header("Location:reset-password-from.php");
     }




 }else{
    die("Un-Authrogtaion...");
 }
?>