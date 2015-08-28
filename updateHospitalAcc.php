<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['email'])) {
$email_prev = $_SESSION['email'];
}

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="button/compressed.button.css" />
    </head>
    <body class="blurBg-false" style="background-color:#FFFFFF">
        <?php
include 'db_connection.php';
$sql = "SELECT * from hospitalinfo where email='$email_prev'";
   if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          //$id_update=$query_row['id'];
          $name_update=$query_row['name'];
          $password_update=$query_row['password'];
          $email_update=$query_row['email'];
          //$age_update=$query_row['age'];
          //$blood_update=$query_row['blood'];
          $contact_update=$query_row['contact'];
          $mobile=$contact_update;
          $location_update=$query_row['location'];
          $division_update=$query_row['division'];
          $district_update=$query_row['district'];
          $thana_update=$query_row['thana'];
      }
  }
  
?>
        <a href="logout.php" class="red button criss-cross" style="float: right;">Log Out</a><br><br>
   <!-- Start Formoid form-->
<link rel="stylesheet" href="reg_donor_files/formoid1/formoid-default-red.css" type="text/css" />
<script type="text/javascript" src="reg_donor_files/formoid1/jquery.min.js"></script>
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="updateHospitalAcc.php" method="POST"><div class="title"><h2>Update Account</h2></div> 
         
      <div class="element-input" ><label class="title">Name<span class="required">*</span></label><input class="large" type="text" name="name" value="<?if(isset($_POST['name']))echo $_POST['name'];else echo $name_update;?> " required="required"/></div>
      <div class="element-password" ><label class="title">Password<span class="required">*</span></label><input class="large" type="password" name="password" value="<?if(isset($_POST['password']))echo $_POST['password']?>" required="required"/></div>
      <div class="element-email" ><label class="title">Email<span class="required">*</span></label><input class="large" type="email" name="email" value="<?if(isset($_POST['email']))echo $_POST['email'];else echo $email_update;?> " required="required"/></div>
      <div class="element-input" ><label class="title">Contact No(+88xxxxxxxxxxx)<span class="required">*</span></label><input class="large" type="text" name="mobile" value="<?if(isset($_POST['mobile']))echo $_POST['mobile'];else echo $mobile;?>" required="required"/></div>
      <div class="element-input" ><label class="title">Location<span class="required">*</span></label><input class="large" type="text" name="location" value="<?if(isset($_POST['location']))echo $_POST['location'];else echo $location_update;?> " required="required"/></div>
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
    $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
        if(strpos($_POST['mobile'],'+88') === FALSE)
     {
         $contact="+88".trim($_POST['mobile']);
      
     }
     else 
     {
         $contact=trim($_POST['mobile']);
     }
     $location=$_POST['location'];
       $division=$_POST['div'];
       $divdistrict=$_POST['dis'];
       $disthana=$_POST['thana'];
}
?>
</select><i></i></span></div></div>  
       </form>
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="updateHospitalAcc.php" method="POST">
       <div class="submit"><input type="submit" name="submit" value="Submit"/></div>
      <input type='hidden' name='name' value='<?php echo $name ?>'>
      <input type='hidden' name='password' value='<?php echo $password ?>'>
      <input type='hidden' name='email' value='<?php echo $email ?>'>
      <input type='hidden' name='contact' value='<?php echo $contact ?>'>
      <input type='hidden' name='location' value='<?php echo $location ?>'>
      <input type='hidden' name='division' value='<?php echo $division ?>'>
      <input type='hidden' name='divdistrict' value='<?php echo $divdistrict ?>'>
      <input type='hidden' name='disthana' value='<?php echo $disthana ?>'>
      <input type='hidden' name='email_prev' value='<?php echo $email_prev ?>'>
 </form>
<script type="text/javascript" src="reg_donor_files/formoid1/formoid-default-red.js"></script>


<!-- Stop Formoid form--> 
<br><br>
   <a href="HospitalPage.php" class="red button criss-cross">Back</a>

<a href="updateHospitalAcc.php" class="red button criss-cross">Reset</a> <br><br>
        <?php
       if(isset($_POST['submit'])){
    
          
          /*  echo $_POST['name'].'<br>';
            //echo $_POST['password'].'<br>';
            echo $_POST['email'].'<br>';
            echo $_POST['contact'].'<br>';
            echo $_POST['division'].'<br>';
            echo $_POST['divdistrict'].'<br>';
            echo $_POST['disthana'].'<br>';
            echo $_POST['email_prev'];*/
          
          
            
            include 'db_connection.php';
          
            $sql_login = "SELECT password from hospitalinfo where email='$_POST[email]'";

            if($query_run=  mysqli_query($con,$sql_login))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            
            $password2 = $query_row['password'];
            //echo 'total result found '.$total_result;

// Check username and password match
if ( trim($_POST['password'])==$password2) {
          
    $sql_bloodbank="UPDATE bloodbank SET name='$_POST[name]',email='$_POST[email]' WHERE email='$_POST[email_prev]'";
    mysqli_query($con,$sql_bloodbank);
          $sql="UPDATE hospitalinfo SET name='$_POST[name]',email='$_POST[email]',contact='$_POST[contact]',location='$_POST[location]',division='$_POST[division]',district='$_POST[divdistrict]',thana='$_POST[disthana]' WHERE email='$_POST[email_prev]'";
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
