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
                  <a href="create-city-name.php">  <button>Add the city Name</button> </a>

                  </div>
    </div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>City Name</th>
            <th>State Name</th>
            <th>Country Name </th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $selectcity="SELECT cit.*, cls.country_name,sec.state_name FROM `citys` as cit, `states` as sec ,`countrys` as cls WHERE cit.state_id=sec.id and sec.country_id=cls.id ORDER BY id DESC";
        $CityData=$con->query($selectcity);
        if($CityData->num_rows>0){
            while($cityRow=$CityData->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $cityRow['id'];?></td>
                    <td><?php echo $cityRow['city_name']; ?></td>
                    <td> <?php echo $cityRow['state_name']; ?></td>
                    <td><?php  echo $cityRow['country_name']; ?></td>
                    <td> <?php echo $cityRow['status_city']==1?'Enable':'Disable'; ?></td>
                     <td> 
                     <span>   <a href="edit-city.php?id=<?php echo $cityRow['id']; ?>">Edit</a></span>
                     <span> <a href="">Delite</a></span>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        <!-- <tr>
            <td> <a href="create-city-name.php">  <button>Add the city Name</button> </a></td>
        </tr> -->
    </table>

    </div>
</body>
</html>