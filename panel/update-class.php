<?php

require_once("config.php");
require_once("validate-session.php");
$formData=$_REQUEST;
$id=$formData['id'];
$class_name=$formData['class_name'];
$section_name=$formData['section_name'];
$status_name=$formData['status_name'];

$updSql="UPDATE `classes` SET class_name='$class_name',section_name='$section_name',status_name=$status_name WHERE id=$id";
$con->query($updSql);
$_SESSION['success']="Record Udeate successfully..";
header("Location:manage-class.php");