<?php
	require'connect.inc.php';
	require'core.inc.php';
	if(!loggedin()) 
		header('Location:index.php');
	include 'header.php';
	
	if(!isset($_GET['var'])) {
		if($_SESSION['adm_lvl'] == 4)
			header('Location:login.php');
		if(!isset($_POST['submit'])) {		
?>
<div class="row">
	<div class="col-lg-12">
	<legend>Prize Details</legend>	
	<form action="prizes.php" method="POST">
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
				$query = "SELECT * FROM prize WHERE event_id = ".$_POST['eve']."";
				$result = mysql_query($query);
				if($result)
				{
					$num = mysql_num_rows($result);
					if($num)
					{
						echo "<div class=\"alert alert-info\">
						Prizes already updated.
					</div>";					
					}
					else 
					{
?>
<div class="row-fluid sortable">		
	<div class="box span12">
			<div class="box-header well" data-original-title>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
	<div class="box-content">
	<?php 
			$query1="SELECT id,name,max_no FROM events WHERE id=".$_POST['eve']."";		
			$result1=mysql_query($query1);
			$res1=mysql_fetch_array($result1);
			if($res1['max_no'] == 0) 
			{	
			?>
			<legend><?php echo $res1['name']; ?> Prize Details</legend>			
<form action="prize_add.php" method="POST">				
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<tr>
						<td>EVENT</td>
						<td><input type="text" name="id" class="form-control" readonly  value="<?php echo $res1['id'];?>"></td>	
					</tr>					
					<tr>
						<td>First Prize</td><td> </td>				
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize1"  class="form-control">
								<option value="0">--NULL--</option>
								<?php
											$query2="SELECT * FROM event_reg LEFT outer JOIN students on event_reg.drs_id=students.drishti_id WHERE event_reg.eve_id=".$_POST['eve']."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['drs_id']."\">".$res['drs_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
					<tr>
						<td>Second Prize</td> <td></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize2"  class="form-control">
								
								<option value="0">--NULL--</option>
								<?php
											$query2="SELECT * FROM event_reg LEFT outer JOIN students on event_reg.drs_id=students.drishti_id WHERE event_reg.eve_id=".$_POST['eve']."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['drs_id']."\">".$res['drs_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
					<tr>
						<td>Third Prize</td> <td></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize3"  class="form-control">
								<option value="0">--NULL--</option>								
								<?php
											$query2="SELECT * FROM event_reg LEFT outer JOIN students on event_reg.drs_id=students.drishti_id WHERE event_reg.eve_id=".$_POST['eve']."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['drs_id']."\">".$res['drs_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
		</table>	
		<div class="form-actions">
			<input type="submit" class="btn btn-primary" value="submit" name="submit" >
		</div>
</form>
	
			<?php			
			}		
			else {
?>
			<legend><?php echo $res1['name']; ?> Prize Details</legend>			
<form action="prize_add.php" method="POST">				
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<tr>
						<td>EVENT</td>
						<td><input type="text" name="id" readonly  class="form-control"  value="<?php echo $res1['id'];?>"></td>	
					</tr>					
					<tr>
						<td>First Prize</td><td> </td>				
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize1"  class="form-control">
								<option value="0">--NULL--</option>
								<?php
											$query2= "SELECT groups.group_id,groups.stud_id,students.name FROM `group_reg` LEFT JOIN groups on group_reg.group_id = groups.group_id LEFT JOIN students on groups.stud_id = students.drishti_id WHERE group_reg.event_id = ".$_POST['eve']." GROUP BY groups.group_id";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['stud_id']."\">".$res['stud_id']." ".$res['name']."</option>";
											}					
								?>								
								</select>						
						</td>
					</tr>
					<tr>
						<td>Second Prize</td> <td></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize2"  class="form-control">
								
								<option value="0">--NULL--</option>
								<?php
											//$query2="SELECT * FROM `group` LEFT outer JOIN students on group.mem1 = students.drishti_id WHERE group.event=".$_POST['eve']."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['stud_id']."\">".$res['stud_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
					<tr>
						<td>Third Prize</td> <td></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize3"  class="form-control">
								<option value="0">--NULL--</option>								
								<?php
											//$query2="SELECT * FROM `group` LEFT outer JOIN students on group.mem1 = students.drishti_id WHERE group.event=".$_POST['eve']."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['stud_id']."\">".$res['stud_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
		</table>	
		<div class="form-actions">
			<input type="submit" class="btn btn-primary" value="submit" name="submit" >
		</div>
</form>
<?php
				}
	?>	
	</div>
</div>
</div>	
<?php
					}
				}
		}
	}
else {
		if($_SESSION['adm_lvl'] ==4)
			$id = $_SESSION['event'];
		else 
			$id = $_GET['var'];
			$query = "SELECT * FROM prize WHERE event_id = ".$id."";
				$result = mysql_query($query);
				if($result)
				{
					$num = mysql_num_rows($result);
					if($num)
					{
						echo "<div class=\"alert alert-info\">
						Prizes already updated.
					</div>";					
					}
					else 
					{
?>
<div class="row-fluid sortable">		
	<div class="box span12">
			<div class="box-header well" data-original-title>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
	<div class="box-content">
	<?php 
			$query1="SELECT id,name,max_no FROM events WHERE id=".$id."";		
			$result1=mysql_query($query1);
			$res1=mysql_fetch_array($result1);
			if($res1['max_no'] == 0) 
			{	
			?>
			<legend><?php echo $res1['name']; ?> Prize Details</legend>			
<form action="prize_add.php" method="POST">				
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<tr>
						<td>EVENT</td>
						<td><input type="text" class="form-control" name="id" readonly  value="<?php echo $res1['id'];?>"></td>	
					</tr>					
					<tr>
						<td>First Prize</td><td> </td>				
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize1" class="form-control">
								<option value="0">--NULL--</option>
								<?php
											$query2="SELECT * FROM event_reg LEFT outer JOIN students on event_reg.drs_id=students.drishti_id WHERE event_reg.eve_id=".$id."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['drs_id']."\">".$res['drs_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
					<tr>
						<td>Points</td>
						<td>
							<input name="points1" class="form-control" type="number">
						</td>
					</tr>
					<tr>
						<td>Second Prize</td> <td></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize2" class="form-control">
								
								<option value="0">--NULL--</option>
								<?php
											$query2="SELECT * FROM event_reg LEFT outer JOIN students on event_reg.drs_id=students.drishti_id WHERE event_reg.eve_id=".$id."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['drs_id']."\">".$res['drs_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
					<tr>
						<td>Points</td>
						<td>
							<input name="points1" class="form-control" type="number">
						</td>
					</tr>
					<tr>
						<td>Third Prize</td> <td></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize3" class="form-control">
								<option value="0">--NULL--</option>								
								<?php
											$query2="SELECT * FROM event_reg LEFT outer JOIN students on event_reg.drs_id=students.drishti_id WHERE event_reg.eve_id=".$id."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['drs_id']."\">".$res['drs_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
					<tr>
						<td>Points</td>
						<td>
							<input name="points1" class="form-control" type="number">
						</td>
					</tr>
		</table>	
		<div class="form-actions">
			<input type="submit" class="btn btn-primary" value="submit" name="submit" >
		</div>
</form>
	
			<?php			
			}		
			else {
?>
			<legend><?php echo $res1['name']; ?> Prize Details</legend>			
<form action="prize_add.php" method="POST">				
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<tr>
						<td>EVENT</td>
						<td><input type="text" name="id" readonly  value="<?php echo $res1['id'];?>"></td>	
					</tr>					
					<tr>
						<td>First Prize</td><td> </td>				
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize1" class="form-control">
								<option value="0">--NULL--</option>
								<?php
										//	$query2="SELECT * FROM `group` LEFT outer JOIN students on group.mem1 = students.drishti_id WHERE group.event=".$id."";
										
											$query2 = "SELECT stud_id,name,groups.group_id FROM `groups` LEFT JOIN group_reg on groups.group_id = group_reg.group_id LEFT JOIN students on groups.stud_id = students.drishti_id  WHERE event_id = ".$id." GROUP BY event_id";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['stud_id']."\">".$res['stud_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
					<tr>
						<td>Second Prize</td> <td></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize2" class="form-control">
								
								<option value="0">--NULL--</option>
								<?php
											//$query2="SELECT * FROM `group` LEFT outer JOIN students on group.mem1 = students.drishti_id WHERE group.event=".$id."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['stud_id']."\">".$res['stud_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
					<tr>
						<td>Third Prize</td> <td></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>
								<select name="prize3" class="form-control">
								<option value="0">--NULL--</option>								
								<?php
											//$query2="SELECT * FROM `group` LEFT outer JOIN students on group.mem1 = students.drishti_id WHERE group.event=".$id."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['stud_id']."\">".$res['stud_id']." ".$res['name']."</option>";
											}							
								?>								
								</select>						
						</td>
					</tr>
		</table>	
		<div class="form-actions">
			<input type="submit" class="btn btn-primary" value="submit" name="submit" >
		</div>
</form>
<?php
				}
	?>	
	</div>
</div>
</div>	
<?php
					}
				}
}

include 'footer.php';
?>