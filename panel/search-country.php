<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
       <form action="" method="POST">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submit" >Search</button>

       </form>

    </div>
    <div>
        <table class="table" border="1">
            <tr>
                <th>Id</th>
                <th>Country</th>
                <th>Status</th>
            </tr>
            <?php 
             if(isset($_REQUEST['submit'])){
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
                            <td><?php echo $row['status_country'];?></td>
                        </tr>
                        <?php
                    }
                }
                else{
                    echo '<h2> Data not Found </h2>';
                }
             }
            ?>
        </table>
    </div>




</body>
</html>