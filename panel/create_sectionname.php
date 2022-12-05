<?php

require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>

  <?php  include_once("head.php");    ?>
  <style>
    .error {
    color: #ba3939;
    background: #ffe0e0;
    border: 1px solid #a33a3a;
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
                    <p>Add the Class Name</p>
                  </div>
                  <div class="rgt">
                    <p>Dashbord</p>

                  </div>
    </div>

         <?php
     
            include_once("messages.php");
      
         ?>

        <form action="savedata-managsection.php" method="post">
            <table border="1" cellspacing="0" cellpadding="3" width="400">
                <tr>
                    <td>Section Name</td>
                    <td> <input type="text" name="section_name" value="<?php echo (isset($_SESSION['section_name']))?$_SESSION['section_name']:'' ;?>" > </td>
                </tr>
                <tr>
                    <td>Class Name</td>
                    <td>
                        <?php 
                                $Select="SELECT * FROM `classes` ";
                                $Selectdata=$con->query($Select);
                        ?>
                        <select name="class_name" >
                           <?php 
                           while($selectrow=$Selectdata->fetch_assoc()){
                           ?>
                           <option value="<?php echo $selectrow['id'];?>"><?php echo $selectrow['class_name'];?></option><?php
                           }
                           ?>
                        </select>
                    </td>
                </tr>
               <tr>
                <td> <button name="submit">Submit</button> </td>
               </tr>

            </table>
        </form>


    </div>
</div>
  
</body>
</html>