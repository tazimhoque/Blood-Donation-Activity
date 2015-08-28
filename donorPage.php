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
        <title>Original Hover Effects with CSS3</title>
        <meta charset="UTF-8" />
       
        
	
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css_imageMenu/demo.css" />
        <link rel="stylesheet" type="text/css" href="css_imageMenu/style_common.css" />
        <link rel="stylesheet" type="text/css" href="css_imageMenu/style7.css" />
        <style type="text/css">

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
   border-radius:25px
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
 
            
            <div class="main">
                <!-- SEVENTH EXAMPLE -->
                <div class="view view-seventh">
                    <img src="images_imageMenu/updateAcc(red).jpg" />
                    <div class="mask">
                        <h2>Update Account</h2>
                        <p>To change your given information or update your account,please click update</p>
                        <a href="updateDonorAcc.php" class="info">update</a>
                    </div>
                </div>
                <div class="view view-seventh">
                    <img src="images_imageMenu/hos_app.jpg" />
                    <div class="mask">
                        <h2>Create Appointment</h2>
                        <p>To create an appointment with the registered hospital for blood donation,please click Appointment</p>
                        <a href="createApp.php" class="info">Appointment</a>
                    </div>
                </div>
                <div class="view view-seventh">
                    <img src="images_imageMenu/victim_req.jpg" />
                    <div class="mask">
                        <h2>Blood Request</h2>
                        <p>If you want to see the blood request that matches with your blood group,please click ..</p>
                        <a href="matchRequest.php" class="info">See All</a>
                    </div>
                </div>
                <div class="view view-seventh">
                    <img src="images_imageMenu/request_for_blood.jpg" />
                    <div class="mask">
                        <h2>Request For blood</h2>
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
