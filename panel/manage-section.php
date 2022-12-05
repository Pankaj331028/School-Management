<?php
require_once("config.php");
require_once("validate-session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
  <?php  include_once("head.php");    ?>
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
                    <p>Manage Section</p>
                  </div>
                  <div class="rgt">
                  <a href="create_sectionname.php">     <button>Add New Section </button> </a> 
                  </div>
    </div>
    <?php
     
     include_once("messages.php");

  ?>
        <div class="tablea"> 
             <table width="100%">
                <tr class="heading">
                    <th>Id</th>
                    <th>Section</th>
                    <th>Class Name</th>
                    <th>Action</th>
                </tr>
                <?php
                    //$sectectquery="SELECT * FROM `sections`";
                    $sectectquery= "SELECT sec.*, cls.class_name FROM `sections` as sec, `classes` as cls where sec.class_name=cls.id";
                    $sectiondata=$con->query($sectectquery);

                    if($sectiondata->num_rows>0){
                        while($sectionRow=$sectiondata->fetch_assoc()){
                            ?>
                            <tr>
                            <td><?php echo $sectionRow['id'];   ?></td>
                            <td><?php  echo $sectionRow['section_name'];?></td>
                            <td> <?php echo $sectionRow['class_name'];?> </td>
                            <td>
                                <span> <a href=""> Edit</a> </span>
                                <span> <a href="">Delete</a></span>
                              </td>
                            </tr>
                            <?php
                        }
                    }

                ?>
               
             </table>
        </div>

    </div>
</body>
</html>