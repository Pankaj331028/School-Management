<?php

require_once("config.php");
require_once("validate-session.php");
$classId=$_REQUEST['id'];

if($classId){
    $delSql="DELETE FROM `classes` where id=$classId";
    $con->query($delSql);
    $_SESSION['success']="Record delete  Successfuly..";
    header("Location:manage-class.php");

}
else{
    header("Location:manage-class.php");
}
?>