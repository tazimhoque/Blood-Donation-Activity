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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="button/compressed.button.css" />
         <style>
div.ex
{
width:95%;
padding:10px;
border:5px solid gray;
margin:0px;
background-color :#e0ffff; 
}
</style>
    </head>
    <body>
         <a href="logout.php" class="red button criss-cross" style="float: right;">Log Out</a><br><br><br><br>
             <?php
       $time=time();
            $TodayDate=date("Y-m-d",$time);
            include 'db_connection.php';
            $sql_delete = "DELETE FROM appointment
           WHERE DATEDIFF(dateto,'$TodayDate') = 0 
           OR DATEDIFF(dateto,'$TodayDate') < 0";
            mysqli_query($con,$sql_delete);
            include 'db_connection.php';
            $sql_count = "select count(id) as total from appointment where hospitalemail='$email'";
            $query_run=  mysqli_query($con,$sql_count);
            $query_row=  mysqli_fetch_assoc($query_run);
            $total_req=$query_row['total'];
            if($total_req < 1)
            {
              ?>
         <div class="ex">
             <p>
                 <b>No appointment found !!!</b>
             </p>
         </div>
         <?
            }
            else
            {
        $sql_post = "select donorinfo.name,donorinfo.age,donorinfo.blood,donorinfo.contact,donorinfo.email,appointment.datefrom,appointment.dateto,appointment.comment from donorinfo join appointment on donorinfo.id=appointment.id where appointment.hospitalemail='$email'";
 if($query_run=  mysqli_query($con,$sql_post)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          ?>
         <div class="ex">
             <?
          $name=$query_row['name'];
          $age=$query_row['age'];
          $from=$query_row['datefrom'];
          $to = $query_row['dateto'];
          $blood = $query_row['blood'];
          $contact = $query_row['contact'];
          $comment = $query_row['comment'];
          $email=$query_row['email'];
          echo '<hr><aside>';
          echo '<style>'
          . 'b{color:blue};</style>';
        
          echo 'Donor Name : '.$name.'<br>';
          echo 'age : '.$age.'<br>';
          echo 'Session : <b>'.$from.' - '.$to.'</b> (yyyy-mm-dd)<br>';
          echo 'Blood Group : <b>'.$blood.'</b><br>';
          echo 'Contact No : '.$contact.'<br>';
          echo 'email : '.$email.'<br>';
          echo '<p>'.$comment.'</p>';
          ?>
  
<?
          echo '</aside>';
          ?>
         </div>
         <?
      } 
        }
 }
        ?>
         <br> <a href="HospitalPage.php" class="red button criss-cross">Back</a>
    </body>
</html>
