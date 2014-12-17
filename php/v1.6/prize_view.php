<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	if(!loggedin() || $_SESSION['adm_lvl']==4)
		header('Location:index.php');
	include 'header.php';
	if(!isset($_POST['submit']))
	{		
?>
<div class="box span12">
	<div class="box-content">
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
			<td>		<select name="eve">
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
		$query = "SELECT * FROM events WHERE id = ".$id."";
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
						<legend>Prize details #</legend>	
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
							$q3 = "SELECT * FROM `group` WHERE event = ".$res['event_id']." AND mem1 = ".$res['drs_id']."";
							$r3 = mysql_query($q3) or die(mysql_error());	
							if($r3)
							{
								$res2 = mysql_fetch_array($r3) or die(mysql_error());
								echo"<td><table>";
								$i=1;							
								while($i<= 6 )
								{
									if($res2['mem'.$i]!= 0) {		
											echo"<tr>";
																				
											$q4= "SELECT * FROM students WHERE drishti_id = ".$res2['mem'.$i]."";
											$r4=mysql_query($q4) or die(mysql_error());
											if($r4) {
															$res4=mysql_fetch_array($r4);
															echo "<td>".$res4['name']."</td><td>".$res4['drishti_id']."</td>";												
											
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