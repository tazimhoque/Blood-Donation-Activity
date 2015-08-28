<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['email'])) {
$email = $_SESSION['email'];
}

?>
<!DOCTYPE html>
<html>
    <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="datepicker/jquery-ui.css">
  <script src="datepicker/jquery-1.9.1.js"></script>
  <script src="datepicker/jquery-ui.js"></script>
  
  <script>
  $(function() {
    $( "#fromdatepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
    $( "#todatepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
   
  });
  </script>
</head>
<body class="blurBg-false" style="background-color:#FFFFFF">
<!-- Start Formoid form-->
<link rel="stylesheet" href="reg_donor_files/formoid1/formoid-default-red.css" type="text/css" />
<script type="text/javascript" src="reg_donor_files/formoid1/jquery.min.js"></script>
 <form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="post.php" method="POST"><div class="title"><h2>Blood Request Post</h2></div>
     <div class="element-input" ><label class="title">HeadLine<span class="required">*</span></label><input class="large" type="text" name="headline" value="<?if(isset($_POST['headline']))echo $_POST['headline']?> " required="required"/></div>
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
     <div class="element-input" ><label class="title">Date To<span class="required">*</span></label><input class="large" type="text" name="to" id="todatepicker" value="<?if(isset($_POST['to']))echo $_POST['to']?>" required="required"/></div>
     <div class="element-textarea" ><label class="title">Request Description</label><textarea class="medium" name="description" value="<?if(isset($_POST['description']))echo $_POST['description']?> " cols="20" rows="5" ></textarea></div>
     <input type='hidden' name='email' value='<?php echo $email ?>'>
     <div class="submit"><input type="submit" name="submit" value="Submit Request"/></div>     
       
            
        </form> 
<script type="text/javascript" src="reg_donor_files/formoid1/formoid-default-red.js"></script>

</body>
</html>
