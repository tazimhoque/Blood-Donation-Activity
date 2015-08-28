<!DOCTYPE html>
<html>
<head>	
	<title>Interactive menu with CSS3 & jQuery</title>
	<link rel="stylesheet" href="gridMenu/style.css">
        <link rel="stylesheet" type="text/css" href="button/compressed.button.css" />
	<script src="gridMenu/jquery-1.7.1.min.js"></script>
	<!--[if (gte IE 6)&(lte IE 8)]> 
		<script src="selectivizr.js"></script>
	<![endif]-->
	<style>
		/* Demo page only */

		#about{
		    color: #999;
		    text-align: center;
		    font: 0.9em Arial, Helvetica;
		}

		#about a{
		    color: #777;
		}
            h1,h2,h3,h4,h5,h6
             {
               text-shadow: 5px 5px 5px #FF0000;
             }
	</style>
</head>

<body>
<!--<img src="images_imageMenu/home_img.jpg"><br> 
    <div style="float:right;">
    <a href="donor_reg.php" class="button red bigrounded">Get A Donor Account</a>
    </div>
    <br><br><br>-->
  <ul class="menu">
     <li tabindex="1"> 
      <span class="title">blood request</span>
      <div class="content">To see all blood request,please click on "all request" button.<br><br><a href="allRequest.php" class="red button criss-cross">Request</a></div>
    </li>
    <li tabindex="1">
      <span class="title">Create Appointment</span> 
      <div class="content">Are you a registered Donor? All registered Donor can create appointment with the hospital<br><br><a href="createApp.php" class="red button criss-cross">Appointment</a></div>
    </li>
    <li tabindex="1">
      <span class="title">Eligibility</span> 
      <div class="content">
          Are you thinking of giving blood?<br><br>
          To know about eligibility of giving blood,<a href="eligibility.php">Click here.</a><br><br>
           Find out if you are eligible by taking our <a href="eligibilityQuiz.php">quick quiz</a><br><br>
          Read the <a href="faq.php">FAQs for full details</a></div>
    </li>
    <li tabindex="1">
      <span class="title">Hospital Info</span> 
      <div class="content">Do you want to know about the registered hospital's name,contact info or location?Do you want to find out your nearest Hospital?<br><br><a href="HospitalInfo.php" class="red button criss-cross">Hospital Info</a></div>
    </li>
    <li tabindex="1">
      <span class="title">About Donation</span> 
      <div class="content"><a href="whatHappens.php">What Happens To Donated Blood?</a></div>
    </li>
    <li tabindex="1">
      <span class="title">About Blood</span> 
      <div class="content">Do you know,<br>
                           One pint of blood can save up to three lives.<br>
                           Red blood cells carry oxygen to the body’s organs and tissues.<br>
                           Four main red blood cell types: A, B, AB and O. Each can be positive or negative for the Rh factor. AB is the universal recipient; O negative is the universal donor of red blood cells.<br>
                           And find out more ... <br><br><a href="aboutBloodTypes.php">click here to know more about blood.</a></div>
    </li>
    <li tabindex="1"> 
      <span class="title">Tips</span>
      <div class="content">To know about blood donation and get help and tips about donation
          <br><br><a href="tips.php">click here for more information.</a></div>
    </li>
    <li tabindex="1"> 
      <span class="title">Amazing Stories</span>
      <div class="content">Amazing stories of the donor or victims can inspire you to donate blood.
          <br>
      <a href="amazing_stories.php"><font face="algerian" color="blue">Read More >></font></a></div>
    </li>
    <li tabindex="1"> 
      <span class="title">FAQ</span>
      <div class="content">Find out all questions and answers on blood donation<br><br><a href="faq.php" class="red button criss-cross">FAQ</a></div>
    </li>    
  </ul>
  
  

	<script>
	  (function(){
	  
		// Append a close trigger for each block
		$('.menu .content').append('<span class="close">x</span>');		
		// Show window
		function showContent(elem){
			hideContent();
			elem.find('.content').addClass('expanded');
			elem.addClass('cover');	
		}
		// Reset all
		function hideContent(){
			$('.menu .content').removeClass('expanded');
			$('.menu li').removeClass('cover');		
		}
		
		// When a li is clicked, show its content window and position it above all
		$('.menu li').click(function() {
			showContent($(this));
		});		
		// When tabbing, show its content window using ENTER key
		$('.menu li').keypress(function(e) {
			if (e.keyCode == 13) { 
				showContent($(this));
			}
		});

		// When right upper close element is clicked  - reset all
		$('.menu .close').click(function(e) {
			e.stopPropagation();
			hideContent();
		});		
		// Also, when ESC key is pressed - reset all
		$(document).keyup(function(e) {
			if (e.keyCode == 27) { 
			  hideContent();
			}
		});
		
	  })();
	</script>
        <br><hr>
        <div style="width:45%;float:left">
            <h2>Learn About Blood.<img src="images_imageMenu/home_img(small)1.png" align="left"></h2>
            <br><p style="color: #9F9FA3">
                Discover blood facts and statistics, and what happens to donate blood.
            </p>
            <a href="aboutBloodTypes.php" class="red button criss-cross">Learn More</a>
        </div>
         <div style="width:45%;float:right;">
            <h2>The Donation Process<img src="images_imageMenu/home_page(small)2.png" align="left"></h2>
            <br><p style="color: #9F9FA3">
                Learn about the blood donation process, and what to know before making a donation.
            </p>
            <a href="whatHappens.php" class="red button criss-cross">Learn More</a>
        </div>

</body>
</html>