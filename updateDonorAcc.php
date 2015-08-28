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
        <link rel="stylesheet" type="text/css" href="button/compressed.button.css" />
    </head>
    <body class="blurBg-false" style="background-color:#FFFFFF">
        <?php
include 'db_connection.php';
$sql = "SELECT * from donorinfo where email='$email'";
   if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $id_update=$query_row['id'];
          $name_update=$query_row['name'];
          $password_update=$query_row['password'];
          $age_update=$query_row['age'];
          $blood_update=$query_row['blood'];
          $contact_update=$query_row['contact'];
          $contactall_update=$query_row['contactvictim'];
          //$mobile=explode("+88", $contact_update);
          $mobile=$contact_update;
          $email_update=$query_row['email'];
          $division_update=$query_row['division'];
          $district_update=$query_row['district'];
          $thana_update=$query_row['thana'];
      }
  }
  echo $id_update;
?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="reg_donor_files/formoid1/formoid-default-red.css" type="text/css" />
<script type="text/javascript" src="reg_donor_files/formoid1/jquery.min.js"></script>
        <form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="updateDonorAcc.php" method="POST"><div class="title"><h2>Update Account</h2></div> 
      
 	<div class="element-input" ><label class="title">Name<span class="required">*</span></label><input class="large" type="text" name="name" value="<?if(isset($_POST['name']))echo $_POST['name'];else echo $name_update;?> " required="required"/></div>
	<div class="element-password" ><label class="title">Password<span class="required">*</span></label><input class="large" type="password" name="password" value="<?if(isset($_POST['password']))echo $_POST['password']?>" required="required"/></div>
	<div class="element-input" ><label class="title">Age</label><input class="large" type="text" name="age" value="<?if(isset($_POST['age']))echo $_POST['age'];else echo $age_update;?> " /></div>
	<div class="element-select" ><label class="title">Blood Group<span class="required">*</span></label><div class="large"><span><select name="blood" required="required">
                 
                <option><?if(isset($_POST['blood']))echo $_POST['blood'];else echo $blood_update;?></option>
		<option value="A+">A+</option><br/>
		<option value="A-">A-</option><br/>
		<option value="B+">B+</option><br/>
		<option value="B-">B-</option><br/>
		<option value="O+">O+</option><br/>
		<option value="O-">O-</option><br/>
		<option value="AB+">AB+</option><br/>
		<option value="AB-">AB-</option><br/></select><i></i></span></div></div>
	<div class="element-input" ><label class="title">Contact No(+88xxxxxxxxxxx)<span class="required">*</span></label><input class="large" type="text" name="mobile" value="<?if(isset($_POST['mobile']))echo $_POST['mobile'];else echo $mobile;?>" required="required"/></div>
	<div class="element-input" ><label class="title">Contact : email/phone (seen by all)</label><input class="large" type="text" name="contactall" value="<?if(isset($_POST['contactall']))echo $_POST['contactall'];else echo $contactall_update;?> " /></div>
	<div class="element-email" ><label class="title">Email<span class="required">*</span></label><input class="large" type="email" name="email" value="<?if(isset($_POST['email']))echo $_POST['email'];else echo $email_update;?> " required="required"/></div>
	<div class="element-select" ><label class="title">Division</label><div class="large"><span><select name="div" onchange="this.form.submit()" >

                <option><?if(isset($_POST['div']))echo $_POST['div'];//else echo $division_update;?></option>
		<option value="BARISAL">BARISAL</option><br/>
		<option value="CHITTAGONG">CHITTAGONG</option><br/>
		<option value="DHAKA">DHAKA</option><br/>
		<option value="KHULNA">KHULNA</option><br/>
		<option value="RAJSHAHI">RAJSHAHI</option><br/>
		<option value="RANGPUR">RANGPUR</option><br/>
		<option value="SYLHET">SYLHET</option><br/></select><i></i></span></div></div>
	<div class="element-select" ><label class="title">Districrt</label><div class="large"><span><select name="dis" onchange="this.form.submit()" >
   <option><?if(isset($_POST['dis']))echo $_POST['dis'];//else echo $district_update;?></option>   
<?php
    if(isset($_POST['div'])){
    $div=$_POST['div'];
    include 'db_connection.php';
    $sql = "SELECT DISTINCT district from donorlocation where division='$div'";
    if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $district=$query_row['district'];
    ?>
    <option value="<?echo $district?>"><?echo $district?></option>
    <?
    }
    }
    }
    ?>
