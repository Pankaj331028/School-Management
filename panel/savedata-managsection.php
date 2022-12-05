<?php
require_once("config.php");


$foramdata=$_REQUEST;

if($_SERVER['REQUEST_METHOD'] && (isset($foramdata['submit']))){
        if($foramdata['section_name'] && $foramdata['class_name']){
            $insert="INSERT INTO    `sections` (section_name,class_name) values ('".$foramdata['section_name']."','".$foramdata['class_name']."')";
            $con->query($insert);
            $_SESSION['success']="Successfuliy submit....";
            header("Location:manage-section.php");
        }else{
            $_SESSION['error']="All field the required....";
            $_SESSION['section_name']=$_SESSION['section_name'];
            header("Location:create_sectionname.php");
        }

}else {
    die ("UN-Authrotion Access.................");
}
?>