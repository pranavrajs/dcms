<?php
	require'core.inc.php';
	require'connect.inc.php';

	if(isset($_POST['submit'])) {		
		
		if(isset($_POST['prize1']) && isset($_POST['prize2']) && $_POST['id']) {
				$query="SELECT college FROM students WHERE drishti_id=".$_POST['prize1']."";
				$result=mysql_query($query) or die(mysql_error());	
				if($result)
				{
						$res=mysql_fetch_array($result);
						$q2="INSERT INTO prize (event_id,pos,cl_id,drs_id,points) VALUES (".$_POST['id'].",1,".$res['college'].",".$_POST['prize1'].",10)";		
						$r2=mysql_query($q2) or die(mysql_error());
						if($r2) {
								$query="SELECT college FROM students WHERE drishti_id=".$_POST['prize2']."";
								$result=mysql_query($query) or die(mysql_error());	
								if($result)
								{
									$n1=mysql_num_rows($result);
									if($n1)
									{
										$res=mysql_fetch_array($result);
										$q2="INSERT INTO prize (event_id,pos,cl_id,drs_id,points) VALUES (".$_POST['id'].",2,".$res['college'].",".$_POST['prize2'].",6)";		
										$r2=mysql_query($q2) or die(mysql_error());
										if($r2) {
												$query="SELECT college FROM students WHERE drishti_id=".$_POST['prize3']."";
												$result=mysql_query($query) or die(mysql_error());	
												if($result)
												{
													$n2=mysql_num_rows($result);
													if(!$n3)
														header('Location:login.php');		
													$res=mysql_fetch_array($result);
													$q3="INSERT INTO prize (event_id,pos,cl_id,drs_id,points) VALUES (".$_POST['id'].",3,".$res['college'].",".$_POST['prize3'].",4)";		
													$r3=mysql_query($q3) or die(mysql_error());
													if($r3) {
															header('Location:login.php');												
													}
												}
								
										}
									}
									else {
											header('Location:login.php');												
										}
							}
						}
				}
	}
}
?>