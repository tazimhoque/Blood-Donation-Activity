<html>
    <head>
 <meta charset="utf-8" />
	<title>Blood Bank Search</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
         <style>
          table { border-collapse: collapse; font-family: Futura, Arial, sans-serif; border: 1px solid #777; }
caption { font-size: larger; margin: 1em auto; }
th, td { padding: .65em; }
th, thead { background: #FE0000; color: #fff; border: 1px solid #000; }
tr:nth-child(odd) { background: #ccc; }
tr:hover { background: #aaa; }
td { border-right: 1px solid #777; 
        </style>
    </head>
    <body class="blurBg-false" style="background-color:#FFFFFF">
        
        <!-- Start Formoid form-->
        <link rel="stylesheet" href="reg_donor_files/formoid1/formoid-default-red.css" type="text/css" />
<script type="text/javascript" src="reg_donor_files/formoid1/jquery.min.js"></script>
        <form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="bloodbanksearch.php" method="POST"><div class="title"><h2>Blood Bank Search</h2></div> 
      
     <div class="element-select" ><label class="title">Division</label><div class="large"><span><select name="div" onchange="this.form.submit()" >
           <option><?if(isset($_POST['div']))echo $_POST['div'];?></option>      
  <option value="BARISAL">BARISAL</option>
  <option value="CHITTAGONG">CHITTAGONG</option>
  <option value="DHAKA">DHAKA</option>
  <option value="KHULNA">KHULNA</option>
  <option value="RAJSHAHI">RAJSHAHI</option>
  <option value="RANGPUR">RANGPUR</option>
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
       $division=$_POST['div'];
       $divdistrict=$_POST['dis'];
       $disthana=$_POST['thana'];
}
?>
    </select><i></i></span></div></div>  
       </form>
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="bloodbanksearch.php" method="POST">
      <div class="submit"><input type="submit" name="submit" value="Submit"/></div>
      <input type='hidden' name='division' value='<?php echo $division ?>'>
      <input type='hidden' name='divdistrict' value='<?php echo $divdistrict ?>'>
      <input type='hidden' name='disthana' value='<?php echo $disthana ?>'>
 </form>
<script type="text/javascript" src="reg_donor_files/formoid1/formoid-default-red.js"></script>
<!-- Stop Formoid form-->

        <?php
       if(isset($_POST['submit'])){
           include 'db_connection.php'; 
           $sql_count = "select count(email) as email from hospitalinfo where division='$_POST[division]' and district='$_POST[divdistrict]' and thana='$_POST[disthana]' ";
           if($query_run=  mysqli_query($con,$sql_count))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            
            $total_result = $query_row['email'];
            if($total_result > 0){
   ?>
<br><br>
           <table border="1">
<tr>
<th>Hospital Name</th>
<th>A+</th>
<th>A-</th>
<th>B+</th>
<th>B-</th>
<th>O+</th>
<th>O-</th>
<th>AB+</th>
<th>AB-</th>
<th>Email</th>
<th>Contact</th>
</tr>
<?
        
            //  include 'db_connection.php';
              $sql = "SELECT bloodbank.*,hospitalinfo.contact from bloodbank join hospitalinfo on bloodbank.email=hospitalinfo.email where hospitalinfo.division='$_POST[division]' and hospitalinfo.district='$_POST[divdistrict]' and hospitalinfo.thana='$_POST[disthana]'";
   if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          //$id_update=$query_row['id'];
          $name=$query_row['name'];
          $Apos=$query_row['Apos'];
          $Aneg=$query_row['Aneg'];
          $Bpos=$query_row['Bpos'];
          $Bneg=$query_row['Bneg'];
          $Opos=$query_row['Opos'];
          $Oneg=$query_row['Oneg'];
          $ABpos=$query_row['ABpos'];
          $ABneg=$query_row['ABneg'];
          $email=$query_row['email'];
          $contact=$query_row['contact'];
          ?>
<tr>
<td><?echo $name;?></td>
<td><?echo $Apos;?></td>
<td><?echo $Aneg;?></td>
<td><?echo $Bpos;?></td>
<td><?echo $Bneg;?></td>
<td><?echo $Opos;?></td>
<td><?echo $Oneg;?></td>
<td><?echo $ABpos;?></td>
<td><?echo $ABneg;?></td>
<td><?echo $email;?></td>
<td><?echo $contact;?></td>
</tr>


<?
      }
  }
            }
   else
       echo "<b>Sorry,Hospital not found !!!<b>";
          
       }
        ?>
</table>
    </body>
</html>