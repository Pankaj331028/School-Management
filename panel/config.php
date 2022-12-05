<?php
session_start();
$host='127.0.0.1';
$username='root';
$password='Pankaj@123';
$dbname='School';
$con=mysqli_connect($host,$username,$password,$dbname);

if(!$con){
    echo "unable to  connect in database".mysqli_connect_error();
    die();
}
//echo "success......";
?>