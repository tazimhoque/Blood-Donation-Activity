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
    </head>
    <body>
        
       <?php
       $time=time();
            $TodayDate=date("Y-m-d",$time);
            include 'db_connection.php';
            $sql_delete = "DELETE FROM bloodrequestpost
           WHERE DATEDIFF(removedate,'$TodayDate') = 0 
           OR DATEDIFF(removedate,'$TodayDate') < 0";
            mysqli_query($con,$sql_delete);
            
             $sql_blood = "select blood from donorinfo where email='$email'";
         if($query_run=  mysqli_query($con,$sql_blood))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            $bloodGroup = $query_row['blood'];
       ?>
        <?php
        $sql_count = "select count(headline) as headline from bloodrequestpost where bloodgroup='$bloodGroup'";
         if($query_run=  mysqli_query($con,$sql_count))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            $total_result = $query_row['headline'];
            if($total_result > 0){
        $sql_post = "select * from bloodrequestpost where bloodgroup = '$bloodGroup'";
 if($query_run=  mysqli_query($con,$sql_post)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $headlines=$query_row['headline'];
          $descriptions=$query_row['description'];
          $date=$query_row['removedate'];
          echo '<hr><aside>';
          echo '<style>'
          . 'h3{color:blue};</style>';
        
          echo '<h3>'.$headlines.'</h3>';
          echo 'DATE :'.'<b>'.$date.'<b>';
          echo '<p>'.$descriptions.'</p>';
          ?>
  
<?
          echo '</aside>';
          
        }
 }
            }
            else 
                echo "<b> No Blood Request Found !!! </b>"
        ?>
         <br><br>
 <a href="donorPage.php" class="red button criss-cross">Back</a>
<a href="logout.php" class="red button criss-cross" style="float: right;">Log Out</a>
    </body>
</html>


