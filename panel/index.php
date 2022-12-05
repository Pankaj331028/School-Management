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
    <script src="https://kit.fontawesome.com/4a7a31b0e7.js" crossorigin="anonymous"></script>
  
    <link href="css/style-login.css" rel="stylesheet" />
</head>
<body>
   
    <div class="cantaner">
        <div class="header">
            <div class="iner">
                     <div class="iconperson">
                         <img src="./WhatsApp Image 2022-09-05 at 08.32.22.jpeg" alt="">
                        </div>
                        <?php
     
                                      include_once("messages.php");

                                    ?>
                             <form action="loginpage.php" method="POST">
                                 <div class="username">
                                      <i class="fa-solid fa-user"></i>
                                        <input type="text" placeholder="Username" name="username">
                                    </div>
                                       <div class="passworda">
        
                                       <i class="fa-solid fa-unlock-keyhole"></i>
        

                                         <input type="password" placeholder="*****" name="password">
                                          </div>
                                            <div class="checkboxa">
                                                 <div class="remeber">
                                                     <input type="checkbox">
                                                         <p>Remember me</p></div>
                                                                 <div class="forgot">
                                                           <a href="reset-password-form.php">  Forgot Password? </a>
                                                                  </div>
                                                              </div> 
                                                  <div class="login">
                                                   <button type="submit" name="login">LOGIN</button>
                                                    </div>
                         </form>
             </div>
        </div>
    </div>
</body>
</html>