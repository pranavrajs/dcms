<?php
require "connect.inc.php";
require "core.inc.php";
		 if(!loggedin() ) {
 		
				header('Location:index.php');
 		}

if($_SESSION['adm_lvl']!=4) {
include('header.php'); 
if(!isset($_GET['var']))
	{		 
	$query="SELECT * FROM  students LEFT JOIN college on students.college=college.collegeid  ORDER BY  students.drishti_id ASC";
	$result=mysql_query($query) or die(mysql_error());
	$num=mysql_num_fields($result);
	
?>
<script>
	function check()
	{
		var x = confirm('Confirm Deletion');
		return x;
	}
</script>
<?php ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Registration List</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Registered Student Details</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						

							  <tr>
								  <th>Dristhi Id</th>
								  <th>Name</th>
								  <th>Email</th>
								  <th>College</th>
					<!--			  <th>Phone</th>
								  <th>Phone 2</th>
								 <th>Registration</th>
								<th>Activity</th>
								 <th>Accomodation</th>
								 		 <th>Operations</th>
-->							  </tr>
						  </thead>   
						  <tbody>
<?php

if($num!=0)
		{
 			while	($res=mysql_fetch_array($result)) {
 					echo "<tr>";
					echo "<td class=\"center\">".$res['drishti_id']."</td>";
					echo "<td class=\"center\">".$res['name']."</td>";
					echo "<td class=\"center\"><a  href=\"stud_det.php?var=".$res['drishti_id']."\"> ".$res['email']."	</a></td>";
					echo "<td class=\"center\"> ".$res['CollegeName']."</td>";
				//	echo "<td class=\"center\">".$res['phone']."</td>";
				//	echo "<td class=\"center\">".$res['phone2']."</td>";
					if($res['reg_bit']==1)	
					{
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
					echo "</tr>";											
				}
				
		}

?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
<?php 
}
else {
	$query="SELECT * FROM  students LEFT JOIN college on students.college=college.collegeid  WHERE  students.drishti_id ='".$_GET['var']."'";
	$result=mysql_query($query) or die(mysql_error());
	$num=mysql_num_fields($result);
	?>
		<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="stud_det.php">Registration List</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">Review Registration List</a>
					</li>
				</ul>
			</div>
		<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable ">
						  <thead>
						
	<?php
if($num!=0)	{
 			while	($res=mysql_fetch_array($result)) {
					echo"<tr><td class=\"center\"> Drishti ID </td> <td class=\"center\"> DRS ".$res['drishti_id']."</td></tr>"; 					
					echo"<tr><td class=\"center\"> Name </td> <td class=\"center\"> ".$res['name']."</td></tr>"; 					
					echo"<tr><td class=\"center\"> Email </td> <td class=\"center\"> ".$res['email']."</td></tr>"; 					
					echo"<tr><td class=\"center\"> College </td> <td class=\"center\"> ".$res['CollegeName']."</td></tr>"; 					
					echo"<tr><td class=\"center\"> Phone </td> <td class=\"center\"> ".$res['phone']."</td></tr>"; 					
					echo "<tr><td class=\"center\"> Registration </td> ";					
					if($res['reg_bit']==1)	
					 echo"<td class=\"center\"><span class=\"label label-success\">Onsite</span>	</td> ";	
					 else if($res['reg_bit']==0) 
					 echo"<td class=\"center\"><span class=\"label label-warning\">Online</span>	</td> ";
					else
					 echo"<td class=\"center\"><span class=\"label \">Cancelled</span>	</td> ";
					
					 echo"</tr>";	
					echo "<tr><td class=\"center\"> Activity </td> ";					
					 
					if($res['valid']==1)	
					 echo"<td class=\"center\"><span class=\"label label-success\">Active</span>	</td> ";	
					 else 
					 echo"<td class=\"center\"><span class=\"label label-danger\">Inactive</span>	</td> ";	
					 echo"</tr>";	
					echo "<tr><td class=\"center\"> Accomodation </td> ";					
					if($res['accomodation']==1)	
					 echo"<td class=\"center\"><span class=\"label label-success\">Male Accomodation</span>	</td> ";	
					else if($res['accomodation']==2) {
						echo"<td class=\"center\"><span class=\"label label-warning\">Female Accomodation</span>	</td> ";	
					}					 
					 else 
					 echo"<td class=\"center\"><span class=\"label label-danger\">Not Registered</span>	</td> ";
					 echo"</tr>";	
					echo "<tr><td class=\"center\"> Payment </td> ";					
					 if($res['pay_bit']==0)
						 echo"<td class=\"center\"><span class=\"label label-danger\">No Payment Done</span>	</td> ";
					else if($res['pay_bit']==1)
						 echo"<td class=\"center\"><span class=\"label label-success\">Paid Rs. 150</span>	</td> ";
					else if($res['pay_bit']==2)
						 echo"<td class=\"center\"><span class=\"label label-success\">Paid Rs. 200</span>	</td> ";
					else if($res['pay_bit']==3)
						 echo"<td class=\"center\"><span class=\"label label-success\">Paid Rs. 150 + Workshop</span>	</td> ";
					else if($res['pay_bit']==4)
						 echo"<td class=\"center\"><span class=\"label label-success\">Paid Rs. 200 + Workshop</span>	</td> ";
					else if($res['pay_bit']==5)
						 echo"<td class=\"center\"><span class=\"label label-warning\">Workshops Only</span>	</td> ";
					 else 
						 ;
					$query2="SELECT * FROM event_reg LEFT outer JOIN events on event_reg.eve_id=events.id WHERE event_reg.drs_id=".$res['drishti_id']."";
					$result2=mysql_query($query2) or die(mysql_error());	
					$num2=mysql_num_fields($result2);
					echo "<tr><td>Events Registered </td>";
					echo"<td><table>";					
					if($num2) {
						while($res2=mysql_fetch_array($result2)) {
									
								if($res2['group']!= 10) {					
									echo "<tr><td>".$res2['name']."</td>";
									if($res2['report']==1)
										echo"<td>Reported</td></tr>";
									else
										echo"<td> Not Reported</td></tr>";
							
						}						
						}					
					}	
					echo"</table></td></tr></table>" ;			
 			}
 	}
?>
</thead>
</table>
</div>
<div class="form-actions">
	<a class="btn btn-primary" href="stud_det.php">Submit</a>
</div>
<?php } 
}
else 
	header('Location:index.php');
?>

<?php include('footer.php'); ?>