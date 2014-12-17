<?php
	require 'core.inc.php';
	require'connect.inc.php';
	if($_SESSION['adm_lvl']!=4 || $_SESSION['adm_lvl']!=0)
		$check=0;
	else 
		$check=1; 
	if(!loggedin() || $check)
		header('Location:index.php');
	include'header.php';
	$query="SELECT * FROM stud_reg WHERE email='".$_SESSION['email']."'";
	$result=mysql_query($query) or die(mysql_error());
	if($result)
	{
		
			$res=mysql_fetch_array($result) or die(mysql_error());
?>
	<div class="box span12">
		<div class="box-content">
		<legend>Send Mail</legend>
			<p style="color:red;">Use this mail only when needed .</p>
			<br>	
			<form action="mail.php" method="POST">
				<table class="table table-striped table-bordered bootstrap-datatable ">
					<tr>
						<td>From 
						<td><input type="email" readonly name="fromemail" value="<?php echo $res['email_drs'];?>"></td>
					</tr>
					<tr>
						<td>To</td>
						<td><input type="email" name="to"></td>
					</tr>
					<tr>
						<td>Subject</td>
						<td><input type="text" name="subject"></td>
					</tr>
					<tr>
						<td>Body</td>
						<td><textarea class="cleditor" name="body"></textarea></td>
					</tr>
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