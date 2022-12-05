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
                    <p>Write the Student Information</p>
                  </div>
                  <div class="rgt">
                    <p>Dashbord</p>

                  </div>
    </div>
             <?php
                     include_once("messages.php");
             ?>


    <form action="savedata-managestudent.php" method="post" id="foram1">
            <table border="1" cellspacing="0" cellpadding="3" width="400">
                <tr>
                    <td>Student Name</td>
                    <td> <input type="text" name="student_name" value="<?php echo (isset($_SESSION['student_name']))?$_SESSION['student_name']:'' ;?>"> </td>
                </tr>
                <tr>
                   <td>Class Name</td>
                    <td>
                   <?php
                 //  $selectQueray="Select * from `classes`";
                        $selectQueray="SELECT * from `classes`";
                   $classData=$con->query($selectQueray);
                   ?>     
                    <select name="classname_student" id="class_id">
                                 <option value="">--Select Section--</option>
                        <?php  
                        while($row=$classData->fetch_assoc()){
                            ?>  <option value="<?php  echo $row['id'];?>"><?php  echo $row['class_name'];?></option> <?php
                            
                        }
                        ?>
                       
                       
                    </select>
                    </td>
                </tr> 
                <tr>
                    <td>Section Name</td>
                    <td>
                        <select name="section_name" id="section_id">
                            <option value="">--Select Section--</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Email</td>
                    <td> <input type="email" name="email" value="<?php echo (isset($_SESSION['email']))?$_SESSION['email']:'' ;?>">  </td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td> <input type="text" name="phonenumber"  value="<?php echo (isset($_SESSION['phonenumber']))?$_SESSION['phonenumber']:'' ;?>"> </td>
                </tr>

                 <tr>
                    <td>
                        <button type="Submit" name="save" >Save</button>
                    </td>
                 </tr>
            </table>
        </form>


         

    </div>
</body>
<script>
    $(document).ready(function(){
            $('#class_id').change(function(){
                    classId=$(this).val();

                    $.ajax({
                        url:"get-class-section.php",
                        type:'GET',
                        data:{'clsId':classId},
                        success:function(result){
                            $('#section_id').html(result);
                        },
                        error:function(err){
                            alert("Error...");

                        }
                    });
            });

    });
</script>
</html>
<?php
unset($_SESSION['student_name']);
unset($_SESSION['email']);
unset($_SESSION['phonenumber']);

?>