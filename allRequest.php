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
            $sql_delete = "DELETE FROM bloodrequestpost
           WHERE DATEDIFF(removedate,'$TodayDate') = 0 
           OR DATEDIFF(removedate,'$TodayDate') < 0";
            mysqli_query($con,$sql_delete);
       ?>
        <?php
        $sql_count = "select count(headline) as headline from bloodrequestpost";
         if($query_run=  mysqli_query($con,$sql_count))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            $total_result = $query_row['headline'];
            if($total_result > 0){
        $sql_post = "select * from bloodrequestpost";
 if($query_run=  mysqli_query($con,$sql_post)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $headlines=$query_row['headline'];
          $descriptions=$query_row['description'];
          $date=$query_row['removedate'];
          ?>
        <div class="ex">
            <?
          echo '<hr><aside>';
          echo '<style>'
          . 'h3{color:blue};</style>';
        
          echo '<h3>'.$headlines.'</h3>';
          echo 'DATE :'.'<b>'.$date.'<b>';
          echo '<p>'.$descriptions.'</p>';
          ?>
  
<?
          echo '</aside>';
          ?>
        </div>
        <?
          
        }
 }
            }
            else 
                echo "<b> No Blood Request Found !!! </b>"
        ?>
    </body>
</html>

