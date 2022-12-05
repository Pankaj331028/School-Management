<?php

 require_once("config.php");
require_once("confing.php");
 require_once("validate-session.php");

$formData=$_REQUEST;

$id=$formData['id'];
$district=$formData['district'];
$teshil=$formData['teshil'];
$block=$formData['block'];
$village_ward=$formData['village_ward'];
$panchayat_municipal=$formData['panchayat_municipal'];
$candidate=$formData['candidate'];
$mothers=$formData['mothers'];
$fathers=$formData['fathers'];
$occupation=$formData['occupation'];
$pin_code=$formData['pin_code'];
$religion=$formData['religion'];
$mobile=$formData['mobile'];
$digit_adhaar=$formData['digit_adhaar'];
$attach_id_type=$formData['attach_id_type'];
$data_of_birth=$formData['data_of_birth'];
$community_sc_st_bpl=$formData['community_sc_st_bpl'];
$general_obc=$formData['general_obc'];
$asha_aww_fps=$formData['asha_aww_fps'];
$differently_abled=$formData['differently_abled'];
$candidate_type=$formData['candidate_type'];
$name_of_institude_where_studying=$formData['name_of_institude_where_studying'];

if($_SERVER['REQUEST_METHOD']=="POST" && (isset($formData['submit']))){

    if($district && $teshil && $block && $village_ward &&  $panchayat_municipal && $candidate && $mothers && $fathers && $occupation && $pin_code
     && $religion && $mobile && $digit_adhaar  && $attach_id_type  && $data_of_birth && $community_sc_st_bpl && $general_obc && $asha_aww_fps 
     && $differently_abled && $candidate_type && $name_of_institude_where_studying ){

       $upsql="UPDATE `students` SET district='$district',teshil='$teshil', block='$block', village_ward='$village_ward', panchayat_municipal='$panchayat_municipal',
       candidate='$candidate',mothers='$mothers',fathers='$fathers', occupation='$occupation',pin_code='$pin_code',religion='$religion',mobile='$mobile',
       digit_adhaar='$digit_adhaar', attach_id_type='$attach_id_type',data_of_birth='$data_of_birth',community_sc_st_bpl='$community_sc_st_bpl',
       general_obc='$general_obc',asha_aww_fps='$asha_aww_fps',differently_abled='$differently_abled',candidate_type='$candidate_type',
       name_of_institude_where_studying='$name_of_institude_where_studying' WHERE id=$id";
        
       
      
     $con->query($upsql);
   
       $_SESSION['success']="Record Udeate successfully..";
      header("Location:form_list.php");

    }
    




}else{
    die("Un-Authorized Access....");
}