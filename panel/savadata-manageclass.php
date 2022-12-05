<?php
require_once("config.php");
$foramdata=$_REQUEST;

if($_SERVER['REQUEST_METHOD']=='POST' && (isset($foramdata['save']))){

   if($foramdata['class_name'] && (($foramdata['status_name'] or (int)$foramdata['status_name']===0) &&  $foramdata['section_name_1'])){
    $insertquery=" INSERT INTO `classes` (class_name,section_name_1, status_name ) values('".$foramdata['class_name']."','".$foramdata['section_name_1']."',".$foramdata['status_name'].") ";
//    print_r($insertquery);
//    die;
    $con->query($insertquery);
    $classId=$con->insert_id;
    foreach($foramdata['section_name'] as $Key=>$sectionName){
        // print_r($sectionName);
        $sectionName=$sectionName;
        $insSection="INSERT INTO `sections`(class_name,section_name) values($classId,'$sectionName')";
        // print_r($insSection);
        $con->query($insSection);
    }
    // die;
   
    $_SESSION['success']="Create class Successfuly.................";
    header("Location:manage-class.php");
   }
   else{
        $_SESSION['error']="All filed Requried ......";
        $_SESSION['class_name']=$foramdata['class_name'];
        $_SESSION['section_name_1']=$foramdata['section_name_1'];
        $_SESSION['status_name']=$foramdata['status_name'];
        header("Location:create_classname.php");
   }

}
else {
    die("Un-Authorized Access....");
}





?>