<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['email'])) {
$email = $_SESSION['email'];
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <meta charset="UTF-8" />
       
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css_imageMenu/demo.css" />
        <link rel="stylesheet" type="text/css" href="css_imageMenu/style_common.css" />
        <link rel="stylesheet" type="text/css" href="css_imageMenu/style7.css" />
         <style type="text/css">
             h1.color_text
{
text-shadow: 5px 5px 5px #FF0000;
}

input.groovybutton
{
   font-size:16px;
   font-family:Georgia,serif;
   font-weight:bold;
   color:#00CCFF;
   width:100px;
   height:40px;
   background-color:#990033;
   margin-left: 20px;
}

</style>

<script language="javascript">

function goLite(FRM,BTN)
{
   window.document.forms[FRM].elements[BTN].style.color = "#993333";
   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#33CCFF";
}

function goDim(FRM,BTN)
{
   window.document.forms[FRM].elements[BTN].style.color = "#00CCFF";
   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#990033";
}

</script>
    </head>
    <body>
        <?php
        include 'db_connection.php';
        $sql_name = "select name from hospitalinfo where email='$email'";
         if($query_run=  mysqli_query($con,$sql_name))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            $name = $query_row['name'];
            echo "<h1 class='color_text'>$name<h1>";
        ?>
       
            
            <div class="main">
                <!-- SEVENTH EXAMPLE -->
                <div class="view view-seventh">
                    <img src="images_imageMenu/search_donor.jpg" />
                    <div class="mask">
                        <h2>Search Donor</h2>
                        <p>To find out Donor of specific blood group nd location and to request them to donate blood through message,click search</p>
                        <a href="search.php" class="info">Search</a>
                    </div>
                </div>
                <div class="view view-seventh">
                    <img src="images_imageMenu/donor_session.jpg" />
                    <div class="mask">
                        <h2>Set Donor Session</h2>
                        <p>To set a Donor's blood donation time and track when he is available and not available to donate blood.click Donor session.</p>
                        <a href="bloodDonationTime.php" class="info">Donor Session</a>
                    </div>
                </div>
                <div class="view view-seventh">
                    <img src="images_imageMenu/update.jpg" />
                    <div class="mask">
                        <h2>Update Account</h2>
                        <p>To Update Hospital'd account information,click Update</p>
                        <a href="updateHospitalAcc.php" class="info">Update</a>
                    </div>
                </div>
                <div class="view view-seventh">
                    <img src="images_imageMenu/hos_app.jpg" />
                    <div class="mask">
                        <h2>Manage Appointment</h2>
                        <p>To manage Appointment ,click Manage</p>
                        <a href="donorApp.php" class="info">Manage</a>
                    </div>
                </div>
                 <div class="view view-seventh">
                    <img src="images_imageMenu/blood_bank.jpg" />
                    <div class="mask">
                        <h2>Blood Bank</h2>
                        <p>To Update present status of Blood Bank .. </p>
                        <a href="bloodbank.php" class="info">Blood Bank</a>
                    </div>
                </div>
               <!--  <div class="view view-seventh">
                    <img src="images_imageMenu/unregistered_donor.jpg" />
                    <div class="mask">
                        <h2>save Unregistered donor</h2>
                        <p>To Update Hospital'd account information,click Update</p>
                        <a href="bloodbank.php" class="info">Unregistered Donor</a>
                    </div>
                 </div> -->
               <div class="view view-seventh">
                    <img src="images_imageMenu/request_for_blood.jpg" />
                    <div class="mask">
                        <h2>Request For Blood</h2>
                        <p>To Request for blood donation,please click Blood Request</p>
                        <a href="PostBloodRequest.php" class="info">Blood Request</a>
                    </div>
                 </div>
                
            </div><br>
<form name="groovyform" action="logout.php" method="POST">
<input
   type="submit"
   name="groovybtn1"
   class="groovybutton"
   value="Log Out"
   title=""
   
   onMouseOver="goLite(this.form.name,this.name)"
   onMouseOut="goDim(this.form.name,this.name)">
</form>
        
        
    </body>
</html>
