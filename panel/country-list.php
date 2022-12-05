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
                  <div class="middle">
                            <form class="middleform" action="" method="POST">
                                <input type="text" name="search" placeholder="Search">
                                <button name="submit" >Search</button>

                            </form>

                    </div>
                  <div class="rgt">
                  <a href="create-country_name.php"> <button>Add Contry Name</button></a>

                  </div>
    </div>
    <table border=1 id="countrytable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Contry</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>

        <?php 
        if( isset($_REQUEST['submit'])){
            $search=$_REQUEST['search'];
            // print_r($search);
            // die();
            $sql="SELECT * FROM `countrys` WHERE id LIKE '%$search%'  or country_name LIKE '%$search%'";
            $result=$con->query($sql);
            // print_r($result);
            // die();
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['country_name']; ?></td>
                        
                        <td><?php echo $row['status_country']==1?"Enable":"Disable";?></td>
                        <td> 
                       <span>   <a href="edit-country.php?id=<?php echo $row['id']; ?>">Edit</a></span>
                       <span> <a href="">Delite</a></span>
                  </td>
                    </tr>
                    <?php
                }
            }
            else{
                echo '<td rowspane="4"><h2> Data not Found </h2></td>';
            }
        }else{
            $select="SELECT * FROM `countrys` ORDER BY id DESC";
            $countryquery=$con->query($select);
             if($countryquery->num_rows>0){
                 $i=1;
              while($countryRecord=$countryquery->fetch_assoc()){
                  ?>
                  <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $countryRecord['country_name'];?></td>
                      <td><?php echo $countryRecord['status_country']==1?"Enable":"Disable";?></td>
                      <td> 
                       <span>   <a href="edit-country.php?id=<?php echo $countryRecord['id']; ?>">Edit</a></span>
                       <span> <a href="">Delite</a></span>
                  </td>
                  </tr>
                  <?php
              }
             }
         
        }
         ?>
        <!-- <tr>
            <td>
                <a href="create-country_name.php"> <button>Add Contry Name</button></a>
            </td>
        </tr> -->
    </table>

    </div>
    <script>
      
        jQuery(document).ready(function(){
            
            jQuery('#countrytable').DataTable();
        });
    </script>
</body>
</html>