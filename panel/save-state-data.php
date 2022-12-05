<?php
include_once("config.php");
$fromData=$_REQUEST;

            if($_SERVER['REQUEST_METHOD']=="POST" && (isset($fromData['submit']))){
                if($fromData['state_name'] &&  ($fromData['state_status'] or (int)$fromData['state_status']===0) && $fromData['country_id']){
                    $insert="INSERT INTO `states` (country_id,state_name,state_status) values(".$fromData['country_id'].",'".$fromData['state_name']."',".$fromData['state_status'].")";
                    //  print_r($insert);
                    //  die();
                    $con->query($insert);

                    $CityId=$con->insert_id;
                    $CountryId=$fromData['country_id'];
                    // print_r($classId);
                    // echo "<pre>";
                    // print_r($CountryId);
                    // die();
                    foreach($fromData['city_name'] as $key=> $cityName){
                        $cityName=$cityName;
                        $ste=$fromData['status_city'][$key];
                        
                        if($cityName && $ste){
                        $insertCity="INSERT INTO `citys`(country_id,state_id,city_name,status_city)values($CountryId,$CityId,'$cityName',$ste)";
                        
                        $con->query($insertCity);
                    }
            
                    }
                    $_SESSION['success']="Successfulity submit...";
                    header("Location:state-list.php");
                }else{
                    $_SESSION['error']="All filed requried...";
                  
                    $_SESSION['state_name']=$fromData['state_name'];
                    $_SESSION['state_status']=$fromData['state_status'];

                    header("Location:create-state-name.php");
                }
            }else{
                die("UN-Authroed assecc....");
            }

?>