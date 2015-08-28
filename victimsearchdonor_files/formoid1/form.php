<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

require_once str_replace('\\', '/', __DIR__) . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-default-skyblue.css" type="text/css" />
<span class="alert alert-success"><?=FINISH_MESSAGE;?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="<?=dirname($form_path)?>/jquery.min.js"></script>
<form class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#aa0000;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Search donor</h2></div>
	<div class="element-select"  <?frmd_add_class("select")?>><label class="title">Blood Group<span class="required">*</span></label><div class="large"><span><select name="select" required="required">

		<option value="A+">A+</option><br/>
		<option value="A-">A-</option><br/>
		<option value="B+">B+</option><br/>
		<option value="B-">B-</option><br/>
		<option value="O+">O+</option><br/>
		<option value="O-">O-</option><br/>
		<option value="AB+">AB+</option><br/>
		<option value="AB-">AB-</option><br/></select><i></i></span></div></div>
	<div class="element-select"  <?frmd_add_class("select2")?>><label class="title">Division<span class="required">*</span></label><div class="large"><span><select name="select2" required="required">

		<option value="BARISAL">BARISAL</option><br/>
		<option value="CHITTAGONG">CHITTAGONG</option><br/>
		<option value="DHAKA">DHAKA</option><br/>
		<option value="KHULNA">KHULNA</option><br/>
		<option value="RAJSHAHI">RAJSHAHI</option><br/>
		<option value="RANGPUR">RANGPUR</option><br/>
		<option value="SYLHET">SYLHET</option><br/></select><i></i></span></div></div>
	<div class="element-select"  <?frmd_add_class("select1")?>><label class="title">District<span class="required">*</span></label><div class="large"><span><select name="select1" required="required">
undefined</select><i></i></span></div></div>

<div class="submit"><input type="submit" value="Submit"/></div></form>
<script type="text/javascript" src="<?=dirname($form_path)?>/formoid-default-skyblue.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>