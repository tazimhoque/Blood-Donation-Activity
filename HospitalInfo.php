<html>
    <head>
 <meta charset="utf-8" />
	<title>Blood Bank Search</title>
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
        <link rel="stylesheet" href="reg_donor_files/formoid1/formoid-default-red.css" type="text/css" />
<script type="text/javascript" src="reg_donor_files/formoid1/jquery.min.js"></script>
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="HospitalInfo.php" method="POST"><div class="title"><h2>Hospital Search</h2></div> 
      
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
<?php
if(isset($_POST['dis'])){
       $division=$_POST['div'];
       $divdistrict=$_POST['dis'];
       //$disthana=$_POST['thana'];
}
?>
    </select><i></i></span></div></div>
          
       </form>
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="HospitalInfo.php" method="POST">
      <div class="submit"><input type="submit" name="submit" value="Submit"/></div>
      <input type='hidden' name='division' value='<?php echo $division ?>'>
      <input type='hidden' name='divdistrict' value='<?php echo $divdistrict ?>'>
      
 </form>
<script type="text/javascript" src="reg_donor_files/formoid1/formoid-default-red.js"></script>
<!-- Stop Formoid form-->

        <?php
       if(isset($_POST['submit'])){
            include 'db_connection.php';
           $sql_count = "select count(email) as email from hospitalinfo where division='$_POST[division]' and district='$_POST[divdistrict]'";
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
<th>Contact</th>
<th>Email</th>
<th>Location</th>
<th>Division</th>
<th>District</th>
<th>Thana</th>
</tr>
<?
        
             
              $sql = "SELECT * from hospitalinfo where division='$_POST[division]' and district='$_POST[divdistrict]'";
   if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          //$id_update=$query_row['id'];
          $name=trim($query_row['name']);
          $Contact=trim($query_row['contact']);
          $Email=trim($query_row['email']);
          $Location=trim($query_row['location']);
          $Division=trim($query_row['division']);
          $District=trim($query_row['district']);
          $Thana=trim($query_row['thana']);
          ?>
<tr>
<td><?echo $name;?></td>
<td><?echo $Contact;?></td>
<td><?echo $Email;?></td>
<td><?echo $Location;?></td>
<td><?echo $Division;?></td>
<td><?echo $District;?></td>
<td><?echo $Thana;?></td>
</tr>


<?
      }
  }
            }
            else
                echo "<b>Sorry, Hospital Not Found !!!</b>";
          
       }
        ?>
</table>
    </body>
</html>
