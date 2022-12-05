<?php

require_once("config.php");
require_once("validate-session.php");
$classId=$_REQUEST['id'];
if($classId){
$selSql="SELECT * FROM  `classes` WHERE id=$classId";
$class=$con->query($selSql);
 if($class->num_rows){
    $classRecord=$class->fetch_assoc();
 }else{
    $_SESSION['error']="Record not found...";
    header("Location:manage-class.php");
 }


}else{
    header("Location:manage-class.php");
}


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
     
           // include_once("messages.php");
      
         ?>
            <form action="update-class.php" method="post" id="form">
                <input type="hidden" name="id" value="<?php echo $classRecord['id'];  ?>">
                <table border="1" cellspacing="0" cellpadding="3" width="400">
                          <tr>
                            <td>Class Name*</td>
                            <td><input type="text" name="class_name" value="<?php echo $classRecord['class_name'];?>">   </td>
                          </tr>
                          <tr>
                            <td>Section Name*</td>
                            <td> <input type="text" name="section_name" value="<?php echo $classRecord['section_name']; ?>"> </td>
                          </tr>
                          <tr>
                            <td>Status*</td>
                            <td>
                            <?php
                                        
                                    ?>
                                <select name="status_name">
                                    <option value="1"  <?php echo ($classRecord=='1')? 'selected':''; ?>>Enable</option>
                                    <option value="0"  <?php echo ($classRecord=='0')? 'selected':''; ?>>Disable</option>
                                </select>
                            </td>
                          </tr>
                          <tr>
                            <td> <button type="submit" name="update_class" values="Update Class">Save</button>   </td>
                          </tr>
                </table>
            </form>

    </div>
</div>
  
</body>
</html>



