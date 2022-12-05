<?php

require_once("config.php");
require_once("confing.php");
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
                    <p>Dashbord</p>
                  </div>
                  <div class="rgt">
                  <a href="form.php"> <button>Student Registration</button> </a>

                  </div>
    </div>
    <?php
            include_once("messages.php");
          ?>
        <div class="tablea"> 
             <table width="100%">
                <tr class="heading">
                  <th>ID</th>
                    <th>Candidate Name</th>
                    <th>Mothers Name</th>
                    <th>Fathers Name</th>
                    <th>Mobile Number</th>
                    <th>12 Digit Adhaar No</th>
                    <th>Action</th>
                </tr>
                <?php 
         $selectquery="SELECT * FROM `students`";
          $formdatar=$con->query($selectquery);

          if($formdatar->num_rows>0){
               $i=1;
            while($formrow=$formdatar->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $i++ ;?></td>
                    <td><?php echo $formrow['candidate'] ; ?></td>
                    <td><?php echo $formrow['mothers'] ; ?></td>
                    <td><?php echo $formrow['fathers'] ; ?></td>
                    <td><?php echo $formrow['mobile'] ; ?></td>
                    <td><?php echo $formrow['digit_adhaar'] ; ?></td>
                    <td>
                                <span> <a href="edit-form.php?id=<?php  echo $formrow['id']; ?>"> Edit</a> </span>
                                <span> <a  class="delete-form" href="delete-form.php?id=<?php  echo $formrow['id']; ?>">Delete</a></span>
                            </td>
                </tr>
                <?php
            }
          }


        ?>
       
              
             </table>
        </div>

    </div>
    <script>
  $(document).reday(function(){
      $('.delete-form').click(function(e){
        confirmation=confirm("are you want to  delete the student data");
        if(!confirmation){
          e.preventDefault();      
        }
      });

  });
</script>
</body>

</html>