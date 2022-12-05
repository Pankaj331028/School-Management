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
        <div class="tablea"> 
             <table width="100%">
                <tr class="heading">
                    <th>Months</th>
                    <th>Sales</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>January</td>
                    <td>85</td>
                    <td>$13,555,00</td>
                    <td>
                        <span> <a href=""> Edit</a> </span>
                        <span> <a href="">Delete</a></span>
                    </td>
                </tr>
                <tr class="heading">
                    <td>February</td>
                    <td>73</td>
                    <td>$9500.00</td>
                    <td>
                        <span> <a href=""> Edit</a> </span>
                        <span> <a href="">Delete</a></span>
                    </td>
                </tr>
                <tr>
                    <td >March</td>
                    <td>135</td>
                    <td>$18,00.00</td>
                    <td>
                        <span> <a href=""> Edit</a> </span>
                        <span> <a href="">Delete</a></span>
                    </td>
                </tr>
                <tr class="heading">
                    <td >April</td>
                    <td>45</td>
                    <td>$27,00.00</td>
                    <td>
                        <span> <a href=""> Edit</a> </span>
                        <span> <a href="">Delete</a></span>
                    </td>
                </tr>
                <tr>
                    <td>May</td>
                    <td>69</td>
                    <td>$13,000.00</td>
                    <td>
                        <span> <a href=""> Edit</a> </span>
                        <span> <a href="">Delete</a></span>
                    </td>
                </tr>
                <tr class="heading">
                    <td >June</td>
                    <td>105</td>
                    <td>$20,500.00</td>
                    <td>
                        <span> <a href=""> Edit</a> </span>
                        <span> <a href="">Delete</a></span>
                    </td>
                </tr>
             </table>
        </div>

    </div>
</body>
</html>