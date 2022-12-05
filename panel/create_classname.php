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
            <form action="savadata-manageclass.php" method="post" id="form">
                <table border="1" cellspacing="0" cellpadding="3" width="400">
                          <tr>
                            <td>Class Name*</td>
                            <td><input type="text" name="class_name" value="<?php echo (isset($_SESSION['class_name']))?$_SESSION['class_name']:''; ?>">   </td>
                          </tr>
                          <tr>
                            <td>Section Name*</td>
                            <td> <input type="text" name="section_name_1" value="<?php echo (isset($_SESSION['section_name_1']))?$_SESSION['section_name_1']:''; ?>"> </td>
                          </tr>
                          <tr>
                            <td>Status*</td>
                            <td>
                            <?php
                                         $seloption=(isset($_SESSION['status_name']))?$_SESSION['status_name']:'';
                                    ?>
                                <select name="status_name">
                                    <option value="1"  <?php echo ($seloption==='1')? 'selected':''; ?>>Enable</option>
                                    <option value="0"  <?php echo ($seloption==='0')? 'selected':''; ?>>Disable</option>
                                </select>
                            </td>
                          </tr>
                         <!-- <tr>
                            <table>
                          <tr class="input_fields_wrap">
                            <td>Section Name</td>
                            <td><input type="text"> </td>
                            <td> <div> <button  type="button" class="add_fiels_buttion"> Add</button> </div></td>
                          </tr>
                          </table>
                          </tr>-->
                          <tr>
                            <td>Add Class Section`s</td>
                            <td>
                              <table id="section_table">
                                <tr>
                                 <th>Section Name</th>
                                 <th>Action</th>
                                </tr>
                                <tr>
                                  <td>
                                    <input type="text" name="section_name[]" id="">
                                  </td>
                                  <td>
                                    <input type="button" id="add_section" value="Add"/>
                                  </td>
                                </tr>

                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td> <button type="submit" name="save" >Save</button>   </td>
                          </tr>
                </table>
            </form>

    </div>
</div>
  

 <script>
    /*  $(document).ready(function(){
        var max_fields=10;
        max_fields=parseInt(max_fields);
        var warpper=$(".input_fields_wrap");
        var add_button=$(".add_fiels_buttion");
        var x=1;
        x=parseInt(x);
        $(add_button).click(function(e){
          e.preventDefault();
          if(x<max_fields){
            $(warpper).append('<div><input type="text" > <a href="#" class="remove_field">Remove</a></div>');
            x++;
          }
        });
        $(warpper).on("click",".remove_field",function(e){
          e.preventDefault();
          $(this).parent('div').remove();
          x--;
        });

      });*/

      $(document).ready(function(){
        $('#add_section').click(function(){
          var tRow='<tr><td><input type="text" name="section_name[]"></td><td> <input type="button" class="remove_section" value="Remove"/> </td> </tr>';
          $('#section_table').append(tRow);
        });
        $('body').delegate(".remove_section","click",function(){
          $(this).closest('tr').remove();
        });
            });
 </script>
 

</body>
</html>
<?php
       // session_destroy();
       unset($_SESSION['class_name']);
       unset($_SESSION['section_name']);
    ?>