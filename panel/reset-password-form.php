<?php

require_once("config.php");
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
  <form action="sava-reset-password.php" method="post">
    <table>
        <tr>
            <td>Reset Password</td>
            
        </tr>
        <tr>
            <td><label for="">Email Address</label>
                <input type="email" name="email">
            </td>
        </tr>
        <tr>
           <td> <button name="submit" type="submit">Send Password Rest Link</button></td>
        </tr>
    </table>
  </form>

</body>
</html>