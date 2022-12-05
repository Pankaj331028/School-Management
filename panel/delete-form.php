<?php
require_once("config.php");
require_once("confing.php");
require_once("validate-session.php");

$formId=$_REQUEST['id'];

if($formId){
    $Delsql="DELETE FROM `students` WHERE id=$formId";
    $con->query($Delsql);
   
    $_SESSION['success']="Record delete  Successfuly..";
    header("Location:form_list.php");
}else {
    header("Locatio:form_list.php");
}



?>
