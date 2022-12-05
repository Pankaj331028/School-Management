<?php
require_once("config.php");

$formData=$_REQUEST;
// print_r($formData);
// die();
$city_id=$formData['cityId'];
$city_name=$formData['city_name'];
$status_city=$formData['status_city'];
$country_id=$formData['country_id'];
$state_name=$formData['state_name'];
if($_SERVER['REQUEST_METHOD']=="POST" && (isset($formData['submit']))){
    if($city_name && $status_city){
       
        $update="UPDATE `citys` SET city_name='$city_name',country_id=$country_id,state_id=$state_name,status_city=$status_city WHERE id=$city_id ";
        // print_r($update);
        // die();
        $con->query($update);
        header("Location:city-list.php");
    }

}else{
    die("Un-Authorized Access....");
}
