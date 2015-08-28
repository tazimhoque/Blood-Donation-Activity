<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
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
        
       <?php
       $time=time();
            $TodayDate=date("Y-m-d",$time);
            include 'db_connection.php';
          /*  $sql_delete = "DELETE FROM bloodrequestpost
           WHERE DATEDIFF(removedate,'$TodayDate') = 0 
           OR DATEDIFF(removedate,'$TodayDate') < 0";*/
            $sql_delete = "DELETE FROM bloodrequestpost
           WHERE DATEDIFF(removedate,'$TodayDate') < 0";
            mysqli_query($con,$sql_delete);
       ?>
        <?php
        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $headline = $_POST['headline'];
            $bloodgroup = $_POST['blood'];
            $description = $_POST['description'];
           // $time=time();
            //$removedate=date_format(date_modify(date_create(date("Y-m-d",$time)),"+3 days"),"Y-m-d");
            $removedate=$_POST['to'];
            include 'db_connection.php';
$sql="INSERT INTO bloodrequestpost (email,headline, bloodgroup, description, removedate)
VALUES
('$email','$headline','$bloodgroup','$description','$removedate')";
mysqli_query($con,$sql);
        }
        $sql_post = "select * from bloodrequestpost";
 if($query_run=  mysqli_query($con,$sql_post)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          
          $headlines=$query_row['headline'];
          $bloodgroups=$query_row['bloodgroup'];
          $descriptions=$query_row['description'];
          $date=$query_row['removedate'];
          
          ?>
        <div class="ex">
        <hr><aside>
          <style>
          h3{color:blue};
          
          </style>
        <?
          echo '<h3>'.$headlines.'</h3>';
          echo '<b>Blood Group :'.$bloodgroups.'</b><br>';
          echo 'DATE :'.'<b>'.$date.'<b>';
          echo '<p>'.$descriptions.'</p>';
          ?>
  

          </aside>
        </div>
        <?  
        }
 }
        ?>
    </body>
</html>
