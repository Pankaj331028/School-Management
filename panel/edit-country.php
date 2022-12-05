<?php
require_once("config.php");
require_once("validate-session.php");

$countryId=$_REQUEST['id'];

if($countryId){
     $selcountry="SELECT * FROM `countrys` WHERE id=$countryId";
    // $selcountry="SELECT countrys.*,states.state_name,states.state_status from countrys, states where  countrys.id=$countryId";
    //$selcountry="SELECT countrys.*,states.state_name,states.state_status,states.id as state_id from countrys, states where  countrys.id=$countryId and states.country_id=$countryId";
    $countryResult=$con->query($selcountry);
    if($countryResult->num_rows){
        $countryRecord=$countryResult->fetch_assoc();
    }else{
        $_SESSION['error']="Record not found...";
        header("Location:country-list.php");
    }

}else{
    header("Location:country-list.php");
}
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
    <form action="update-country.php" method="POSt">
    <input type="hidden" name="country_id" value="<?php echo $countryRecord['id']; ?>"> 
   
    <table border="1">
        <tr>
            <td>Contry Name</td>
            <td><input type="text" name="country_name"  value="<?php echo $countryRecord['country_name']; ?>">  </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                
                <select name="status_country" >
                    <option value="1" <?php echo ($countryRecord['status_country']==1)?'selected':'';?>>Enable</option>
                    <option value="0" <?php echo ($countryRecord['status_country']==0)?'selected':'';?>>Disable</option>
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
                        <!-- <td>
                            <input type="text" name="state_name[]" id="">
                        </td>
                        <td>
                            <select name="state_status[]" id="">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </td> -->
                        <td></td>
                        <td></td>
                        <td>

                            <input type="button" name="" id="add_state" value="Add"/>
                        </td>
                    </tr>
                   
                  <?php 
                   $selectstate="SELECT * FROM `states` WHERE country_id=$countryId";
                   $resultState=$con->query($selectstate);
                   if($resultState->num_rows>0){
                    while( $stateRecord=$resultState->fetch_assoc()){
                        ?>
                       <tr>
                       <input type="hidden" name="state_id[]" value="<?php echo $stateRecord['id'];?>">
                        <td><input type="text" name="state_name[]" value="<?php echo $stateRecord['state_name'];?>"></td>
                        <!-- <td><input type="text" value="<?php //echo $countryRecord['state_status']==1?'Enable':'Disable';?>"></td> -->
                        <td>
                            <select name="state_status[]" id="">
                                <option value="1" <?php echo ($stateRecord['state_status']==1)?'selected':'';?>>Enable</option>
                                <option value="0" <?php echo ($stateRecord['state_status']==0)?'selected':'';?>>Disable</option>
                            </select>
                        </td>
                        <td> <input type="button" class="remove_state" value="Delete"/> </td>
                       </tr>
                       <?php
                    }
                }
                  ?>

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
        var tRow='<tr><td><input type="hidden" name="state_id[]" ><input type="text" name="state_name[]"></td><td><select name="state_status[]" id=""><option value="1">Enable</option><option value="0">Disable</option></select></td><td> <input type="button" class="remove_state" value="Remove"/> </td></tr>';
        
        $('#state_table').append(tRow);
    });

    $('body').delegate(".remove_state", "click", function(){
        $(this).closest('tr').remove();
    });

});
</script>
</html>