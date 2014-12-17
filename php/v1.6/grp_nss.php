<?php
	require'connect.inc.php';
	require'core.inc.php';
	if(!loggedin())
		header('Location: index.php');
	include'header.php';
	if(!isset($_GET['var']))
	{
	if(!isset($_POST['submit'])) {
		
		
?>
<div class="box span12">
	<div class="box-content">
	<legend>Group Registration</legend>	
	<form action="grp_nss.php" method="POST">
	<table class="table table-striped table-bordered bootstrap-datatable ">
		<tr>
			<td>Select an event </td>
			<td>		<select name="eve">
<?php						
		$query="SELECT id,name FROM events ORDER BY id ASC";
					$result=mysql_query($query);
					$num=mysql_num_rows($result);
					if($num)
							while($res=mysql_fetch_array($result))
								echo "<option value='".$res['id']."'>".$res['name']."</option>";			
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
?>
<div class="box span12">
	<div class="box-content">
	<legend>Add a new group</legend>	
	<form action="grpprocess.php?eveid=<?php echo $_POST['eve'];?>" method="POST">
	<table class="table table-striped table-bordered bootstrap-datatable ">
	<?php 
		$q1="SELECT max_no FROM events WHERE id =".$_POST['eve']."";
		$r1=mysql_query($q1);
		$res=mysql_fetch_array($r1);		
		$num = $res['max_no'];
		while($num > 0) {
	?>
		<tr>
			<td>Member </td>
			<td>
			<select name="event[]">
			<option value="0">NULL</option>
			<?php			
				$query2="SELECT * FROM event_reg LEFT OUTER JOIN students on event_reg.drs_id = students.drishti_id WHERE event_reg.eve_id = ".$_POST['eve']."";
				$result2=mysql_query($query2) or die(mysql_error());
				$num2=mysql_num_rows($result2);
				if($num2) {
							while($res=mysql_fetch_array($result2)) {
								echo"<option value='".$res['drs_id']."'>".$res['drs_id']."    ".$res['name']."</option>";								
							}
						$num-- ;
				}					
				
			?>		
			</select>
			
		</td>		
		</tr>
		<?php
		}
		?>
	</table>
	
<div class="form-actions">
	<input type="submit" class="btn btn-primary"name="submit" value="Submit">
</div>
	</form>
	</div>
</div>		
	<?php
	}
	}
	else
	{
		if(isset($_SESSION['adm_lvl'])==4)
			$id = $_SESSION['event'];
		else
			$id = $_GET['var'];
	?>
	
	
	<div class="box span12">
	<div class="box-content">
	<legend>Add new group</legend>	
	<form action="grpprocess.php?eveid=<?php echo $id;?>" method="POST">
	<table class="table table-striped table-bordered bootstrap-datatable ">
	<?php 
		$q1="SELECT max_no FROM events WHERE id =".$id."";
		$r1=mysql_query($q1);
		$res=mysql_fetch_array($r1);		
		$num = $res['max_no'];
		while($num > 0) {
	?>
		<tr>
			<td>Member </td>
			<td>
			<select name="event[]">
			<option value="0">NULL</option>
			<?php			
				$query2="SELECT * FROM event_reg LEFT OUTER JOIN students on event_reg.drs_id = students.drishti_id WHERE event_reg.eve_id = ".$id."";
				$result2=mysql_query($query2) or die(mysql_error());
				$num2=mysql_num_rows($result2);
				if($num2) {
							while($res=mysql_fetch_array($result2)) {
								echo"<option value='".$res['drs_id']."'>".$res['drs_id']."    ".$res['name']."</option>";								
							}
						$num-- ;
				}					
				
			?>		
			</select>
			
		</td>		
		</tr>
		<?php
		}
		?>
	</table>
	
<div class="form-actions">
	<input type="submit" class="btn btn-primary"name="submit" value="Submit">
</div>
	</form>
	</div>
</div>		
	<?php
	}
include'footer.php';
?>