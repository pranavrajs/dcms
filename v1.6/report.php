<?php
	require'connect.inc.php';
	require'core.inc.php';
	if(isset($_GET['id'])) {
		$query="UPDATE event_reg SET report=1 WHERE event_reg.drs_id=".$_GET['id']." and event_reg.eve_id=".$_SESSION['event']."";
		$result=mysql_query($query) or die(mysql_error());
		$num=mysql_fetch_array($result);
		echo $num;		
		if($result) 
			header('Location:eve_part.php');
	}
?>