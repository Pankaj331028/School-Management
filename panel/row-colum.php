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
                    <p>Dashbord</p>
                  </div>
                  <div class="rgt">
                    <p>Dashbord</p>

                  </div>
    </div>

    <input type="button" id="add_row" value="Add/Row"/>
    <input type="button" id="add_column" value="Add/Column"/>
    <input type="button" id="add_row_column" value="Add Row/Column">
    <input type="button" id="remove_row" value="Remove Row">
    <input type="button" id="remove_column" value="Remove Column">
    <!-- <button type="button" id="add_row">Add Row</button> -->
                            <table id="section_table"  border="1" cellpadding="0" cellspacing="0">
                              <tbody>
                                <tr>
                                    <td></td>
                                </tr>
                              </tbody>

                              </table>

                              

    </div>
    <script>
        $(document).ready(function(){
        $('#add_row').click(function(){
            // console.log("vuygc");
          var tRow=jQuery('#section_table tr:first').clone();
           tRow.find('input[type="text"]').val("");
         $('#section_table tbody').append(tRow);

          $('#add_column').click(function(){
            var tColumn="<td><input type='text'/></td>";
            $('#section_table tbody tr').append(tColumn);

          });
          $('#add_row_column').click(function(){
            var tRow=jQuery('#section_table tbody tr:first-child').clone();
            $('#section_table').append(tRow);

            var tColumn="<td></td>";
            $('#section_table tbody tr').append(tColumn);



          });

          $('#remove_row').click(function(){
              $("#section_table tbody tr:last-child").remove();
          });

        });
        $('#remove_column').click(function(){
          $('#section_table tbody tr td:last-child').remove();
        });


        // $('#add_Colume').click(function(){
        //    $('#section_table tbody tr:last-child').append();
        // });
        // $('#add_coulam').click(function(){
        // $('#section_table tbody tr:last-child').append('<td></td>')
        // });

     });
    </script>

    
</body>
</html>