<?php
	require'core.inc.php';
	require'connect.inc.php';
	if($_SESSION['adm_lvl']!=4 || $_SESSION['adm_lvl']!=0)
		$check=0;
	else 
		$check=1; 
	if(!loggedin() || $check)
		header('Location:index.php');
	include'header.php';
	if(!isset($_GET['var'])) {
			if(!isset($_POST['submit'])) {
?>
<div class="box span12">
	<div class="box-content">
	<legend>Edit Event Details</legend>	
	<form action="eve_edit.php" method="POST">
	<table class="table table-striped table-bordered bootstrap-datatable ">
		<tr>
			<td>Select an event</td>
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
					$query="SELECT * FROM events WHERE id=".$_POST['eve']."";
					$result=mysql_query($query);
					$res=mysql_fetch_array($result);					
					?>
					<div class="box span12">
	<div class="box-content">
		
<legend>Edit details of <?php echo $res['name'];?></legend>
<fieldset>

	<form action="eve_process.php" method="POST"class="form-horizontal">
<table class="table table-striped table-bordered bootstrap-datatable ">
	<tr>
	<td>Name of the event</td>
	<td>	<input type="text" name='name' readonly value="<?php echo $res['name'];?>"></td>
</tr>

<tr>
	<td><b>Event Description</b><p style="width:230px; text-align:justify;">(Donot copy text and paste it here. Type the text because copying cause different formatting of text. Dont use font and font size option here . It may lead
	to different appearence in drishti website .)</p></td>
	<td><textarea class="ckeditor"  name='descr'><?php echo $res['descr'];?></textarea></td>
</tr>
<tr>
	<td><b>Rules and Regulations</b> <p style="width:230px; text-align:justify;">(Donot copy text and paste it here. Type the text because copying cause different formatting of text. Dont use font and font size option here . It may lead
	to different appearence in drishti website .)</p></td>
	<td><textarea class="ckeditor" name='eve_format'><?php echo $res['eve_format'];?></textarea></td>
</tr>

<?php
if($res['group']==7 || $res['id']==26)
{
?>
<tr>
	<td><b>Problem Statement</b> <p style="width:230px; text-align:justify;">(Donot copy text and paste it here. Type the text because copying cause different formatting of text. Dont use font and font size option here . It may lead
	to different appearence in drishti website .)</p></td>
	<td><textarea class="ckeditor" name='pbm_stat'><?php echo $res['pbm_stat'];?></textarea></td>
</tr>

<?php
}
	if($res['prize1']) 
		$read="readonly";
	else 
		$read="";
?>
<tr>
	<td><b>First Prize Money</b><p style="width:230px; text-align:justify;">(You can update this only once) </p></td>
	<td><input type="text" name='prize1' <?php echo $read; ?> value="<?php echo $res['prize1'];?>">	</td>
</tr>
<tr>
	<td><b>Second Prize Money</b><p style="width:230px; text-align:justify;">(You can update this only once )</p></td>
	<td>	<input type="text" name='prize2' <?php echo $read; ?> value="<?php echo $res['prize2'];?>"></td>
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
			}
	}
	else {
					if($_SESSION['adm_lvl']==4) 
						$id=$_SESSION['event'];
					else 
						$id=$_GET['var'];		
					$query="SELECT * FROM events WHERE id=".$id."";
					$result=mysql_query($query);
					$res=mysql_fetch_array($result);					
					?>
					<div class="box span12">
	<div class="box-content">
		
<legend>Edit details of <?php echo $res['name'];?></legend>
<fieldset>

	<form action="eve_process.php" method="POST"class="form-horizontal">
<table class="table table-striped table-bordered bootstrap-datatable ">
	<tr>
	<td>Name of the event</td>
	<td>	<input type="text" name='name' readonly value="<?php echo $res['name'];?>"></td>
</tr>

<tr>
	<td><b>Event Description</b><p style="width:230px; text-align:justify;">(Donot copy text and paste it here. Type the text because copying cause different formatting of text. Dont use font and font size option here . It may lead
	to different appearence in drishti website .)</p></td>
	<td><textarea class="ckeditor"  name='descr'><?php echo $res['descr'];?></textarea></td>
</tr>
<tr>
	<td><b>Rules and Regulations</b> <p style="width:230px; text-align:justify;">(Donot copy text and paste it here. Type the text because copying cause different formatting of text. Dont use font and font size option here . It may lead
	to different appearence in drishti website .)</p></td>
	<td><textarea class="ckeditor" name='eve_format'><?php echo $res['eve_format'];?></textarea></td>
</tr>
<?php
if($res['group']==7 || $res['id']==26)
{
?>
<tr>
	<td><b>Problem Statement</b> <p style="width:230px; text-align:justify;">(Donot copy text and paste it here. Type the text because copying cause different formatting of text. Dont use font and font size option here . It may lead
	to different appearence in drishti website .)</p></td>
	<td><textarea class="ckeditor" name='pbm_stat'><?php echo $res['pbm_stat'];?></textarea></td>
</tr>
<?php
}
	if($res['prize1']) 
		$read="readonly";
	else 
		$read="";
?>
<tr>
	<td><b>First Prize Money</b><p style="width:230px; text-align:justify;">(You can update this only once) </p></td>
	<td><input type="text" name='prize1' <?php echo $read; ?> value="<?php echo $res['prize1'];?>">	</td>
</tr>
<tr>
	<td><b>Second Prize Money</b><p style="width:230px; text-align:justify;">(You can update this only once )</p></td>
	<td>	<input type="text" name='prize2' <?php echo $read; ?> value="<?php echo $res['prize2'];?>"></td>
</tr>
</table>	
<div class="form-actions">
	<input type="submit" class="btn btn-primary"name="submit" value="Submit">
</div>
</form>
</fieldset>
		
<?php
	}
	include'footer.php';

?>