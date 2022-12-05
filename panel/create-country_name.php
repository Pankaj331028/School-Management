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
    <form action="save-country-data.php" method="POSt">
    <table border="1">
        <tr>
            <td>Contry Name</td>
            <td><input type="text" name="country_name" id="" value="<?php echo isset($_SESSION['country_name'])?$_SESSION['country_name']:''; ?>">  </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <?php 
                $seloption=isset($_SESSION['status_country']) ?$_SESSION['status_country']:'';
                ?>
                <select name="status_country" id="">
                    <option value="1" <?php echo ($seloption===1)?'selected':'';?>>Enable</option>
                    <option value="0" <?php echo ($seloption===0)?'selected':'';?>>Disable</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Add State Name's</td>
            <td>
                <table id="state_table">
                    <tr>
                        <th>State Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="state_name[]" id="">
                        </td>
                        <td>
                            <select name="state_status[]" id="">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </td>
                        <td>
                            <input type="button" name="" id="add_state" value="Add"/>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td><button type="submit" name="submit">Submit</button> </td>
        </tr>
    </table>
   </form>

    </div>
</body>
<script>
      $(document).ready(function(){
    $('#add_state').click(function(){
        var tRow='<tr><td><input type="text" name="state_name[]"></td><td><select name="state_status[]" id=""><option value="1">Enable</option><option value="0">Disable</option></select></td><td> <input type="button" class="remove_state" value="Remove"/> </td></tr>';
        
        $('#state_table').append(tRow);
    });

    $('body').delegate(".remove_state", "click", function(){
        $(this).closest('tr').remove();
    });

});
</script>
</html>