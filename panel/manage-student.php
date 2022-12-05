<?php

require_once("config.php");
require_once("validate-session.php");




?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
  <?php  include_once("head.php");    ?>
  <style>
    .success {
  color: #2b7515;
  background: #ecffd6;
  border: 1px solid #617c42;
}
  </style>
</head>
<body>
    <div class="header">
       
    <?php
                include_once("navigation.php");
            ?>
    <div class="secondsection">
                <?php  include_once("top-header.php"); ?>
   
    <div  class="DASBORED">
                  <div class="lft">
                    <p>Manage All Student Name</p>
                  </div>
                  <div class="rgt">
                    <!--<p>Dashbord</p>-->
                    <a href="create_studentname.php">     <button>Add New Student </button> </a> 
                  </div>
    </div>
    <?php
            include_once("messages.php");
          ?>
        <div class="tablea"> 
             <table width="100%">
                <tr class="heading">
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Class Name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Action</th>
                </tr>
                <?php
                $selectquary="Select * from `students`";
                $studentdata=$con->query($selectquary);
                 if($studentdata->num_rows>0){
                      $i=1;
                    while($studentrow=$studentdata->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $studentrow['student_name'] ;?> </td>
                         <td><?php echo $studentrow['classname_student']; ?></td>
                         <td><?php echo $studentrow['email'];?></td>
                         <td><?php echo $studentrow['phonenumber']; ?></td>
                         <td>
                                <span> <a href=""> Edit</a> </span>
                                <span> <a href="">Delete</a></span>
                            </td>
                        </tr>
                       <?php 
                    }
                }
                ?>
                  <!--   <tr>
                        <a href="create_studentname.php">     <button>Add New Student Name</button> </a>  
                      </tr> -->
              
             </table>
        </div>

    </div>
</body>
</html>