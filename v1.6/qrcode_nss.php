<?php
	require 'connect.inc.php';
	require'core.inc.php';
	if(!isset($_GET['id']))
		return;
	$id=$_GET['id'];
	$query="SELECT * FROM  students LEFT JOIN college on students.college=college.collegeid  WHERE  students.drishti_id ='".$id."'";
	$result=mysql_query($query);
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
					echo"<td>Operations</td>";
						
					if($row['reg_bit']==1)	
					{
						
						echo "<td class=\"center\">
									<a class=\"btn btn-info\" href=\"edit.php?id=".$row['drishti_id']."\">
										<i class=\"icon-edit icon-white\"></i>  
										Edit                                            
								</a>
									<a class=\"btn btn-danger\" href=\"delete.php?id=".$row['drishti_id']."\">
										Delete                                      
									</a>
									
								</td>";
					echo "</tr>";					
					}					 
					else if($row['reg_bit']==2) 
					 	echo "<td class=\"center\"><span class=\"label \">Cancelled</span>	</td><td></td>";  
					else					 
					{
						echo "
					 		<td class=\"center\">
									<a class=\"btn btn-info\" href=\"edit.php?id=".$row['drishti_id']."\">
										<i class=\"icon-edit icon-white\"></i>  
										Edit                                            
								</a>
									<a class=\"btn btn-danger\" href=\"delete.php?id=".$row['drishti_id']."\">
										Delete                                      
									</a>
									
								</td>";
					echo "</tr>";					
					}
				
			}	
		}
		else {
			echo"<tr><td>No participant found </td></tr>";
		}		
			echo"</table>";
		}

?>