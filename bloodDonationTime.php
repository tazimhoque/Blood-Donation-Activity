<html>
   <head>
        <link rel="stylesheet" type="text/css" href="button/compressed.button.css" />
          <script src="datepicker/jquery-1.9.1.js"></script>
  <script src="datepicker/jquery-ui.js"></script>
  
  <script>
  $(function() {
    $( "#fromdatepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
    $( "#todatepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
   
  });
  </script>
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
      <a href="logout.php" class="red button criss-cross" style="float: right;">Log Out</a><br><br>  
        <!-- Start Formoid form-->
<link rel="stylesheet" href="reg_donor_files/formoid1/formoid-default-red.css" type="text/css" />
<script type="text/javascript" src="reg_donor_files/formoid1/jquery.min.js"></script>
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="bloodDonationTime.php" method="POST"><div class="title"><h2>Donor Session</h2></div> 
      <div class="element-input" ><label class="title">Donor ID<span class="required">*</span></label><input class="large" type="text" name="id" value="<?if(isset($_POST['id']))echo $_POST['id']?> " required="required"/></div>
      <div class="element-input" ><label class="title">Donation Date<span class="required">*</span></label><input class="large" type="text" name="from" id="fromdatepicker" value="<?if(isset($_POST['from']))echo $_POST['from']?> " required="required"/></div> 
   <div class="element-input" ><label class="title">Available Date<span class="required">*</span></label><input class="large" type="text" name="to" id="todatepicker" value="<?if(isset($_POST['to']))echo $_POST['to']?>" required="required"/></div>
      <div class="submit"><input type="submit" name="submit" value="Submit"/></div>    
</form>
   <script type="text/javascript" src="reg_donor_files/formoid1/formoid-default-red.js"></script>
   <br><br>
   
        <?php
       if(isset($_POST['submit'])){
       ?>
<div class="ex" style="float:centre;">
    <?
            echo $_POST['id'].'<br>';
           $id = trim($_POST['id']); 
           $donationDate = $_POST['from'];
           $availableDate = $_POST['to'];
       /*     $date1=date_create("2013-03-13");
$date2=date_create("2012-12-15");
$diff=date_diff($date1,$date2);
$days_remaining = $diff->format("%R%a");
//echo $diff->format("%R%a days");
echo $days_remaining;
if(((int)($days_remaining))<0)
    echo '<br> negative';
else 
    echo '<br> positive';
$time=time();
$donationDate=date("Y-m-d",$time);
$date=date_create($donationDate); 
date_modify($date,"+122 days");
$availableDate=date_format($date,"Y-m-d");*/
echo "<br>blood donation date ".$donationDate;
echo "<br> available date ".$availableDate;
include 'db_connection.php';
$sql="INSERT INTO donorsession (id, donationDate, availableDate)
VALUES
('$id','$donationDate','$availableDate')";
mysqli_query($con,$sql);
?>
</div>
<?
}
        ?>
</br>
    <a href="HospitalPage.php" class="red button criss-cross">Back</a>

<a href="bloodDonationTime.php" class="red button criss-cross">Reset</a>
    </body>
</html>

