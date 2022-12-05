
<?php
require_once("config.php");
require_once("validate-session.php");
$cityId=$_REQUEST['id'];

if($cityId){
    $selectcity="SELECT * FROM `citys` WHERE id=$cityId";
    // print_r($selectcity);
    // die();
    $resultCity=$con->query($selectcity);
    if($resultCity->num_rows>0){
        $cityRecord=$resultCity->fetch_assoc();
        // print_r($cityRecord);
        // die();
        $countryId=$cityRecord['country_id'];
        $stateId=$cityRecord['state_id'];
    }else{
        $_SESSION['error']="Record not found...";
        header("Location:city-list.php");
    }


}else{
    header("Location:city-list.php");
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
    <form action="update-city.php" method="post">
        <input type="hidden" name="cityId" value="<?php echo $cityRecord['id'];?>">
        <table border="1">
                <tr>
                    <td>City Name</td>
                    <td><input type="text" name="city_name" value="<?php echo $cityRecord['city_name']; ?>"> </td>
                </tr>

                <tr>
                    <td>Country Name</td>
                    <td>
                        <?php  
                        $selectCountry="SELECT * FROM `countrys`";
                        $countryData=$con->query($selectCountry);
                        ?>
                        <select name="country_id" id="country_id">
                        <option value="">--Select State--</option>
                        <?php 
                        while($countryRow=$countryData->fetch_assoc()){
                            ?>
                           
                            <option value="<?php echo $countryRow['id'];?>" <?php echo ($cityRecord['country_id']==$countryId)?'selected':'';?>><?php echo $countryRow['country_name'];?></option>
                            <?php

                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>State Name</td>
                    <td>
                        <?php 
                            $selectState="SELECT * FROM `states` WHERE country_id=$countryId";
                            $stateResult=$con->query($selectState);
                                              
                        ?>
                        <select name="state_name" id="state_id">
                            <option value="">--Select Section--</option>
                        <?php 
                         while($selectRow=$stateResult->fetch_assoc()){
                            ?>
                              <option value="<?php echo $selectRow['id']; ?>" <?php echo ($cityRecord['state_id']==$stateId)?'selected':''?>><?php echo $selectRow['state_name'];?></option>
                              <?php
                         }
                        ?>
                          
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                       
                        <select name="status_city" id="">
                            <option value="1" <?php echo ($cityRecord['status_city']===1)?'selected':'';?>>Enable</option>
                            <option value="0" <?php echo ($cityRecord['status_city']===0)?'selected':'';?>>Disable</option>
                        </select>
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
        $('#country_id').change(function(){
            countryId=$(this).val();

            $.ajax({
                url:"get-country-state.php",
                type:'GET',
                data:{'ContId':countryId},
                success:function(result){
                    $('#state_id').html(result);
                },
                error:function(err){
                    alert("Error..");
                }
            });
        });

    });
</script>
</html>
<?php
unset($_SESSION['city_name']);
?>