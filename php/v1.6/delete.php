<?php
require'core.inc.php';
require'connect.inc.php';
 if(!isset($_GET['id'])||!loggedin() )
	{
		header('Location: index.php');
		}
	else {
				$query="SELECT reg_bit FROM  students WHERE drishti_id='".$_GET['id']."'";
				$result=mysql_query($query) or die(mysql_error());
				$num=mysql_num_fields($result);
				if($num)
				{
									$query="UPDATE students SET reg_bit = 2 WHERE drishti_id='".$_GET['id']."'";
									$result=mysql_query($query) or die(mysql_error());
									if(!$result) {
										echo"Error";
									}
									else {
									header('Location: stud_det.php');
										
									}
				}

	}
?>