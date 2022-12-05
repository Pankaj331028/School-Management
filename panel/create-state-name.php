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
    <form action="save-state-data.php" method="POST">
        <table border='1'>
            <tr>
                <td>Country name</td>
                 <td>
                <?php 
                 $select="SELECT * FROM `countrys` ";
                $selectdata=$con->query($select);

                ?>
                <select name="country_id" >
                    <?php 
                    while($selectRecord=$selectdata->fetch_assoc()){
                        ?>
                        <option value="<?php echo $selectRecord['id'];?>"><?php echo $selectRecord['country_name'];?></option>
                        <?php
                    }

                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>State Name</td>
                <td>
                  <input type="text" name="state_name" value="<?php echo isset($_SESSION['state_name'])?$_SESSION['state_name']:''; ?>">
                </td>
            </tr>
            <tr>
                <td>Status </td>
                    <td>
                        <?php 
                        $selected=isset($_SESSION['state_status'])?$_SESSION['state_status']:'';
                        ?>
                        <select name="state_status" id="">
                        <option value="1" <?php echo ($selected==='1')?'selected':'';?>>Enable</option>
                        <option value="0"<?php echo ($selected==='0')?'selected':'';?>>Disable</option>
                    </select>
                    </td>
            </tr>
            <tr>
            <td>Add City Name's</td>
            <td>
                <table id="city_table">
                    <tr>
                        <th>City Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="city_name[]" id="">
                        </td>
                        <td>
                            <select name="status_city[]" id="">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </td>
                        <td>
                            <input type="button" name="" id="add_city" value="Add"/>
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
    $('#add_city').click(function(){
        var tRow='<tr><td><input type="text" name="city_name[]"></td><td><select name="status_city[]" id=""><option value="1">Enable</option><option value="0">Disable</option></select></td><td> <input type="button" class="remove_city" value="Remove"/> </td></tr>';
        
        $('#city_table').append(tRow);
    });

    $('body').delegate(".remove_city", "click", function(){
        $(this).closest('tr').remove();
    });

});
</script>
</html>
<?php
unset($_SESSION['state_name']);

?>