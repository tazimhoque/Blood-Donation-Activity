<!DOCTYPE html>
<html>
 
    <body>
       <form action="donor_reg.php" method="POST"> 
      
           name :<input type="text" required name="name" value="<?if(isset($_POST['name']))echo $_POST['name']?> "><br><br>
          Password :<input type="password" name="password" value="<?if(isset($_POST['password']))echo trim($_POST['password'])?> "><br><br>
        age : <input type="text" name="age" value="<?if(isset($_POST['age']))echo $_POST['age']?> "><br><br>
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
    contact no : <input type="text" style="width: 50px" name="ext" value="+88"><input type="text" name="mobile" value="<?if(isset($_POST['mobile']))echo $_POST['mobile']?>"><br><br>
    contact :<input type="text" name="contactall" value="<?if(isset($_POST['contactall']))echo $_POST['contactall']?> "><b>(seen by all)</b><br><br>
    E-mail :<input type="text" name="email" value="<?if(isset($_POST['email']))echo $_POST['email']?> "><br><br>
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
    $password=$_POST['password'];
     $age=$_POST['age'];
     $blood=$_POST['blood'];
      $contact=$_POST['ext'].$_POST['mobile'];
      $contactall=$_POST['contactall'];
      $email=$_POST['email'];
       $division=$_POST['div'];
       $divdistrict=$_POST['dis'];
       $disthana=$_POST['thana'];
}
?>
    </select>   
       </form>
        <form action="donor_reg.php" method="POST">
      <input type="submit" name="submit" value="submit">
      <input type='hidden' name='name' value='<?php echo $name ?>' required="true">
      <input type='hidden' name='password' value='<?php echo $password ?>'>
      <input type='hidden' name='age' value='<?php echo $age ?>'>
      <input type='hidden' name='blood' value='<?php echo $blood ?>'>
      <input type='hidden' name='contact' value='<?php echo $contact ?>'>
      <input type='hidden' name='contactall' value='<?php echo $contactall ?>'>
      <input type='hidden' name='email' value='<?php echo $email ?>'>
      <input type='hidden' name='division' value='<?php echo $division ?>'>
      <input type='hidden' name='divdistrict' value='<?php echo $divdistrict ?>'>
      <input type='hidden' name='disthana' value='<?php echo $disthana ?>'>
 </form>
   
        <?php
       if(isset($_POST['submit'])){
           if(trim($_POST['name'])==null){
               echo "<font color='red'>please enter your name</font>";
           }
           else if(trim($_POST['password'])==null){
               echo "<br><font color='red'>please enter your password</font>";
           }
           else if(trim($_POST['blood'])==null){
               echo "<br><font color='red'>please enter your blood group</font>";
           }
            else if(trim($_POST['email'])==null){
               echo "<br><font color='red'>please enter your contact email</font>";
           }
           else{
            $donor_id = substr(number_format(time() * rand(),0,'',''),0,10);
            echo "your ID = <b>".$donor_id."</b><br>";
            echo $_POST['name'].'<br>';
            echo $_POST['password'].'<br>';
            echo $_POST['age'].'<br>';
            echo $_POST['blood'].'<br>';
            echo $_POST['contact'].'<br>';
            echo $_POST['contactall'].'<br>';
            echo $_POST['email'].'<br>';
            echo $_POST['division'].'<br>';
            echo $_POST['divdistrict'].'<br>';
            echo $_POST['disthana'].'<br>';
           
           
            
            include 'db_connection.php';
           /* $sql="INSERT INTO donorinfo (id, name, password, age, blood, contact , email, division, district, thana)
VALUES
('$donor_id','$_POST[name]','$_POST[password]',$_POST[age],'$_POST[blood]','$_POST[contact]','$_POST[email]',$_POST[division]','$_POST[divdistrict]','$_POST[disthana]')";*/
             $sql="INSERT INTO donorinfo (id, name, password, age, blood, contact , contactvictim, email, division, district, thana)
VALUES
('$donor_id','$_POST[name]','$_POST[password]',$_POST[age],'$_POST[blood]','$_POST[contact]','$_POST[contactall]','$_POST[email]','$_POST[division]','$_POST[divdistrict]','$_POST[disthana]')";
mysqli_query($con,$sql);
       }
       }
        ?>
    </body>
</html>