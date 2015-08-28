<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$mysql_database='bdms';
$error_report='could not connected';
$con=mysqli_connect($mysql_host, $mysql_user, $mysql_pass,$mysql_database) or die($error_report);
?>
