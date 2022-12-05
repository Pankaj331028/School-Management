<?php
include_once("config.php");
$countryId=$_REQUEST['ContId'];
$seclectQuery="SELECT * FROM `states` where country_id=$countryId";
$selectData=$con->query($seclectQuery);

echo  '<option value="">--Select Section--</option>';
while($Row=$selectData->fetch_assoc()){
    echo '<option value="'.$Row['id'].'">'.$Row['state_name'].'</option>';
}

?>
