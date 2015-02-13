<?php
	require'core.inc.php';
	require'connect.inc.php';
	if(!loggedin() ) {
				header('Location:index.php');
 		}
	include'header.php';
	?>
<script src="ckeditor/ckeditor.js"></script>
	<?
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['name'])&& !empty($_POST['sname']))//&& !empty($_POST['descr'])&& !empty($_POST['eve_format']))
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
				$grp = mysql_real_escape_string($_POST['max_no']);

			$query="INSERT INTO events (`descr`,`name`,`eve_format`,`prize1`,`prize2`,`eve_sname`,`max_no`) VALUES ('".$descr."','".$name."','".$eve_format."','".$prize1."','".$prize2."','".$sname."','".$grp."')";
			$result=mysql_query($query) or die(mysql_error());
			$eve_id = mysql_insert_id();

			if(isset($_POST['tags']))
				$tags = $_POST['tags'];
			else
				$tags = Array();

			if($tags)
			foreach($tags as $t){
				$q = 'INSERT INTO event_tag VALUES(NULL,'.$eve_id.','.$t.')';
				mysql_query($q) or die(mysql_error());
			}


			if($result) 
			{
			//header('Location:index.php');
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
	<td>	<input type="text" class="form-control" name='name'></td>
</tr>
<tr>
	<td>Short name of the event</td>
	<td>	<input type="text"class="form-control" name='sname'></td>
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
	<td><input type="text" name='pbmstat' class="form-control"></td>
</tr>
<tr>
	<td>First Prize</td>
	<td><input type="number" name='prize1' class="form-control">	</td>
</tr>
<tr>
	<td>Second Prize</td>
	<td>	<input type="number" name='prize2' class="form-control"></td>
</tr>
<tr>
	<td>No of People per group (Leave 0 for individual events)</td>
	<td>	<input type="number" name='max_no' class="form-control" value="0"></td>
</tr>



<tr>
	<td>Tags</td>
	<td>

	<select name="tags[]"  multiple="multiple"  class="form-control">
<?php 

$q = "SELECT * FROM tags";
$r = mysql_query($q);
while($res = mysql_fetch_array($r)){
	echo '<option value="'.$res['id'].'">'.$res['tag'].'</option>';
}

?>

	</td>
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