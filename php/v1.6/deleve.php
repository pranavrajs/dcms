<?php
require'core.inc.php';
require'connect.inc.php';
 if(!isset($_GET['id'])||!loggedin() )
	{
		header('Location: index.php');
		}
	else {
				$query="DELETE FROM  event_reg WHERE drs_id=".$_GET['id']." AND eve_id = ".$_GET['eve']."";
				$result=mysql_query($query) or die(mysql_error());
				if($result)
					header('Location: edit.php?id='.$_GET['id'].'');
	}
?>