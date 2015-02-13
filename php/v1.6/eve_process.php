<?php
	require 'core.inc.php';
	require 'connect.inc.php';
	if(!loggedin())
			header('Location:index.php');
	if(isset($_POST['submit'])) {
			$descr=mysql_real_escape_string($_POST['descr']);
			$eve=mysql_real_escape_string($_POST['eve_format']);
			if(isset($_POST['pbm_stat']))
				$pbm_stat=$_POST['pbm_stat'];
			else
				$pbm_stat=" ";
			$max = $_POST['max_no'];
			$query="UPDATE events SET descr='".$descr."' ,pbm_stat='".$pbm_stat."', eve_format='".$eve."', prize1='".$_POST['prize1']."' , prize2 ='".$_POST['prize2']."' , max_no ='".$max."'	WHERE name='".$_POST['name']."'";
			$result=mysql_query($query) or die(mysql_error());

			$q = "SELECT id FROM events WHERE name = '".$_POST['name']."'";
			$r = mysql_query($q) or die(mysql_error());
			$id = mysql_fetch_array($r)['id'];


			mysql_query("DELETE FROM event_tag WHERE event_id = ".$id) or die(mysql_error());

			$tags = $_POST['tags'];

			foreach($tags as $t){
				mysql_query("INSERT INTO event_tag VALUES(NULL,".$id.",".$t.")") or die(mysql_error());
			}

			if(!$result)
			{
				echo "error";			
			}
			else {
				header('Location:index.php');			
			}		
	}
	else {
		header('Location:index.php');
	}
?>