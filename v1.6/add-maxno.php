<?php
	require'connect.inc.php';
	require'core.inc.php';
	if(!loggedin()) 
		return;
	include'header.php';
	if(!isset($_POST['submit'])) {
?>
<div class="box span12">
	<div class="box-content">
	<legend>Maximum no of participants in a group</legend>	
	<form action="add-maxno.php" method="POST">
	<table class="table table-striped table-bordered bootstrap-datatable ">
			<tr><td>Add maximum no</td><td><input type="text" name="maxno"/></td></tr>
	</table>
	<div class="form-actions">
		<input type="submit" class="btn btn-primary"name="submit" value="Set max value">
	</div>	
	</form>
	</div>
</div>
<?php
	}
	else {
	if(isset($_POST['maxno'])) 
		$max=$_POST['maxno'];
	$query="UPDATE events SET max_no =".$max." WHERE id = ".$_SESSION['event']."";
	$result=mysql_query($query) or die(mysql_error());
	if($result) {
		
		echo "<h2>Maximum no of participants set to ".$max."</h2>";
		}
	}
	include'footer.php';
?>