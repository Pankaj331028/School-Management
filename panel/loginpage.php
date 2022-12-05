<?php

require_once("config.php");
$formData = $_POST;
// print_r($formData);
// die();

if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['login'])){
        $username=$formData['username'];
        $password=md5($formData['password']);
        $seluser="SELECT id, name FROM `users` where username='$username' and password='$password'";
        // print_r($seluser);
        // die();
        $userResult=$con->query($seluser);
        if($userResult->num_rows >0){
            $userData=$userResult->fetch_assoc();
            $_SESSION['id']=$userData['id'];
            $_SESSION['isLoggedIn']=true;
            $_SESSION['name']=$userData['name'];
            header("Location:dashboard.php");
        }else{
            $_SESSION['error']="Login credentials are invalid .Please try again !";
            header("Location:index.php");

        }





}else{
    $_SESSION['error']="Un_Authorised Access....";
    header("Location:index.php");
}



?>