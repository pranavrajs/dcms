<?php
	require'core.inc.php';
	require'connect.inc.php';
	if($_SESSION['adm_lvl']!=5 || $_SESSION['adm_lvl']!=0 || $_SESSION['adm_lvl']!=1)
		$check=0;
	else 
		$check=1; 
	if(!loggedin() || $check)
		header('Location:index.php');
	
	include'header.php';
	if(!isset($_GET['var'])) {	
	if(isset($_POST['submit'])) {
			$query="SELECT * FROM prize WHERE event_id=".$_POST['eve']."";
			$result=mysql_query($query) or die(mysql_error());	
			$num=mysql_num_rows($result);
			if(!$num)
			{
			?>
<div class="row">		
	<div class="col-lg-12">
			<div class="box-header well" data-original-title>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
	<div class="box-content">
		<?php 
			$query1="SELECT id,name FROM events WHERE id=".$_POST['eve']."";		
			$result1=mysql_query($query1);
			$res1=mysql_fetch_array($result1);
			
			
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
								<select name="prize1">
								<?php
											$query2="SELECT * FROM event_reg LEFT outer JOIN students on event_reg.drs_id=students.drishti_id WHERE event_reg.eve_id=".$_POST['eve']."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['drs_id']."\">".$res['name']."</option>";
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
								<select name="prize2">
								<?php
											$query2="SELECT * FROM event_reg LEFT outer JOIN students on event_reg.drs_id=students.drishti_id WHERE event_reg.eve_id=".$_POST['eve']."";
											$result=mysql_query($query2) or die(mysql_error());
											$num=mysql_num_rows($result) or die(mysql_error());
											if($num)
											{
												while($res=mysql_fetch_array($result)) 
													echo"<option value=\"".$res['drs_id']."\">".$res['name']."</option>";
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
	</div>
</div>
</div>
<?php				
			}
			else {
				echo "<div class=\"alert alert-info\">
						Prizes already updated.
					</div>";
			}
	}	
	else {	
?>
<div class="box span12">
	<div class="box-content">
	<legend>Prize Details</legend>	
	<form action="prize.php" method="POST">
	<table class="table table-striped table-bordered bootstrap-datatable ">
		<tr>
			<td>Select a value </td>
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
}
else {
	
	?>
	<?php
}
include'footer.php';
?>