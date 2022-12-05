<?php
include_once("config.php");


$formdata=$_REQUEST;

 if($_SERVER['REQUEST_METHOD']=="POST" && (isset($formdata['submit']))){
    if($formdata['country_name'] &&  ($formdata['status_country'] or  (int)$formdata['status_country']===0) ){
        $insertcountry="INSERT INTO `countrys`(country_name,status_country) values('".$formdata['country_name']."',".$formdata['status_country'].")";
       
        $con->query($insertcountry);
        $classId=$con->insert_id;
        foreach($formdata['state_name'] as $key=> $stateName){
            $stateName=$stateName;
            $ste=$formdata['state_status'][$key];
            
            if($stateName && $ste){
            $insertstate="INSERT INTO `states`(country_id,state_name,state_status)values($classId,'$stateName',$ste)";
            // print_r($insertstate);
            // die();
            $con->query($insertstate);
            }
        }
        header("Location:country-list.php");

    }else{
         $_SESSION['error']="All fiels requried....";
         $_SESSION['country_name']=$formdata['country_name'];
         $_SESSION['status_country']=$formdata['status_country'];
         header("Location:create-country_name.php");
    }


 }else{
    die("Un-Authroized access.....");
 }


?>