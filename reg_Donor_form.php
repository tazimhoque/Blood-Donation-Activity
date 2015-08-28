<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="button/compressed.button.css" />
       <style>
div.ex
{
width:325px;
padding:10px;
border:5px solid gray;
margin:0px;
background-color :#e0ffff; 
}
</style>
</head>
<body class="blurBg-false" style="background-color:#FFFFFF">



<!-- Start Formoid form-->
<link rel="stylesheet" href="reg_donor_files/formoid1/formoid-default-red.css" type="text/css" />
<script type="text/javascript" src="reg_donor_files/formoid1/jquery.min.js"></script>
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="reg_Donor_form.php" method="POST"><div class="title"><h2>Registration</h2></div>
	<div class="element-input" ><label class="title">Name<span class="required">*</span></label><input class="large" type="text" name="name" value="<?if(isset($_POST['name']))echo $_POST['name']?> " required="required"/></div>
	<div class="element-password" ><label class="title">Password<span class="required">*</span></label><input class="large" type="password" name="password" value="<?if(isset($_POST['password']))echo trim($_POST['password'])?> " required="required"/></div>
	<div class="element-input" ><label class="title">Age</label><input class="large" type="text" name="age" value="<?if(isset($_POST['age']))echo $_POST['age']?> " /></div>
	<div class="element-select" ><label class="title">Blood Group<span class="required">*</span></label><div class="large"><span><select name="blood" required="required">
                 
                <option><?if(isset($_POST['blood']))echo $_POST['blood']?></option>
		<option value="A+">A+</option><br/>
		<option value="A-">A-</option><br/>
		<option value="B+">B+</option><br/>
		<option value="B-">B-</option><br/>
		<option value="O+">O+</option><br/>
		<option value="O-">O-</option><br/>
		<option value="AB+">AB+</option><br/>
		<option value="AB-">AB-</option><br/></select><i></i></span></div></div>
	<div class="element-input" ><label class="title">Contact No(+88xxxxxxxxxxx)<span class="required">*</span></label><input class="large" type="text" name="mobile" value="<?if(isset($_POST['mobile']))echo $_POST['mobile']?>" required="required"/></div>
	<div class="element-input" ><label class="title">Contact : email/phone (seen by all)</label><input class="large" type="text" name="contactall" value="<?if(isset($_POST['contactall']))echo $_POST['contactall']?> " /></div>
	<div class="element-email" ><label class="title">Email<span class="required">*</span></label><input class="large" type="email" name="email" value="<?if(isset($_POST['email']))echo $_POST['email']?> " required="required"/></div>
	<div class="element-select" ><label class="title">Division</label><div class="large"><span><select name="div" onchange="this.form.submit()" >

                <option><?if(isset($_POST['div']))echo $_POST['div'];?></option>
		<option value="BARISAL">BARISAL</option><br/>
		<option value="CHITTAGONG">CHITTAGONG</option><br/>
		<option value="DHAKA">DHAKA</option><br/>
		<option value="KHULNA">KHULNA</option><br/>
		<option value="RAJSHAHI">RAJSHAHI</option><br/>
		<option value="RANGPUR">RANGPUR</option><br/>
		<option value="SYLHET">SYLHET</option><br/></select><i></i></span></div></div>
	<div class="element-select" ><label class="title">Districrt</label><div class="large"><span><select name="dis" onchange="this.form.submit()" >
   <option><?if(isset($_POST['dis']))echo $_POST['dis'];?></option>   
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
       <option><?if(isset($_POST['thana']))echo $_POST['thana'];?></option>   
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
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="reg_Donor_form.php" method="POST">
<div class="submit"><input type="submit" name="submit" value="Submit"/></div>
       <input type='hidden' name='name' value='<?php echo $name ?>' >
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


<!-- Stop Formoid form-->

   <?php
       if(isset($_POST['submit'])){
     ?>
<div>
<div class="ex" style="float:left;">
    <?
            include 'db_connection.php';
            $sql_count="select count(id) as id from donorinfo where email='$_POST[email]'";
             if($query_run=  mysqli_query($con,$sql_count))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            
            $total_result = $query_row['id'];
            if($total_result >0)
            {
                echo "email already exist";
            }
            else{
            $donor_id = substr(number_format(time() * rand(),0,'',''),0,10);
            echo "your ID = <b>".$donor_id."</b><br>";
            echo "Name : ".$_POST['name'].'<br>';
           //// echo $_POST['password'].'<br>';
            echo "Age : ".$_POST['age'].'<br>';
            echo "Blood Group : ".$_POST['blood'].'<br>';
            echo "contact : ".$_POST['contact'].'<br>';
          //  echo $_POST['contactall'].'<br>';
            echo "E-mail : <b>".$_POST['email'].'</b><br>';
          /*  echo $_POST['division'].'<br>';
            echo $_POST['divdistrict'].'<br>';
            echo $_POST['disthana'].'<br>'; */
           
           
            
           
           /* $sql="INSERT INTO donorinfo (id, name, password, age, blood, contact , email, division, district, thana)
VALUES
('$donor_id','$_POST[name]','$_POST[password]',$_POST[age],'$_POST[blood]','$_POST[contact]','$_POST[email]',$_POST[division]','$_POST[divdistrict]','$_POST[disthana]')";*/
             $sql="INSERT INTO donorinfo (id, name, password, age, blood, contact , contactvictim, email, division, district, thana)
VALUES
('$donor_id','$_POST[name]','$_POST[password]',$_POST[age],'$_POST[blood]','$_POST[contact]','$_POST[contactall]','$_POST[email]','$_POST[division]','$_POST[divdistrict]','$_POST[disthana]')";
mysqli_query($con,$sql);
?>
    <p>Now you are a registered donor. <br> You can Sign in your account to update all information.</p>
    
    <?
            }
            ?>
    </div>
    <div style="float:right;">
   <a href="logindonor.php" class="red button criss-cross">sign in</a> 
    </div>
    <?
          }
        ?>
    

</div>
</body>
</html>
