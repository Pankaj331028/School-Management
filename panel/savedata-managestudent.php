<?php
require_once("config.php");


$foramdata=$_REQUEST;


if($_SERVER['REQUEST_METHOD']=='POST'  && (isset($foramdata['save']))){

    if($foramdata['student_name'] && $foramdata['classname_student'] && $foramdata['email'] && $foramdata['phonenumber']){
    //  $insertquery="INSERT INTO `students`(``)";
         $insertquary="INSERT INTO `students`(student_name,classname_student,email,phonenumber) value ('".$foramdata['student_name']."','".$foramdata['classname_student']."','".$foramdata['email']." ',".$foramdata['phonenumber'].")";
            $con->query($insertquary);
            $_SESSION['success']="Student name sucessfully ......";
            header("Location:manage-student.php");
  
        }else{
            $_SESSION['error']="All filed ara requried ";
            $_SESSION['student_name']=$foramdata['student_name'];
            $_SESSION['classname_student']=$foramdata['classname_student'];
            $_SESSION['email']=$foramdata['email'];
            $_SESSION['phonenumber']=$foramdata['phonenumber'];
            header("Location:create_studentname.php");
        }

}
else {
  die ("UN-Authrotion Access.................");
}


?>