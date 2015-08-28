<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['email'])) {
      include 'db_connection.php';
    $sql_count = "select count(email) as total from donorinfo where email='$_SESSION[email]'";
    $query_run=  mysqli_query($con,$sql_count);
    $query_row=  mysqli_fetch_assoc($query_run);
    $total_result = $query_row['total'];
    if($total_result > 0)
header('Location: donorPage.php');
}

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="loginDesign.css" />
</head>
<body>
<div class="container" align="left">
	<section id="content">
            <form action="checkDonorMailPass.php" method="POST">
			<h1>Donor Login</h1>
			<div>
				<input type="text" placeholder="E-mail Address" required="" id="username" name ="email" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" name="password" />
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
				
                                <a href="reg_Donor_form.php">Register</a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>