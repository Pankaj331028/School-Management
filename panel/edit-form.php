<?php

require_once("config.php");
require_once("confing.php");
require_once("validate-session.php");

$formId=$_REQUEST['id'];

if($formId){
    $selSql="SELECT  * FROM `students` WHERE id=$formId";
 
   $form= $con->query($selSql);
    if($form->num_rows){
        $formRecord=$form->fetch_assoc();
        
        
    }else{
        $_SESSION['error']="Record not found..";
        header("form_list.php");
    }
}else {
    header("Location:form_list.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/form.css">
    <style>
  .error{
    background-color:red;
    width:26%;
  }
</style>
</head>
<body>  
        <div class="header">
         <u> <h2 class="studentr">Student Registration From For NDLM Tranining</h2></u>
    <p class="Allfields">(All Fields Marked * are Mandatoory)</p>
    <?php
      if(isset($_SESSION['error'])){?>
      <div class="error">
     <?php    echo $_SESSION['error']; ?>
      </div>
      <?php
      unset($_SESSION['error']);

      }?>
    <u> <h4 class="basicunder">Basic Details:-</h4></u>
    <form action="update-from.php" method="post">
    <input type="text" name="id" value="<?php echo $formRecord['id'];  ?>">
    <div class="main">
        
        <div class="Basic">
              <div class="first" >
               <div class="District">  <h5>District*:</h5> <input class="d"  type="text" name="district" value="<?php echo $formRecord['district']; ?>"> </div> 
               <div class="District">  <h5>Tehsil*:</h5><input class="t" type="text" name="teshil" value="<?php echo $formRecord['teshil']; ?>"  > </div>  
               <div class="District">  <h5>Block*</h5><input class="b" type="text" name="block" value="<?php echo $formRecord['block']; ?>" ></div>  
                <div class="District"> <h5>Village/Ward*:</h5> <input class="v" type="text" name="village_ward"  value="<?php echo $formRecord['village_ward']; ?>" ></div>  
                <div class="District"> <h5>Panchayat/Municipal*:</h5> <input class="p" type="text" name="panchayat_municipal" value="<?php echo $formRecord['panchayat_municipal']; ?>"> </div>  
              </div>
              <div class="secondimg">
                <input type="text" name="" id="" placeholder="image">
              </div>
             
        </div>
        <u> <h4>Studebt Deatails:-</h4></u>
        <div class="secondsction">
            <div class="candidate"><h5>Candidate Name*:</h5><input class="c" type="text" name="candidate"  value="<?php echo $formRecord['candidate']; ?>" > </div>
            <div class="candidate"><h5>Mothers Name*:</h5><input class="m" type="text" name="mothers" value="<?php echo $formRecord['mothers']; ?>"> </div>
            <div class="candidate"><h5>Fathers Name*:</h5><input class="f" type="text" name="fathers" value="<?php echo $formRecord['fathers']; ?>"> </div>
        </div>

        <div class="occupation">
            <div class="occupfirst">
                 <div class="pin"> <h5>Occupation*:</h5> <input class="o" type="text" name="occupation" value="<?php echo $formRecord['occupation']; ?>"> </div>
                 <div class="pin"> <h5>Pin Code*:</h5> <input class="pi" type="text" name="pin_code" value="<?php echo $formRecord['pin_code']; ?>"> </div>
            </div>
            <div class="relig">
               
                <div class="pin"> <h5>Religion*:</h5> <input class="r" type="text" name="religion" value="<?php echo $formRecord['religion']; ?>"> </div>
                <div class="pin"> <h5>Mobile*:</h5> <input class="mo" type="text" name="mobile" value="<?php echo $formRecord['mobile']; ?>"> </div>
            </div>

        </div >
           
         <div class="digitAdhar">
            <h5>12 Digit Adhaar No*:</h5><input class="digit" type="text" name="digit_adhaar" value="<?php echo $formRecord['digit_adhaar']; ?>">
         </div> 
         <div class="Attach">
             <div class="data">
                <h5>Attach ID Type*:</h5><input class="at" type="text" name="attach_id_type"  value="<?php echo $formRecord['attach_id_type']; ?>">
             </div>
             <div class="datae">
                <h5>Data of Birth*</h5><input class="da" type="text" name="data_of_birth"  value="<?php echo $formRecord['data_of_birth']; ?>" >
             </div>
         </div>
         <div class="cast">
            <div class="community">
                <h5>Community *:SC/ST/BPL</h5> <input class="com" type="" name="community_sc_st_bpl" value="<?php echo $formRecord['community_sc_st_bpl'];  ?>" >
            </div>
            <div class="general">
                <h5>General/OBC</h5> <input class="gen" type="text" name="general_obc"  value="<?php echo $formRecord['general_obc']; ?>" >
            </div>
            <div class="asha">
                <h5>ASHA/AWW/FPS</h5> <input class="aww" type="text" name="asha_aww_fps"  value="<?php echo $formRecord['asha_aww_fps']; ?>">
            </div>

         </div>
         <div class="different">
                <div class="abled">
                    <h5>Differently Abled*:Yes/No</h5> <input class="dif" type="text" name="differently_abled" value="<?php echo $formRecord['differently_abled']; ?>">
                </div>
                <div class="abled">
                    <h5>Candidate Type*:BPL/Non BPL</h5> <input class="cand" type="text" name="candidate_type" value="<?php echo $formRecord['candidate_type']; ?>">
                </div>
         </div>
         <div class="nameofin">
                <h5>Name of Institude where Studying:-</h5>
                <input class="nameo" type="text" name="name_of_institude_where_studying" value="<?php echo $formRecord['name_of_institude_where_studying']; ?>">
         </div>
         <h5 class="family">Family Details:</h5>

         <table border="1" width="100%"  >
            <tr>
                <th>Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Relation</th>
                <th>Adhaar</th>
                <th>Action</th>
            </tr>

            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>
                     <span> <a href="#">Delete</a></span>
                     <span> <a href="#">Add More</a></span>

                </td>
            </tr>
         </table>
         
         <div class="photo">
            <h5>Upload photo:</h5> <input class="uppho" type="file" name="" id="">
         </div>
         <div class="photo">
            <h5>Upload Signature::</h5> <input class="uppho" type="file" name="" id="">
         </div>
          <h5>Note*</h5>
          <p>I have  no objection for Adhaar authentication and obtaining NDLM Training  through Comtech institute of Technolgy.</p>
                   <button type="submit" name="submit">Submit </button>
                </form>
    </div>
</body>
</html>
