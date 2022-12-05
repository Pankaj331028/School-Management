<?php
require_once("config.php");

$formData=$_REQUEST;
// echo "<pre>";
// print_r($formData);
// die();
$state_id=$formData['stateId'];
$state_name=$formData['state_name'];
$stateStatus=$formData['state_status'];
$country_id=$formData['country_id'];
if($_SERVER['REQUEST_METHOD']=="POST" && (isset($formData['submit']))){

    if($state_name && $stateStatus){

        //  $updatecountry="UPDATE `countrys` SET id=$country_id WHERE id=$country_id";
        //    echo "<pre>";
        //          print_r($updatecountry);
        //          die();
         $updatestate="UPDATE `states` SET country_id=$country_id, state_name='$state_name',state_status=$stateStatus WHERE id=$state_id";
         $con->query($updatestate);
         
         $cityIds=array_filter($formData['city_id']);
         $cityIds=implode(",",$cityIds);
         $deleteCityQuery="DELETE FROM `citys` WHERE id NOT IN ($cityIds) and state_id=$state_id ";
         $con->query($deleteCityQuery);

          foreach($formData['city_name'] as $key=>$cityName){
            $cityName=$cityName;
            $ste=$formData['status_city'][$key];
            $city_id=$formData['city_id'][$key];
            if($city_id){
                $updateCity="UPDATE `citys` SET city_name='$cityName',status_city=$ste WHERE id=$city_id";
                // echo "<pre>";
                //  print_r($updateCity);
                //  die();
                $con->query($updateCity);
                header("Location:state-list.php");
            }else{

                if($cityName && $ste){
                $insertCity="INSERT INTO `citys` (city_name,status_city,country_id,state_id)values('$cityName',$ste,$country_id,$state_id)";
                //  echo "<pre>";
                //  print_r($insertCity);
                //  die();
                $con->query($insertCity);
                header("Location:state-list.php");
                }
            }

          }

         header("Location:state-list.php");

    }else{
        header("Location:edit-state.php");
    }
 


}else{
    die("Un-authrogtion.....");
}
?>