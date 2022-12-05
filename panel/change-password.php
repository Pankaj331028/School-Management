<?php
require_once("config.php");
require_once("validate-session.php");
if(isset($_POST['save'])){
    $op=md5($_POST['old_password']);
    $np=md5($_POST['new_password']);
    $cnp=md5($_POST['cnew_password']);
    // print_r($op);
    // echo "<br>";
    // print_r($np);
    // echo "<br>";
    // print_r($cnp);
    $loginid=$_SESSION['id'];
    // print_r($loginid);
    // die();
    
    if($np==$cnp){
        $select="SELECT * FROM `users` WHERE password='$op' and id='$loginid'";
        //  print_r($select);
        //  echo "<br>";
        
        $passworddata=$con->query($select);
       
         $count=$passworddata->num_rows;
        //  print_r($count);
        //  echo "<br>";
        
         if($count>0){
                $query="UPDATE users SET password='$np'  where password='$op' and id='$loginid'";
                // print_r($query);
                // die();
                $passwordnew=$con->query($query);
                $_SESSION['success']="Successfuliy Password change..";
         }else{
            $_SESSION['error']="Old password does not match";
         }

        
    }else{
        // echo"New password $ Coonfirm New Password does not match";
        $_SESSION['error']="New password $ Coonfirm New Password does not match";
    }

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
             <?php
     
                 include_once("messages.php");

            ?>
             <form action="" method="POST">
                <table border="1" cellspacing="0" cellpadding="3" width="400">
                    <tr>
                        <td>Enter Old Password*</td>
                        <td> <input type="text" name="old_password" id=""> </td>
                    </tr>
                    <tr>
                        <td>Enter New Password*</td>
                        <td><input type="text" name="new_password" id=""> </td>
                    </tr>
                    <tr>
                        <td>Confirm New Password*</td>
                        <td><input type="text" name="cnew_password" id=""> </td>
                    </tr>
                    <tr>
                       <td> <button type="submit" name="save">Save</button></td>
                    </tr>
                </table>
             </form>
       
         </div>
    </div>
</body>
</html>