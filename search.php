<?php
//http://www.vianett.com/en/free-demonstration-account
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['email'])) {
$email = $_SESSION['email'];
}

?>
<html>
   <head>
        <link rel="stylesheet" type="text/css" href="button/compressed.button.css" />
    </head>
    <body>
        <a href="logout.php" class="red button criss-cross" style="float: right;">Log Out</a><br><br>
       <form action="search.php" method="POST"> 
  
        blood group : 
        <select name="blood">
           <option><?if(isset($_POST['blood']))echo $_POST['blood']?></option>      
  <option value="A+">A+</option>
  <option value="A-">A-</option>
  <option value="B+">B+</option>
  <option value="B-">B-</option>
  <option value="O+">O+</option>
  <option value="O-">O-</option>
  <option value="AB+">AB+</option>
  <option value="AB-">AB-</option>
</select><br><br>
  
     Division :  <select name="div" onchange="this.form.submit()">
           <option><?if(isset($_POST['div']))echo $_POST['div'];?></option>      
  <option value="BARISAL">BARISAL</option>
  <option value="CHITTAGONG">CHITTAGONG</option>
  <option value="DHAKA">DHAKA</option>
  <option value="KHULNA">KHULNA</option>
  <option value="RAJSHAHI">RAJSHAHI</option>
  <option value="RANGPUR">RANGPUR</option>
  <option value="SYLHET">SYLHET</option>
</select>   
   
     
     District : <select name="dis" style="width: 110px" onchange="this.form.submit()">
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
    </select>   
        
      Thana : <select name="thana" style="width: 110px" onchange="this.form.submit()">
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
    $name=$_POST['name'];
     $age=$_POST['age'];
     $blood=$_POST['blood'];
      $contact=$_POST['ext'].$_POST['mobile'];
       $division=$_POST['div'];
       $divdistrict=$_POST['dis'];
       $disthana=$_POST['thana'];
}
?>
    </select>   
       </form>
        <form action="search.php" method="POST">
            Write Message: <br>
            <textarea rows="4" cols="50" name="message" value="<?if(isset($_POST['message']))echo $_POST['message']?> ">
            </textarea><br><br>
      <input type="submit" name="submit" value="submit">
      
      <input type='hidden' name='blood' value='<?php echo $blood ?>'>
      <input type='hidden' name='division' value='<?php echo $division ?>'>
      <input type='hidden' name='divdistrict' value='<?php echo $divdistrict ?>'>
      <input type='hidden' name='disthana' value='<?php echo $disthana ?>'>
 </form>
     <br><br>
   <a href="HospitalPage.php" class="red button criss-cross">Back</a>

<a href="bloodDonationTime.php" class="red button criss-cross">Reset</a> 
        <?php
       if(isset($_POST['submit'])){
       //     $name=$_POST['name'];
         //   $age=$_POST['age'];
       //     $blood=$_POST['blood'];
       //     $contact=$_POST['ext']+$_POST['mobile'];
         //   $division=$_POST[$div];
         //   $divdistrict=$_POST[$dis];
       //     $disthana=$_POST[$thana];
 /*   $phone = $_POST['phone'];
    $description = $_POST['description'];
    //$image_url = "upload\\".$image;
     include 'db_connection.php';
  $sql="INSERT INTO missing (id, name, age, phone, image , description)
VALUES
('$id','$name',$age,'$phone','$image','$description')";
mysqli_query($con,$sql);*/
         $Message = $_POST['message'];
         echo 'your message : '.$Message.'<br>';
         echo 'your searching keywords are <br>';   
            echo $_POST['blood'].'<br>';
            echo $_POST['division'].'<br>';
            echo $_POST['divdistrict'].'<br>';
            echo $_POST['disthana'].'<br>';
           
            include 'db_connection.php';
$sql = "SELECT email,msgpass,msgcontact from hospitalinfo where email='$email'";
   if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          //$id_update=$query_row['id'];
          
          $password=$query_row['msgpass'];
          $username=$query_row['email'];
          //$age_update=$query_row['age'];
          //$blood_update=$query_row['blood'];
          $msgsender=$query_row['msgcontact'];
      }
  }
  echo $username.' '.$password.' '.$msgsender;
           //$donor_id = substr(number_format(time() * rand(),0,'',''),0,10);
         /*   include 'db_connection.php';
            $sql="INSERT INTO donorinfo (id, name, age, blood, contact , division, district, thana)
VALUES
('$donor_id','$_POST[name]',$_POST[age],'$_POST[blood]','$_POST[contact]','$_POST[division]','$_POST[divdistrict]','$_POST[disthana]')";
mysqli_query($con,$sql);*/
            include 'db_connection.php';
            $time=time();
            $TodayDate=date("Y-m-d",$time);
            $sql_delete = "DELETE FROM donorsession
           WHERE DATEDIFF(availableDate,'$TodayDate') = 0 
           OR DATEDIFF(availableDate,'$TodayDate') < 0";
            mysqli_query($con,$sql_delete);
            $sql_count = "SELECT count(donorinfo.id) as id FROM donorinfo
LEFT JOIN donorsession ON donorinfo.id = donorsession.id
WHERE donorsession.id IS NULL and donorinfo.blood='$_POST[blood]' and
                donorinfo.division='$_POST[division]' and donorinfo.district='$_POST[divdistrict]' and donorinfo.thana='$_POST[disthana]'";
            if($query_run=  mysqli_query($con,$sql_count))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            
            $total_result = $query_row['id'];
            echo 'total result found '.$total_result;
            $sql = "SELECT donorinfo.id, donorinfo.name,donorinfo.age, donorinfo.contact
FROM donorinfo
LEFT JOIN donorsession ON donorinfo.id = donorsession.id
WHERE donorsession.id IS NULL and donorinfo.blood='$_POST[blood]' and
                donorinfo.division='$_POST[division]' and donorinfo.district='$_POST[divdistrict]' and donorinfo.thana='$_POST[disthana]'";
         /*   $sql = "select id,name,age,contact from donorinfo where blood='$_POST[blood]' and
                division='$_POST[division]' and district='$_POST[divdistrict]' and thana='$_POST[disthana]'";*/
            if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $id_search=$query_row['id'];
          $name_search=$query_row['name'];
          $age_search=$query_row['age'];
          $phone_search=$query_row['contact'];
          
         
          echo '<br>';
       /*   echo 'id = '.$id_search;echo '   ';
          echo 'name = '.$name_search;echo '   ';
          echo 'age = '.$age_search;echo '   ';
          echo 'phone = '.$phone_search;echo '<br>';*/
          
          //echo '<br><br>';
          // message sending 
        include_once("ViaNettSMS.php");
        //$Mobile = "+91".$Mobile;
        // Declare variables.
        $Username = trim($username);
        $Password = trim($password);
        $MsgSender = trim($msgsender);
        //$DestinationAddress = "+8801911355206";
        $DestinationAddress = $phone_search;
        //echo $Username.' '.$Password.' '.$MsgSender.'  '.$Message.' '.$DestinationAddress;
        //$Message = "dear ".$name_search." please onate blood.contact with 0191564";
 
        // Create ViaNettSMS object with params $Username and $Password
      $ViaNettSMS = new ViaNettSMS($Username, $Password);
        try
        {
            // Send SMS through the HTTP API
            $Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
            // Check result object returned and give response to end user according to success or not.
            if ($Result->Success == true)
                $Message = "Message successfully sent!";
            else
                $Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
        }
        catch (Exception $e)
        {
            //Error occured while connecting to server.
            $Message = $e->getMessage();
        }
        // message sending end*/
      }
  }
       }
        ?>
    </body>
</html>
