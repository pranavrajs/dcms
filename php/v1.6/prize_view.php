<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	if(!loggedin() || $_SESSION['adm_lvl']==4)
		header('Location:index.php');
	include 'header.php';
	if(!isset($_POST['submit']))
	{		
?>
<div class="row">
	<div class="col-lg-12">
	<legend>Prize Details</legend>	
	<form action="prize_view.php" method="POST">
	<table class="table table-striped table-bordered bootstrap-datatable ">
		<tr>
			<td>Select an event </td>
<?php
	$query="SELECT * FROM events";
	$result=mysql_query($query) or die(mysql_error());
	if(!$result)
		echo"error";
?>
			<td>		<select name="eve"  class="form-control">
						<?php
							$num=mysql_num_rows($result) or die(mysql_error()).die(mysql_error());
							if(!$num)
								echo"error";
							else {
									while($res=mysql_fetch_array($result)) 										
									echo"<option value=\"".$res['id']."\">".$res['name']."</option>";
								}
						
						 ?>
							</select></td>		
		</tr>		
	</table>
					
<div class="form-actions">
	<input type="submit" class="btn btn-primary"name="submit" value="Get Details">
</div>	
</form>	
	</div>
</div>

<?php
	}
	else {
		$id = $_POST['eve'];
		$query = "SELECT * FROM events WHERE id = ".$id;
		$result = mysql_query($query);
		if($result)
		{
			$num=mysql_num_rows($result);
			if($num)
			{
				$res = mysql_fetch_array($result);
				if($res['max_no']==0) {
					$q2 = "SELECT * FROM prize WHERE event_id = ".$id."";
					$r2 = mysql_query($q2);
					//echo mysql_num_rows($r2);
					if($r2) {
						?>
					<div class="row-fluid sortable">		
	<div class="box span12">
			<div class="box-content">
						<legend>Prize details #<?php echo $res['name']; ?></legend>	
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						
							<?php


								
								while($res2 = mysql_fetch_array($r2)) {



										echo "<tr>";								
										if($res2['pos']==1)
											echo"<td>First Prize</td>";
										else if($res2['pos']==2)
											echo"<td>Second Prize</td>";
										else 
											echo "<td>Third Prize</td>";
										$q3="SELECT * FROM students WHERE drishti_id = ".$res2['drs_id']."";
										$r3=mysql_query($q3);
										if($r3) 
										{
											$res3=mysql_fetch_array($r3);
											echo"<td>".$res3['name']." </td><td>  ".$res3['drishti_id']."</td>";										
										}										
										echo "</tr>";								
								}
							?>						
						</table>
</div></div>	</div>					
						<?php	
								
					}				
				}	
				else {
					$q2 = "SELECT * FROM prize WHERE event_id = ".$id."";
					$r2 = mysql_query($q2) or die(mysql_error());
					if($r2) {
						?>
						
	<div class="box span12">
			<div class="box-content">
						<legend>Prize details # <?php echo $res['name']?> </legend>	
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
									
											
						<?php
						while($res = mysql_fetch_array($r2))
						{
							
														
							echo "<tr>";
							if($res['pos']==1)
											echo"<td>First Prize</td>";
							else if($res['pos']==2)
											echo"<td>Second Prize</td>";
							else 
											echo "<td>Third Prize</td>";
						//	$q3 = "SELECT * FROM `groups` LEFT JOIN group_reg on groups.group_id = group_reg.group_id WHERE event_id = ".$res['event_id']." AND stud_id = ".$res['drs_id']."";
							$q3 = "SELECT pos,group_id,stud_id FROM `prize` LEFT JOIN groups on groups.stud_id = prize.drs_id WHERE event_id = ".$res['event_id']." AND stud_id = ".$res['drs_id']." GROUP BY pos";
							$r3 = mysql_query($q3) or die(mysql_error());	

							$q4 = "SELECT max_no from events where id = ".$res['event_id'];
							$r4 = mysql_query($q4) or die(mysql_error());	
							$max = mysql_fetch_array($r4)['max_no'];

							
							if($r3)
							{
								$res2 = mysql_fetch_array($r3) or die(mysql_error());
								$grp =  $res2['group_id'];

								echo"<td><table>";
								$i=1;	$q4= "SELECT name,stud_id FROM groups LEFT JOIN students on groups.stud_id = students.drishti_id WHERE group_id = ".$grp."";
											$r4=mysql_query($q4) or die(mysql_error());
																	
								while($i<=$max )
								{
									if(1) {		
											echo"<tr>";
																				
											if($r4) {
															$res4=mysql_fetch_array($r4);
															echo "<td>".$res4['stud_id']." ".$res4['name']."</td><td>"."</td>";												
											
											echo"</tr>";
											}					
										}			
										$i++;
								}
								echo "</table></td>";
							}			
							echo "</tr>";
						} 	
					}
				?>
		</table>
		</div></div>	
				<?php
				}		
			}		
		}
	}
include'footer.php';
?>