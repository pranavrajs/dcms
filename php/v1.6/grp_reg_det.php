<?php
 require 'connect.inc.php';
 require 'core.inc.php';
 if(!loggedin())
 	header('index.php');
 	include 'header.php';
 if(!isset($_GET['var'])) {
 	if($_SESSION['adm_lvl'] == 4)
 		header('Location:index.php');
	if(!isset($_POST['submit'])) { 
		?>
		<div class="row">
	<div class="col-lg-12">
	<legend>Group Registration Details</legend>	
	<form action="grp_reg_det.php" method="POST">
	<table class="table table-striped table-bordered bootstrap-datatable ">
		<tr>
			<td>Select a value </td>
<?php
	$query="SELECT * FROM events";
	$result=mysql_query($query) or die(mysql_error());
	if(!$result)
		echo"error";
?>
			<td>		<select name="eve"  class="form-control">
						<?php
							$num=mysql_num_rows($result) or die(mysql_error());
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
				//$query = "SELECT group_reg.group_id,stud_id FROM group_reg RIGHT JOIN groups on group_reg.group_id = groups.group_id WHERE event_id =".$_POST['eve']."";
				$query = "SELECT `group_id` FROM `group_reg` WHERE `event_id` = ".$_POST['eve'];
				$result = mysql_query($query) or die(mysql_error());
				if($result)
				{
					$num_groups = mysql_num_rows($result);
					if($num_groups)
					{
						
?>

<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-user"></i> Members</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
	<div class="box-content">
					<?php
						$q2= "SELECT * FROM events WHERE id = ".$_POST['eve']."";
										$r2 = mysql_query($q2);
										if($r2)
										{
											$n2 = mysql_num_rows($r2);
											if($n2){
												$res = mysql_fetch_array($r2); 
							
					?>
					<legend>Group Registration Details #<?php echo $res['name']; ?></legend>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						  <tr>
								  <th>Group Id</th>
								  <?php 
										
												$i = 1; 
												while($i <= $res['max_no'])
												{
															
									?>
										<th>Member <?php echo $i ;?></th>
									<?php
													$i++;
												}											
											}
											else {
														echo "No event found";												
												}										
										}
									
									?>
							</tr>
							</thead>
							<tbody>


							<?php
									
									while($res2 = mysql_fetch_array($result)) {
											$i=1;
											echo "<tr>";
											echo "<td>".$res2['group_id']."</td>";

											$q3 = "SELECT groups.stud_id,students.name FROM groups JOIN students on groups.stud_id = students.drishti_id WHERE group_id = ".$res2['group_id'];	
											$r3 = mysql_query($q3);


												for($i=1;$i<= $res['max_no']; $i++) {														
												?>
												<td><?php 
													if($r3)
													{
														$res3 = mysql_fetch_array($r3);											
													echo $res3['stud_id']."  ".$res3['name'] ?></td>
										<?php
													}
												}
											echo "</tr>";
										}
							?>

							<?php




							?>
							</tbody>
							</table>
	</div>
</div>
<?php					
					}		
					else {
 				echo"<div class = \"alert alert-error\">No Group registered yet</div>";
 			}						
				}	
				
 		
		}
 } 
 else {
 		if($_SESSION['adm_lvl'] == 4) 
 				$id = $_SESSION['event'];
 		else 
 				$id= $_GET['var'];
 	$query = "SELECT * FROM `groups` LEFT JOIN group_reg on groups.group_id = group_reg.group_id WHERE event_id = ".$id." GROUP BY groups.group_id";
				$result = mysql_query($query) or die(mysql_error());
				if($result)
				{
					$num = mysql_num_rows($result);
					if($num)
					{
						
?>

<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-user"></i> Members</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<div class="box-content">
					<?php
						$q2= "SELECT * FROM events WHERE id = ".$id."";
										$r2 = mysql_query($q2);
										if($r2)
										{
											$n2 = mysql_num_rows($r2);
											if($n2)
											{
												$res = mysql_fetch_array($r2); 
							
					?>
					<legend>Group Registration Details #<?php echo $res['name']; ?></legend>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						  <tr>
								  <th>Group Id</th>
								  <?php 
										
												$i = 1; 
												while($i <= $res['max_no'])
												{
															
									?>
										<th>Member <?php echo $i ;?></th>
									<?php
													$i++;
												}											
											}
											else {
														echo "No event found";												
												}										
										}
									
									?>
							</tr>
							</thead>
							<tbody>
							<?php
									
									while($res2 = mysql_fetch_array($result)) 
									{
											$i=1;
											echo "<tr>";
											echo "<td>".$res2['group_id']."</td>";
												//for($i=1;$i<= $res['max_no']; $i++) 
													
										?>

										<?php

										$q3 = "SELECT name, stud_id FROM groups INNER JOIN students on groups.stud_id = students.drishti_id WHERE group_id = ".$res2['group_id'];	
										$r3 = mysql_query($q3);
										if($r3){
											while($res = mysql_fetch_array($r3)){
												echo '<td>'.$res['stud_id'].' '.$res['name'].'</td>';
											}




										}



										?>	



										<?php
											echo "</tr>";
										}
							?>
							</tbody>
							</table>
	</div>
</div>
 	<?php
 				}
 			else {
 				echo"<div class = \"alert alert-error\">No Group registered yet</div>";
 			}
 		}
 		
 }

 include 'footer.php';
?>