<?php
require'core.inc.php';
require'connect.inc.php';
if($_SESSION['adm_lvl']!=1|| $_SESSION['adm_lvl']!=0)
		$check=0;
	else 
		$check=1; 
	if(!loggedin() || $check)
		header('Location:index.php');
	include 'header.php';

if(isset($_POST['submit'])) {
	$query="INSERT INTO college (CollegeName) VALUES ('".$_POST['college']."')";
	$result=mysql_query($query) or die(mysql_error());
	header('Location:index.php');
}
?>
<div class="box span12">
<div class="box-content">
<fieldset>
<legend>Add New College </legend>
<form action="<?php $current_file; ?>" method="POST">
	<table class="table table-striped table-bordered bootstrap-datatable ">
<tr>
	<td>Name of the College</td>
	<td>	<input type="text" name='college'></td>
</tr>
</table>
<div class="form-actions">
	<input type="submit" class="btn btn-primary"name="submit" value="Submit">
</div>
</form>
</div>
</div>
<?php include'footer.php';?>