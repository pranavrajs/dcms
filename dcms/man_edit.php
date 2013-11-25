<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	if(!loggedin() || $_SESSION['adm_lvl']!=0) { 		
				header('Location:index.php');
 		}
	include 'header.php';
	if(!isset($_POST['submit'])) {
?>
<div class="box span12">
	<div class="box-content">	
	<legend>Edit Manager details</legend>
	<fieldset>
	<form action="man_edit.php" method="POST"class="form-horizontal">
		<table class="table table-striped table-bordered bootstrap-datatable ">
			<tr>
				<td>Name 				
				</td>			
				<td>
						<?php
							$query="SELECT fname,lname,id FROM stud_reg WHERE level	 =4";
							$result=mysql_query($query);
							if($result) {
						?>			
							<select name="id">
								<?php
										while($res=mysql_fetch_array($result)) {
											echo"<option value ='".$res['id']."'>".$res['fname']." ".$res['lname']."</option>";										
										}
								?>
							</select>
						<?php
							}
						?>
				</td>
			</tr>		
			<tr>
				<td>Event
				</td>			
				<td>
						<?php
							$query="SELECT name,id FROM events ";
							$result=mysql_query($query);
							if($result) {
						?>			
							<select name="event">
								<?php
										while($res=mysql_fetch_array($result)) {
											echo"<option value ='".$res['id']."'>".$res['name']."</option>";										
										}
								?>
							</select>
						<?php
							}
						?>
				</td>
			</tr>		
		</table>
		
<div class="form-actions">
	<input type="submit" class="btn btn-primary"name="submit" value="Change Event">
</div>
	</form>
	</fieldset>
	</div>
</div>	
		<?php				
			
	}
	else {
			$query="UPDATE stud_reg SET event = ".$_POST['event']." WHERE id = ".$_POST['id']."";
			$result=mysql_query($query);
			if($result)
				header('Location:index.php');
				
	}
?>
<?php
	
	include'footer.php';

?>