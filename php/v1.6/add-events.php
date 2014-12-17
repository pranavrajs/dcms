<?php
	require'core.inc.php';
	require'connect.inc.php';
	if(!loggedin() ) {
				header('Location:index.php');
 		}
	include'header.php';
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['name'])&& !empty($_POST['sname'])&& !empty($_POST['descr'])&& !empty($_POST['eve_format']))
		{
			if(empty($_POST['prize1']))
					$prize1='0';
			else 
					$prize1=$_POST['prize1'];	
			if(empty($_POST['prize2']))
					$prize2='0';
			else 	
					$prize2=$_POST['prize2'];
				$sname=addslashes($_POST['sname']);

				$descr=mysql_real_escape_string($_POST['descr']);
				$eve_format=mysql_real_escape_string($_POST['eve_format']);
				$name=mysql_real_escape_string($_POST['name']);
				$pbm=mysql_real_escape_string($_POST['pbmstat']);
			$query="INSERT INTO events (descr,name,eve_format,prize1,prize2,eve_sname) VALUES ('".$descr."','".$name."','".$eve_format."','".$prize1."','".$prize2."','".$sname."')";
			$result=mysql_query($query) or die(mysql_error());
			if($result) 
			{
			header('Location:index.php');
			}
		}	
		else {
			echo"ERROR";
		}
	}	
?>
<div class="box span12">
<div class="box-content">
<fieldset>
<legend>Add Event Details</legend>
<form action="add-events.php" method="POST">
<table class="table table-striped table-bordered bootstrap-datatable ">
<tr>
	<td>Name of the event</td>
	<td>	<input type="text" name='name'></td>
</tr>
<tr>
	<td>Short name of the event</td>
	<td>	<input type="text" name='sname'></td>
</tr>

<tr>
	<td>Event Description</td>
	<td><textarea class="ckeditor"  name='descr'></textarea></td>
</tr>
<tr>
	<td>Rules and Regulations</td>
	<td><textarea class="ckeditor" name='eve_format'></textarea></td>
</tr>
<tr>
	<td>Link to problem Statement</td>
	<td><input type="text" name='pbmstat'></td>
</tr>
<tr>
	<td>First Prize</td>
	<td><input type="text" name='prize1'>	</td>
</tr>
<tr>
	<td>Second Prize</td>
	<td>	<input type="text" name='prize2'></td>
</tr>
</table>	
<div class="form-actions">
	<input type="submit" class="btn btn-primary"name="submit" value="Submit">
</div>
</form>
</fieldset>
</div>
</div>
<?php
	include'footer.php';
?>