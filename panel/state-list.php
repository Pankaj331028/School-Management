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
                  <a href="create-state-name.php">  <button name="submit">Add State Name</button> </a>

                  </div>
    </div>
    <table border="1">
       <tr>
        <th>ID</th>
        <th> Country ID</th>
         <th>State Name</th>
        <th>Status</th>
        <th>Action</th>
       </tr>
       <?php 
    //    $selectquery="SELECT * FROM `states`";
       if(isset($_REQUEST['submit'])){
        $search=$_REQUEST['search'];
        $sqlSearch="SELECT sec.*, cls.country_name FROM `states` as sec, `countrys` as cls where sec.country_id=cls.id GROUP BY (  country_name LIKE '%$search%' or state_name LIKE '%$search'  )";
        print_r($sqlSearch);
        die();
        $resultSearch=$con->query($sqlSearch);
        if($resultSearch->num_rows>0){
          while($searchRow=$resultSearch->fetch_assoc()){
            ?>
            <tr>
              <td><?php echo $searchRow['id'];?></td>
              <td><?php echo $searchRow['country_name'];?></td>
              <td><?php echo $searchRow['state_name']?></td>
              <td><?php echo $searchRow['state_status']==1?"Enable":"Disable";?></td>
              <td> 
                     <span>   <a href="edit-state.php?id=<?php echo $searchRow['id']; ?>">Edit</a></span>
                     <span> <a href="">Delete</a></span>
                </td>
            </tr>
            <?php
          }
        }
       }else {
       $selectquery="SELECT sec.*, cls.country_name FROM `states` as sec, `countrys` as cls where sec.country_id=cls.id ORDER BY id DESC";
      //  echo "<pre>";
      //  print_r($selectquery);
      //  die();
       $statedata=$con->query($selectquery);
      //  print_r($statedata);
      //  die();
       if($statedata->num_rows>0){
        while($staterecord=$statedata->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $staterecord['id'];?></td>
                <td><?php echo $staterecord['country_name'];?></td>
                <td><?php echo $staterecord['state_name'];?></td>
                <td><?php echo $staterecord['state_status']==1?"Enable":"Disable";?></td>
                <td> 
                     <span>   <a href="edit-state.php?id=<?php echo $staterecord['id']; ?>">Edit</a></span>
                     <span> <a href="">Delete</a></span>
                </td>
            </tr>
                <?php
                
        }
       }
      }
       ?>
       <!-- <tr>
        <td><a href="create-state-name.php">  <button name="submit">Add State Name</button> </a> </td>
       </tr> -->
    </table>

    </div>
</body>
</html>