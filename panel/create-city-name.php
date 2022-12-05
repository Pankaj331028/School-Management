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
    <form action="save-city-data.php" method="post">
        <table border="1">
                <tr>
                    <td>City Name</td>
                    <td><input type="text" name="city_name" value="<?php echo isset($_SESSION['city_name'])?$_SESSION['city_name']:''; ?>"> </td>
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
                           
                            <option value="<?php echo $countryRow['id'];?>"><?php echo $countryRow['country_name'];?></option>
                            <?php

                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>State Name</td>
                    <td>
                        <select name="state_name" id="state_id">
                            <option value="">--Select Section--</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <?php 
                        $selectoption=isset($_SESSION['status_city'])?$_SESSION['status_city']:'';
                        ?>
                        <select name="status_city" id="">
                            <option value="1" <?php echo ($selectoption===1)?'selected':'';?>>Enable</option>
                            <option value="0" <?php echo ($selectoption===0)?'selected':'';?>>Disable</option>
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