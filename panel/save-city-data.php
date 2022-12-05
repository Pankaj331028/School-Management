<?php
include_once("config.php");


$formData=$_REQUEST;
// print_r($formData);
// die;

if($_SERVER['REQUEST_METHOD'] && (isset($formData['submit']))){
   
    if($formData['city_name'] && ($formData['status_city'] or (int)$formData['status_city']===0) && $formData['country_id'] && $formData['state_name']){
        // die("error");
        $insertcity="INSERT INTO `citys`(city_name,country_id,state_id,status_city) values('".$formData['city_name']."',".$formData['country_id'].",".$formData['state_name'].",".$formData['status_city'].")";
        // print_r($insertcity);
        // die();
        $cityData=$con->query($insertcity);

        header("Location:city-list.php");
    }else{
        $_SESSION['error']="All fiels requried....";
        $_SESSION['city_name']=$formData['city_name'];
        header("Location:create-city-name.php");
    }

}else{
    die("Un-Authroized access.....");
}