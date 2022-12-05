<?php
require_once("config.php");

$formData=$_REQUEST;

$id=$formData['country_id'];


$country_name=$formData['country_name'];
$status_country=$formData['status_country'];

// $stateIds = array_filter($update_data['state_id']);
//         $stateIds = implode(",", $stateIds);
//         $deleteStateQuery = "DELETE FROM `state` WHERE id NOT IN ($stateIds) and country_id=$id";
//         $con->query($deleteStateQuery);


if($_SERVER['REQUEST_METHOD']=="POST" && (isset($formData['submit']))){
  
    if($country_name && $status_country ){
          $updatecountry="UPDATE `countrys` SET country_name='$country_name',status_country=$status_country  WHERE id=$id";
          $con->query($updatecountry);

          $stateIds=array_filter($formData['state_id']);
          $stateIds=implode(",",$stateIds);
          $deleteStateQuery="DELETE FROM `states` WHERE id NOT IN ($stateIds) and country_id=$id ";
          $con->query($deleteStateQuery);

        foreach($formData['state_name'] as $key=>$stateName){
            $stateName=$stateName;
            $ste=$formData['state_status'][$key];
            $state_id=$formData['state_id'][$key];
           
            if( $state_id){

            
            $update="UPDATE `states` as sta SET state_name='$stateName',state_status=$ste WHERE  sta.id=$state_id ";
        
            $con->query($update);
            header("Location:country-list.php");
        }else
        {
            $insert="INSERT INTO `states` (country_id,state_name,state_status)values($id,'$stateName',$ste)";
            $con->query($insert);
                
            }
        }
    }else{
        header("Location:edit-country.php");
    }

}else{
    die("Un-Authorized Access....");
}


?>
