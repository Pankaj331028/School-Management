<?php

require_once("config.php");
require_once("validate-session.php");

$classRcount=$con->query("SELECT COUNT(*)  as total FROM `classes` ");

$fetchDate=$classRcount->fetch_assoc();

$totalRow=$fetchDate['total'];
$limit=5;
$pageCount=ceil($totalRow/$limit);
if(isset($_REQUEST['page'])){
  $pageNo=$_REQUEST['page'];
}else{
  $pageNo=1;
}
$offset=($pageNo-1)*$limit;

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
                    <p>Manage All Class Name</p>
                  </div>
                  <div class="rgt">
                  <a href="create_classname.php"> <button style="background-color: aqua;">Add new class</button> </a> 

                  </div>
    </div>
          <?php
            include_once("messages.php");
          ?>
        <div class="tablea"> 
        <table width="100%">
        <tr class="heading">
                    <th>ID</th>
                    <th>Class Name</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Count(Section)</th>
                    <th>Action</th>
                </tr>
               <?php 
              // $selectQueray="SELECT * FROM `classes` LIMIT $offset,$limit ";
             $selectQueray="SELECT cls.*, count(sec.section_name) FROM `classes` as cls LEFT JOIN  `sections` as sec ON cls.id=sec.class_name group by class_name LIMIT $offset,$limit";
               $classData=$con->query($selectQueray);
               
                if($classData->num_rows>0){
                    $i=$offset+1;
                    while($classrow=$classData->fetch_assoc()){
                        ?>
                        <tr class="heading">
                            <td><?php  echo $i++;    ?></td>
                            <td><?php  echo $classrow['class_name'];  ?></td>
                            <td><?php  echo $classrow['section_name_1'];?> </td>
                            <td><?php echo $classrow['status_name']==1?"Enable":"Disable";   ?></td>
                            <td><?php  echo $classrow['count(sec.section_name)'];?></td>
                            <td>
                                <span> <a href="edit-class.php?id=<?php echo $classrow['id'] ; ?>">Edit</a> </span>
                                <span> <a class="delete-class" href="delete-class.php?id=<?php echo $classrow['id'] ; ?>">Delete</a></span>
                            </td>
                        </tr>
                        <?php
                    }
                 }
            ?>
           
            </table>
        </div>
        <?php  
          ?> <div class="pagintion"> 
            <?php
           if($pageNo>1){
            ?> <a  class="paged" href="?page=<?= $pageNo-1?>">Prev</a>&nbsp;<?php
           }
        for($i=1;$i<=$pageCount;$i++){
            if($i==$pageNo){
              $active="active";
            }else{
              $active="";
            }
          ?> <a class="paged  <?= $active ?> " href="?page=<?= $i?>"><?= $i?></a>&nbsp;<?php
        }
        if($pageCount>$pageNo){
          ?> <a class="paged"  href="?page=<?= $pageNo+1?>">Next</a>&nbsp;<?php
         }
         ?>
         </div>
         

       

    </div>
</body>
<script>
   $(document).ready(function(){
    $('.delete-class').click(function(e){
      confirmation=confirm("Are you want tio delete this record...");
      if(!confirmation){
        e.preventDefault();
      }
    });

   });
</script>
</html>