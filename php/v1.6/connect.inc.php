<?php 
$host = 'localhost';
$name = 'cetdriss_pranav';
$pass = 'kindappan123';
$db = 'cetdriss_drishti';
mysql_connect($host,$name,$pass) or die('Could not connect');
mysql_select_db($db) or die(mysql_error());
?>