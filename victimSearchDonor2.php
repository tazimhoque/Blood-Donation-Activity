<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Search donor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table { border-collapse: collapse; font-family: Futura, Arial, sans-serif; border: 1px solid #777; }
            caption { font-size: larger; margin: 1em auto; }
            th, td { padding: .65em; }
            th, thead { background: #000; color: #fff; border: 1px solid #000; }
            tr:nth-child(odd) { background: #ccc; }
            tr:hover { background: #aaa; }
            td { border-right: 1px solid #777; 
        </style>
</head>
<body class="blurBg-false" style="background-color:#FFFFFF">



<!-- Start Formoid form-->
<link rel="stylesheet" href="victimsearchdonor_files/formoid1/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="victimsearchdonor_files/formoid1/jquery.min.js"></script>
<form class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#aa0000;max-width:480px;min-width:150px" action="victimSearchDonor2.php" method="POST"><div class="title"><h2>Search donor</h2></div>
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
	<div class="element-select" ><label class="title">Division<span class="required">*</span></label><div class="large"><span><select name="div" onchange="this.form.submit()">
                <option><?if(isset($_POST['div']))echo $_POST['div'];?></option>
		<option value="BARISAL">BARISAL</option><br/>
		<option value="CHITTAGONG">CHITTAGONG</option><br/>
		<option value="DHAKA">DHAKA</option><br/>
		<option value="KHULNA">KHULNA</option><br/>
		<option value="RAJSHAHI">RAJSHAHI</option><br/>
		<option value="RANGPUR">RANGPUR</option><br/>
		<option value="SYLHET">SYLHET</option><br/></select><i></i></span></div></div>
	<div class="element-select" ><label class="title">District<span class="required">*</span></label><div class="large"><span><select name="dis" onchange="this.form.submit()">
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
<?php
if(isset($_POST['dis'])){
    
     $blood=$_POST['blood'];
      
       $division=$_POST['div'];
       $divdistrict=$_POST['dis'];
      
}
?>
</select><i></i></span></div></div>
</form>
<form class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#aa0000;max-width:480px;min-width:150px" action="victimSearchDonor2.php" method="POST">
<div class="submit"><input type="submit" name ="submit" value="Submit"/></div>
      <input type='hidden' name='blood' value='<?php echo $blood ?>'>
      <input type='hidden' name='division' value='<?php echo $division ?>'>
      <input type='hidden' name='divdistrict' value='<?php echo $divdistrict ?>'>
</form>


<!-- Stop Formoid form-->
   <?php
       if(isset($_POST['submit'])){
       
            // donor session checking 
              include 'db_connection.php';
            $time=time();
            $TodayDate=date("Y-m-d",$time);
            $sql_delete = "DELETE FROM donorsession
           WHERE DATEDIFF(availableDate,'$TodayDate') = 0 
           OR DATEDIFF(availableDate,'$TodayDate') < 0";
            mysqli_query($con,$sql_delete);
            // delete donor after checking session
            
            // count result
             $sql_count = "SELECT count(donorinfo.id) as id FROM donorinfo
LEFT JOIN donorsession ON donorinfo.id = donorsession.id
WHERE donorsession.id IS NULL and donorinfo.blood='$_POST[blood]' and
                donorinfo.division='$_POST[division]' and donorinfo.district='$_POST[divdistrict]'";
            if($query_run=  mysqli_query($con,$sql_count))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            
            $total_result = $query_row['id'];
          
            
           // end counting
            
            // print result in table
            if($total_result>0){
                
             ?>
<br><br>
<center>
<table border="1">
<tr>
<th>Name</th>
<th>Age</th>
<th>Blood</th>
<th>Contact</th>
<th>Email</th>
</tr>
<?
$sql = "SELECT donorinfo.name,donorinfo.age, donorinfo.blood,donorinfo.contactvictim,donorinfo.email
FROM donorinfo
LEFT JOIN donorsession ON donorinfo.id = donorsession.id
WHERE donorsession.id IS NULL and donorinfo.blood='$_POST[blood]' and
                donorinfo.division='$_POST[division]' and donorinfo.district='$_POST[divdistrict]'";
          if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){    
          $name=$query_row['name'];
          $Age=$query_row['age'];
          $Blood=$query_row['blood'];
          $Contact=$query_row['contactvictim'];
          $Email=$query_row['email']; 
 ?>
<tr>
<td><?echo $name;?></td>
<td><?echo $Age;?></td>
<td><?echo $Blood;?></td>
<td><?echo $Contact;?></td>
<td><?echo $Email;?></td>
</tr>
</center>
<?
      }
          }
            }
  else 
      echo "<b>Donor not found !! </b>";
       }
            ?>


</body>
</html>

