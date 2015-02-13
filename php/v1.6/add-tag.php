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
		$tag = $_POST['tag'];

			$query = "INSERT INTO tags VALUES(NULL,'".$tag."')";
			$result=mysql_query($query) or die(mysql_error());
			if($result) 
			{
			//header('Location:index.php');
			}
		else {
			echo"ERROR";
		}
	}	
?>
<div class="box span12">
<div class="box-content">
<fieldset>
<legend>Add Tags</legend>
<form action="add-tag.php" method="POST">
<table class="table table-striped table-bordered bootstrap-datatable ">
<tr>
	<td>Tag </td>
	<td>	<input type="text" class="form-control" name='tag'></td>
</tr>
</table>	
<div class="form-actions">
	<input type="submit" class="btn btn-primary"name="submit" value="Submit">
</div>
</form>
</fieldset>
</div>
</div><br/>
<div class="panel panel-default">
 <div class="panel-heading">
    <h3 class="panel-title">Tags</h3>
  </div>
	<div class="panel-body">	<ul>
	<?php

		$q = "SELECT * FROM tags";
		$r = mysql_query($q);
		while($res = mysql_fetch_array($r)){
			echo '<li>'.$res['tag'].'</li>';
		}

		 ?>
		 </ul>
	</div>
</div>
<?php
	include'footer.php';
?>