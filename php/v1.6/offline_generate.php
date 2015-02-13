<?php
require "connect.inc.php";
require "core.inc.php";

$id = $_REQUEST['id'];

$query="SELECT * FROM std_offline ORDER BY  offline_id DESC LIMIT 0,1";
$result=mysql_query($query) or die(mysql_error());
//$num=mysql_num_fields($result);
//$off_id = mysql_fetch_array($result)['offline_id']+1;


$query="SELECT * FROM std_offline WHERE stud_id=".$id;
$result=mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);

if($num){
	echo '0';
	exit();
}


$query="INSERT INTO std_offline VALUES($id,NULL)";
$result=mysql_query($query) or die(mysql_error());

if(isset($_REQUEST['back'])){
	header('Location:'.$_REQUEST['back']);
}

echo mysql_insert_id();

?>