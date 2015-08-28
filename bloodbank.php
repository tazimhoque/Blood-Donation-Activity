<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['email'])) {
$email = $_SESSION['email'];
}

?>
<html>
    <head>
        <meta charset="utf-8" />
	<title>Blood Bank</title>
        <link rel="stylesheet" type="text/css" href="button/compressed.button.css"
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="blurBg-false" style="background-color:#FFFFFF">
        <?php
include 'db_connection.php';
$sql = "SELECT * from bloodbank where email='$email'";
   if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          //$id_update=$query_row['id'];
          $Apos=$query_row['Apos'];
          $Aneg=$query_row['Aneg'];
          $Bpos=$query_row['Bpos'];
          $Bneg=$query_row['Bneg'];
          //$blood_update=$query_row['blood'];
          $Opos=$query_row['Opos'];
          
          $Oneg=$query_row['Oneg'];
          $ABpos=$query_row['ABpos'];
          $ABneg=$query_row['ABneg'];
      }
  }
  
?>
         <a href="logout.php" class="red button criss-cross" style="float: right;">Log Out</a><br><br>
        <link rel="stylesheet" href="reg_donor_files/formoid1/formoid-default-red.css" type="text/css" />
<script type="text/javascript" src="reg_donor_files/formoid1/jquery.min.js"></script>
        <form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="bloodbank.php" method="POST"><div class="title"><h2>Blood Bank Status</h2></div>  
      <div class="element-input" ><label class="title">A+</label><input class="large" type="text" name="Apos" value="<?if(isset($_POST['Apos']))echo $_POST['Apos'];else echo $Apos;?> " /></div>
      <div class="element-input" ><label class="title">A-</label><input class="large" type="text" name="Aneg" value="<?if(isset($_POST['Aneg']))echo $_POST['Aneg'];else echo $Aneg;?> " /></div>
      <div class="element-input" ><label class="title">B+</label><input class="large" type="text" name="Bpos" value="<?if(isset($_POST['Bpos']))echo $_POST['Bpos'];else echo $Bpos;?> " /></div>
      <div class="element-input" ><label class="title">B-</label><input class="large" type="text" name="Bneg" value="<?if(isset($_POST['Bneg']))echo $_POST['Bneg'];else echo $Bneg;?> " /></div>
      <div class="element-input" ><label class="title">O+</label><input class="large" type="text" name="Opos" value="<?if(isset($_POST['Opos']))echo $_POST['Opos'];else echo $Opos;?> " /></div>
      <div class="element-input" ><label class="title">O-</label><input class="large" type="text" name="Oneg" value="<?if(isset($_POST['Oneg']))echo $_POST['Oneg'];else echo $Oneg;?> " /></div>
      <div class="element-input" ><label class="title">AB+</label><input class="large" type="text" name="ABpos" value="<?if(isset($_POST['ABpos']))echo $_POST['ABpos'];else echo $ABpos;?> " /></div>
      <div class="element-input" ><label class="title">AB-</label><input class="large" type="text" name="ABneg" value="<?if(isset($_POST['ABneg']))echo $_POST['ABneg'];else echo $ABneg;?> " /></div>
          
          <div class="submit"><input type="submit" name="submit" value="Update"/></div>
          
        </form>
<br><br>
   
        <?php
        if(isset($_POST['submit']))
        {
          include 'db_connection.php';
         
           $bloodbank_update="UPDATE bloodbank SET Apos=$_POST[Apos],Aneg=$_POST[Aneg],Bpos=$_POST[Bpos],Bneg=$_POST[Bneg],Opos=$_POST[Opos],Oneg=$_POST[Oneg],ABpos=$_POST[ABpos],ABneg=$_POST[ABneg] WHERE email='$email'";
    if(mysqli_query($con,$bloodbank_update)){
                echo 'Update successfully<br><br>';
    }
           
        }
        ?>

         <a href="HospitalPage.php" class="red button criss-cross">Back</a>
<a href="updateHospitalAcc.php" class="red button criss-cross">Reset</a> 
  </body>
</html>