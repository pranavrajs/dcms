<?php
	require 'connect.inc.php';
	require'core.inc.php';
	if(!isset($_GET['id']))
		return;
	$nid=$_GET['id'];
	if(isset($_SESSION['event'])) 
		$event=$_SESSION['event'];
	else 
		return;
	$id=mysql_real_escape_string($nid);
	$query="SELECT * FROM  students LEFT JOIN college on students.college=college.collegeid  WHERE  students.drishti_id ='".$id."'";
	$result=mysql_query($query) or die(mysql_error());
	if($result) {
			echo "<table class=\"table table-striped table-bordered bootstrap-datatable \">";
			$num=mysql_num_rows($result);
			if($num)
			{			
				while($row=mysql_fetch_array($result)) {
					echo "";
					echo "<tr><td>Drishti ID</td><td>" . $row['drishti_id'] . "</td></tr>";			
					echo "<tr><td>Name</td><td>" . $row['name'] . "</td></tr>";			
					echo "<tr><td>Email</td><td>" . $row['email'] . "</td></tr>";			
					echo "<tr><td>Phone</td><td>" . $row['phone'] . "</td></tr>";								
					echo "<tr><td>College</td><td>" . $row['CollegeName'] . "</td></tr>";
				
						$query2="SELECT report FROM event_reg WHERE drs_id=".$id." AND eve_id = ".$_SESSION['event']."";
						$result2=mysql_query($query2) or die(mysql_error());
						if($result2)
						{
							$num2=mysql_num_rows($result2);
							if($num2!=0) {					
									$res2=mysql_fetch_array($result2);
									if($res2['report']==1)
										echo"<tr><td>Status</td><td class=\"center\"> Reported </td></tr>";
									else { 
												echo "<tr><td>Status</td><td class=\"center\"><a class=\"btn btn-info\" href=\"report.php?id=".$id."\">
														<i class=\"icon-edit icon-white\"></i>  
														Report                                            
														</a></td></tr>";		
								     	}
							}	
							else {
								echo "<tr><td>Status</td><td>Not registered </td></tr>";
							}
							
						}
					
					
				}	
			}
			else {
				echo"<tr><td>No participant found </td></tr>";
			}		
			echo"</table>";
		}

?>