?>
   </select><i></i></span></div></div>
	<div class="element-select" ><label class="title">Thana</label><div class="large"><span><select name="thana" onchange="this.form.submit()" >
       <option><?if(isset($_POST['thana']))echo $_POST['thana'];//else echo $thana_update;?></option>   
<?php
    if(isset($_POST['dis'])){
    $dis=$_POST['dis'];
    include 'db_connection.php';
    $sql = "SELECT DISTINCT thana from donorlocation where district='$dis'";
    if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $thana=$query_row['thana'];
    ?>
    <option value="<?echo $thana?>"><?echo $thana?></option>
    <?
    }
    }
    
    }
    ?>
    
?>
<?php
if(isset($_POST['thana'])){
    $name=trim($_POST['name']);
    $password=trim($_POST['password']);
     $age=trim($_POST['age']);
     $blood=trim($_POST['blood']);
     if(strpos($_POST['mobile'],'+88') === FALSE)
     {
         $contact="+88".trim($_POST['mobile']);
      
     }
     else 
     {
         $contact=trim($_POST['mobile']);
     }
      $contactall=trim($_POST['contactall']);
      $email=trim($_POST['email']);
       $division=$_POST['div'];
       $divdistrict=$_POST['dis'];
       $disthana=$_POST['thana'];
}
?>
</select><i></i></span></div></div>  
       </form>
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="updateDonorAcc.php" method="POST">
       <div class="submit"><input type="submit" name="submit" value="Submit"/></div>
      <input type='hidden' name='name' value='<?php echo $name ?>'>
      <input type='hidden' name='password' value='<?php echo $password ?>'>
      <input type='hidden' name='age' value='<?php echo $age ?>'>
      <input type='hidden' name='blood' value='<?php echo $blood ?>'>
      <input type='hidden' name='contact' value='<?php echo $contact ?>'>
      <input type='hidden' name='contactall' value='<?php echo $contactall ?>'>
      <input type='hidden' name='email' value='<?php echo $email ?>'>
      <input type='hidden' name='division' value='<?php echo $division ?>'>
      <input type='hidden' name='divdistrict' value='<?php echo $divdistrict ?>'>
      <input type='hidden' name='disthana' value='<?php echo $disthana ?>'>
 </form>
 <script type="text/javascript" src="reg_donor_files/formoid1/formoid-default-red.js"></script>
 <br><br>
 <a href="donorPage.php" class="red button criss-cross">Back</a>
<a href="logout.php" class="red button criss-cross" style="float: right;">Log Out</a>

<!-- Stop Formoid form--> 
<br><br>
        <?php
       if(isset($_POST['submit'])){
    
          
         //   echo $_POST['name'].'<br>';
            //echo $_POST['password'].'<br>';
            $password1=$_POST['password'];
          /*  echo $_POST['age'].'<br>';
            echo $_POST['blood'].'<br>';
            echo $_POST['contact'].'<br>';
            echo $_POST['contactall'].'<br>';
            echo $_POST['email'].'<br>';
            echo $_POST['division'].'<br>';
            echo $_POST['divdistrict'].'<br>';
            echo $_POST['disthana'].'<br>';*/
          
          
          
            
            include 'db_connection.php';
            $sql_login = "SELECT password from donorinfo where email='$_POST[email]'";

            if($query_run=  mysqli_query($con,$sql_login))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            
            $password2 = $query_row['password'];
//echo 'database password is '.$password2;
// Check username and password match
if ( trim($password1)==trim($password2)){
          
          $sql="UPDATE donorinfo SET name='$_POST[name]',age=$_POST[age],blood='$_POST[blood]',contact='$_POST[contact]',contactvictim='$_POST[contactall]',email='$_POST[email]',division='$_POST[division]',district='$_POST[divdistrict]',thana='$_POST[disthana]' WHERE id='$id_update' and password='$_POST[password]'";
          if (mysqli_query($con,$sql))
  {
  echo '<br><b>Account Update successfully</b>';
  }
else
  {
  echo "Error creating database: " . mysqli_error($sql);
  }
                }
           else 
               echo '<br><b>password does not match.please try again</b>';
       }
       
        ?>
    </body>
</html>