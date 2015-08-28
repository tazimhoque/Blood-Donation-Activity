<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['email'])) {
$donoremail = $_SESSION['email'];
}
else
{
    header('Location: logindonor.php');
}
?>
<!doctype html>
<!--http://jqueryui.com/datepicker/-->
<html lang="en">
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
        <form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="createApp.php" method="POST"><div class="title"><h2>Search Hospital</h2></div> 
  
    <div class="element-select" ><label class="title">Division</label><div class="large"><span><select name="div" onchange="this.form.submit()" >
           <option><?if(isset($_POST['div']))echo $_POST['div'];?></option>      
  <option value="BARISAL">BARISAL</option>
  <option value="CHITTAGONG">CHITTAGONG</option>
  <option value="DHAKA">DHAKA</option>
  <option value="KHULNA">KHULNA</option>
  <option value="RAJSHAHI">RAJSHAHI</option>
  <option value="RANGPUR">RANGPUR</option>
  <option value="SYLHET">SYLHET</option>
</select><i></i></span></div></div>   
   
     
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
    
       $division=$_POST['div'];
       $divdistrict=$_POST['dis'];
       $disthana=$_POST['thana'];
}
?>
    </select><i></i></span></div></div> 
       </form>
        <form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="createApp.php" method="POST">
            <div class="submit"><input type="submit" name="search" value="Search"/></div>
            <input type='hidden' name='division' value='<?php echo $division ?>'>
            <input type='hidden' name='divdistrict' value='<?php echo $divdistrict ?>'>
            <input type='hidden' name='disthana' value='<?php echo $disthana ?>'>
 </form>
   
        <hr>
       <form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="createApp.php" method="POST"> 
           <div class="element-select" ><label class="title">Hospital Name</label><div class="large"><span><select name="hospitalName">
           <option><?if(isset($_POST['hospitalName']))echo $_POST['hospitalName'];?></option>      
      <?php
      if(isset($_POST['search'])){
           echo 'your searching keywords are <br>';   
            echo $_POST['division'].'<br>';
            echo $_POST['divdistrict'].'<br>';
            echo $_POST['disthana'].'<br>';
    $div=$_POST['div'];
    include 'db_connection.php';
    $sql = "SELECT name from hospitalinfo where division='$_POST[division]' and district='$_POST[divdistrict]' and thana='$_POST[disthana]'";
    if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $hospitalName=$query_row['name'];
    ?>
    <option value="<?echo $hospitalName?>"><?echo $hospitalName?></option>
    <?
    }
    }
    }
    ?>
?>
    </select><i></i></span></div></div>
   <div class="element-input" ><label class="title">Date From<span class="required">*</span></label><input class="large" type="text" name="from" id="fromdatepicker" value="<?if(isset($_POST['from']))echo $_POST['from']?> " required="required"/></div> 
   <div class="element-input" ><label class="title">Date To<span class="required">*</span></label><input class="large" type="text" name="to" id="todatepicker" value="<?if(isset($_POST['to']))echo $_POST['to']?>" required="required"/></div>
    <div class="element-textarea" ><label class="title">Write Something</label><textarea class="medium" name="comment" value="<?if(isset($_POST['comment']))echo $_POST['comment']?> " cols="20" rows="5" ></textarea></div>
    <div class="submit"><input type="submit" name="appoint" value="Create Appointment"/></div>
    
  </form>
<script type="text/javascript" src="reg_donor_files/formoid1/formoid-default-red.js"></script>
 
<br><br>
<!-- Stop Formoid form-->
         <?php
         if(isset($_POST['appoint'])){
            
     include 'db_connection.php';
     //get hospital email 
     $sql_hospital="select email from hospitalinfo where name = '$_POST[hospitalName]'";
      if($query_run=  mysqli_query($con,$sql_hospital)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $hospitalEmail=$query_row['email'];
      }
      }
   //  echo $hospitalEmail.'<br>'.$donoremail;
      //get donor id
     
     $sql_id = "select id from donorinfo where email='$donoremail'";
     $query_run=  mysqli_query($con,$sql_id);
     $query_row=  mysqli_fetch_assoc($query_run);
     $id=$query_row['id'];
     
     // get how many times donor create appointment with same hospitals
     $sql_validation = "select count(hospitalemail) as total from appointment where id = '$id' and hospitalemail = '$hospitalEmail'";
     $query_run=  mysqli_query($con,$sql_validation);
     $query_row=  mysqli_fetch_assoc($query_run);
     $total_result = $query_row['total'];
     
     if($total_result>0)
         {
         echo '<b> have already appointed !!!!</b>';
     }
     else
     {
   $sql_donor="select name,contact,blood from donorinfo where email='$donoremail'";
      if($query_run=  mysqli_query($con,$sql_donor)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $donorName=$query_row['name'];
          $donorContact=$query_row['contact'];
          $donorBlood=$query_row['blood'];
      }
      }
    /*  echo $donorBlood.'<br>';
      echo $donorName.'<br>';
      echo $donorContact.'<br>';
      echo $_POST['from'].'<br>';
      echo $_POST['to'].'<br>';
      echo $_POST['comment'].'<br>';*/
       $sql_insert="INSERT INTO appointment (hospitalemail, id, datefrom, dateto, comment)
VALUES
('$hospitalEmail','$id','$_POST[from]','$_POST[to]','$_POST[comment]')";
mysqli_query($con,$sql_insert);
echo "<p><b>Appointment is created successfully from ".$_POST['from']." to ".$_POST['to'].".</b></p>";
         }
         }
     ?>
<br><br>
 <a href="donorPage.php" class="red button criss-cross">Back</a>
<a href="logout.php" class="red button criss-cross" style="float: right;">Log Out</a>
<a href="donor_all_app.php" class="red button criss-cross">manage</a>
    </body>
</html>
