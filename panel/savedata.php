<?php
session_start();
require_once("confing.php");

$formdata=$_REQUEST;
if($_SERVER['REQUEST_METHOD']=='POST' && (isset($formdata['submit']))){
    
    if($formdata['district']  && $formdata['teshil'] && $formdata['block'] && $formdata['village_ward'] && $formdata['panchayat_municipal']
     &&  $formdata['candidate']  && $formdata['mothers'] && $formdata['fathers'] && $formdata['occupation'] && $formdata['pin_code']
     && $formdata['religion'] && $formdata['mobile'] && $formdata['digit_adhaar'] && $formdata['attach_id_type'] && $formdata['data_of_birth']
     && $formdata['community_sc_st_bpl'] && $formdata['general_obc'] && $formdata['asha_aww_fps'] && $formdata['differently_abled'] &&
     $formdata['candidate_type'] && $formdata['name_of_institude_where_studying']
      ){

  $insertquery="INSERT INTO `students` (district,teshil,`block`,village_ward,panchayat_municipal,candidate,mothers, fathers,occupation,pin_code,
      religion,mobile,digit_adhaar, attach_id_type,data_of_birth,community_sc_st_bpl,general_obc, asha_aww_fps,differently_abled, candidate_type,
      name_of_institude_where_studying) values('".$formdata['district']."','".$formdata['teshil']."','".$formdata['block']."',
      '".$formdata['village_ward']."','".$formdata['panchayat_municipal']."','".$formdata['candidate']."','".$formdata['mothers']."','".$formdata['fathers']."','".$formdata['occupation']."','".$formdata['pin_code']."',
      '".$formdata['religion']."','".$formdata['mobile']."','".$formdata['digit_adhaar']."',
      '".$formdata['attach_id_type']."','".$formdata['data_of_birth']."','".$formdata['community_sc_st_bpl']."','".$formdata['general_obc']."','".$formdata['asha_aww_fps']."','".$formdata['differently_abled']."',
      '".$formdata['candidate_type']."','".$formdata['name_of_institude_where_studying']."')";
       
    
      $con->query($insertquery);
      $_SESSION['success']="Successfuly submit......";
      header("Location:form_list.php");



    }else{
            $_SESSION['error']="All filed are requried....";
            $_SESSION['district']=$formdata['district'];
            $_SESSION['teshil']=$formdata['teshil'];
            $_SESSION['block']=$formdata['block'];
            $_SESSION['village_ward']=$formdata['village_ward'];
            $_SESSION['panchayat_municipal']=$formdata['panchayat_municipal'];
            $_SESSION['candidate']=$formdata['candidate'];
            $_SESSION['mothers']=$formdata['mothers'];
            $_SESSION['fathers']=$formdata['fathers'];
            $_SESSION['occupation']=$formdata['occupation'];
            $_SESSION['pin_code']=$formdata['pin_code'];
            $_SESSION['religion']=$formdata['religion'];
            $_SESSION['mobile']=$formdata['mobile'];
            $_SESSION['digit_adhaar']=$formdata['digit_adhaar'];
            $_SESSION['attach_id_type']=$formdata['attach_id_type'];
            $_SESSION['data_of_birth']=$formdata['data_of_birth'];
            $_SESSION['community_sc_st_bpl']=$formdata['community_sc_st_bpl'];
            $_SESSION['general_obc']=$formdata['general_obc'];
            $_SESSION['asha_aww_fps']=$formdata['asha_aww_fps'];
            $_SESSION['differently_abled']=$formdata['differently_abled'];
            $_SESSION['candidate_type']=$formdata['candidate_type'];
            $_SESSION['name_of_institude_where_studying']=$formdata['name_of_institude_where_studying'];
            header("Location:form.php");

    }


}else{
      die("UN-Authrotion Access..........");
}

?>