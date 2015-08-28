<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['email'])) {
$email = $_SESSION['email'];
}

?>
<!doctype html>
<!--http://jqueryui.com/datepicker/-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="datepicker/jquery-ui.css">
   <link rel="stylesheet" href="button/compressed.button.css" />
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
   <?php
   $check = 0;
   include 'db_connection.php';
   $sql_id = "SELECT id from donorinfo where email='$email'";
   $query_run=  mysqli_query($con,$sql_id);
   $query_row=  mysqli_fetch_assoc($query_run);
   $id=$query_row['id'];
   echo $id;
   $sql_check = "select count(hospitalemail) as total from appointment where id='$id'";
   $query_run=  mysqli_query($con,$sql_check);
   $query_row=  mysqli_fetch_assoc($query_run);
   $total_req=$query_row['total'];
   if($total_req<1){
       echo "<br><b>no appointment found !!!</b>";
       $check = 0;
   }
   else{
   ?>
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="donor_all_app.php" method="POST"><div class="title"><h2>All Appointed Hospitals</h2></div>
    <input type='hidden' name='id' value='<?php echo $id ?>'>
            <div class="element-select" ><label class="title">Hospital Name</label><div class="large"><span><select name="hospitalName" onchange="this.form.submit()">
           <option><?if(isset($_POST['hospitalName']))echo $_POST['hospitalName'];?></option> 
           <?php
           include 'db_connection.php';
           $sql_hos_mail = "select DISTINCT hospitalinfo.name as name from hospitalinfo join appointment on hospitalinfo.email=appointment.hospitalemail where appointment.id='$id'";
           if($query_run=  mysqli_query($con,$sql_hos_mail)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $hos_name=$query_row['name'];
          ?>
           <option value="<?echo $hos_name?>"><?echo $hos_name?></option>
           <?
      }
           }
           ?>
           </select><i></i></span></div></div>
 </form>
   <?}?>
<script type="text/javascript" src="reg_donor_files/formoid1/formoid-default-red.js"></script>
 <br><br>
<!-- Stop Formoid form-->
<?php
if(isset($_POST['hospitalName'])){
    
       $select_id = $_POST['id'];
       $select_hos_name = $_POST['hospitalName'];
       $sql_email = "select email from hospitalinfo where name = '$select_hos_name'";
       $query_run=  mysqli_query($con,$sql_email);
       $query_row=  mysqli_fetch_assoc($query_run);
       $select_hos_email=$query_row['email'];
       $sql_allInfo = "select * from appointment where hospitalemail = '$select_hos_email' and id = '$select_id'";
        if($query_run=  mysqli_query($con,$sql_allInfo)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          echo $query_row['hospitalemail'].'<br>';
          echo 'from :'.$query_row['datefrom'].'<br>';
          echo 'to :'.$query_row['dateto'].'<br>';
          echo 'comment :'.$query_row['comment'].'<br>';
          
      }
        }
        $check = 1;
}
 ?>    

<?
if($check === 1 ){
?>
<form class="formoid-default-red" style="background-color:#ffffff;font-size:14px;font-family:Georgia,serif;color:#aa557f;max-width:380px;min-width:150px" action="donor_all_app.php" method="POST">
<div class="submit"><input type="submit" name="delete" value="Delete"/></div>
       <input type='hidden' name='hosEmail' value='<?php echo $select_hos_email ?>' >
      <input type='hidden' name='donorId' value='<?php echo $select_id ?>'>
</form>
<?
}
?>
<?
if(isset($_POST['delete'])){
    $hos_email = $_POST['hosEmail'];
    //echo 'asdsadasdsa';
    
  //  echo $_POST['donorId'];
   $select_id = $_POST['donorId'];
    $sql_delete = "delete from appointment where hospitalemail = '$hos_email' and id ='$select_id'";
    mysqli_query($con,$sql_delete);
}

?>

    </body>
</html>

