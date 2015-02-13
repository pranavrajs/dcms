<?php
	require'connect.inc.php';
	$query="SELECT * FROM  students LEFT JOIN college on students.college=college.collegeid  ORDER BY  students.drishti_id ASC";
	$result=mysql_query($query) or die(mysql_error());
	$num=mysql_num_fields($result);
?>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						

							  <tr>
								  <th>Dristhi Id</th>
								  <th>Name</th>
								  <th>Email</th>
								  <th>College</th>
								  <th>Phone</th>
					<!--			  <th>Phone 2</th>
							-->	 <th>Registration</th>
								<!-- <th>Activity</th>
								 <th>Accomodation</th>
-->								 		 <th>Operations</th>
							  </tr>
						  </thead>   
						  <tbody>
<?php

if($num!=0)
		{
 			while	($res=mysql_fetch_array($result)) {
 					echo "<tr>";
					echo "<td class=\"center\">".$res['drishti_id']."</td>";
					echo "<td class=\"center\">".$res['name']."</td>";
					echo "<td class=\"center\">".$res['email']."</td>";
					echo "<td class=\"center\"> ".$res['CollegeName']."</td>";
					echo "<td class=\"center\">".$res['phone']."</td>";
				//	echo "<td class=\"center\">".$res['phone2']."</td>";
				//	if($res['reg_bit']==1)	
				/*	{
					 echo"<td class=\"center\"><span class=\"label label-success\">Onsite</span>	</td> ";	
					echo "
					 		<td class=\"center\">
									<a class=\"btn btn-info\" href=\"edit.php?id=".$res['drishti_id']."\">
										<i class=\"icon-edit icon-white\"></i>  
										Edit                                            
								</a>
									<a class=\"btn btn-danger\" onclick=\"return check()\" href=\"delete.php?id=".$res['drishti_id']."\">
										Delete                                      
									</a>
									
								</td>";
					echo "</tr>";					
					}					 
					 else if($res['reg_bit']==2) 
					 	echo "<td class=\"center\"><span class=\"label \">Cancelled</span>	</td><td></td>";  
					else					 
					{
					 echo"<td class=\"center\"><span class=\"label label-warning\">Online</span>	</td> ";	
					echo "
					 		<td class=\"center\">
									<a class=\"btn btn-info\" href=\"edit.php?id=".$res['drishti_id']."\">
										<i class=\"icon-edit icon-white\"></i>  
										Edit                                            
								</a>
									<a class=\"btn btn-danger\" onclick=\"return check()\" href=\"delete.php?id=".$res['drishti_id']."\">
										Delete                                      
									</a>
									
								</td>";
					echo "</tr>";					
					}
	//				if($res['valid']==1)	
		//			 echo"<td class=\"center\"><span class=\"label label-success\">Active</span>	</td> ";	
			//		 else 
				//	 echo"<td class=\"center\"><span class=\"label label-danger\">Inactive</span>	</td> ";	
				//	if($res['accomodation']==1)	
			//		 echo"<td class=\"center\"><span class=\"label label-success\">Registered</span>	</td> ";	
		//			 else 
	//				 echo"<td class=\"center\"><span class=\"label label-danger\">Not Registered</span>	</td> ";	
					echo "</tr>";*/											
				}
				
		}

?>
						  </tbody>
					  </table>       