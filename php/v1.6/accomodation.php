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
	if(isset($_POST['submit'])) {
			$query="SELECT drishti_id,name,phone,phone2 FROM students WHERE accomodation=".$_POST['acc']."";
			$result=mysql_query($query) or die(mysql_error());	
			$num=mysql_num_rows($result);
			if($num)
			{
			?>
<div class="row-fluid sortable">		
	<div class="box span12">
			<div class="box-header well" data-original-title>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
	<div class="box-content">
		<legend><?php 
			if($_POST['acc']==1)	
					echo"Male Accomodation ";	
			else if($_POST['acc']==2) 
					echo"Female Accomodation ";
			else 
					echo "No accomodation ";		
		?>Details</legend>			
				
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
			<thead>			
			<tr>
				<th>Drishti ID</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Secondary Phone</th>			
			</tr>
			</thead>
			<tbody>				
<?php
			while($res=mysql_fetch_array($result))
				{
					echo "<tr>";
					echo "<td class=\"center\"> DRS".$res['drishti_id']."</td>";
					echo "<td class=\"center\">".$res['name']."</td>";
					echo "<td class=\"center\"> ".$res['phone']."</td>";
					echo "<td class=\"center\"> ".$res['phone2']."</td>";
					echo "</tr>";			
				}
?>		
		</tbody>
		</table>
	</div>
</div>
</div>
<?php				
			}
		
	}	
	else {	
?>
<div class="box span12">
	<div class="box-content">
	<legend>Accomodation Details</legend>	
	<form action="accomodation.php" method="POST">
	<table class="table table-striped table-bordered bootstrap-datatable ">
		<tr>
			<td>Select a value </td>
			<td>		<select name="acc">
						<option value="0"> No accomodation</option>
						<option value="1"> Male accomodation</option>
						<option value="2"> Female accomodation</option>
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

include'footer.php';
?>