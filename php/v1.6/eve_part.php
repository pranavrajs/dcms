<?php
	require'connect.inc.php';
	require'core.inc.php';
	if(!loggedin())
	{
			header('Location:index.php');	
	}
		include'header.php';
		if(!isset($_GET['var']))
			{
				if($_SESSION['adm_lvl']==4) 
					header('Location:eve_part.php?var='.$_SESSION['event'].'');
				if(!isset($_POST['submit'])) {
?>
	<div class="box span12">
	<div class="box-content">
	<legend>Participant Details</legend>	
	<form action="eve_part.php" method="POST">
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
			$query="SELECT * from event_reg left outer join students on students.drishti_id=event_reg.drs_id WHERE eve_id=".$_POST['eve']."";			
			$result=mysql_query($query) or die(mysql_error());	
			$num=mysql_num_rows($result);
				?>
<div class="row-fluid sortable">		
	<div class="box span12">
			<div class="box-header well" data-original-title>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
	<div class="box-content">
	<legend>
	<?php 
		$query2="Select name from events where id=".$_POST['eve']."";
		$result2=mysql_query($query2);
		$row=mysql_fetch_array($result2);
		echo " Registered Participants of ".$row['name'];	
	?>	
	</legend>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
			<thead>			
			<tr>
				<th>Drishti ID</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Secondary Phone</th>		
				<th>Status</th>	
			</tr>
			</thead>
			<tbody>						
<?php
			if($num)
			{
				while($res=mysql_fetch_array($result))
					{
						echo "<tr>";
						echo "<td class=\"center\"> DRS".$res['drishti_id']."</td>";
						echo "<td class=\"center\">".$res['name']."</a></td>";
						echo "<td class=\"center\"> ".$res['phone']."</td>";
						echo "<td class=\"center\"> ".$res['phone2']."</td>";
						if($res['reg_bit']!=2)
						{
						if($res['report']==1)
							echo"<td class=\"center\"> Reported </td>";
						else 
							echo "<td class=\"center\"> Not Reported </td>";
						}
						else
						{
							echo "<td class=\"center\">Cancelled</td>";
						}
						echo "</tr>";			
					}
?>		
		</tbody>
		</table>
	</div>
</div>
</div>

<?php											
								
			}//end of if($num)			
		}//end of else of if not $_POST['submit']
		}//end of if not $_POST['var']
		else {
			$var=$_GET['var'];
			if($_SESSION['adm_lvl']==4)
				$var=$_SESSION['event']; 
			$query="SELECT * from event_reg left outer join students on students.drishti_id=event_reg.drs_id WHERE eve_id=".$var."";			
			$result=mysql_query($query) or die(mysql_error());	
			$num=mysql_num_rows($result);
				?>
<div class="row-fluid sortable">		
	<div class="box span12">
			<div class="box-header well" data-original-title>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
	<div class="box-content">
	<legend>
	<?php 
		$query2="Select name from events where id=".$var."";
		$result2=mysql_query($query2);
		$row=mysql_fetch_array($result2);
		echo " Registered Participants of ".$row['name'];	
	?>	
	</legend>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
			<thead>			
			<tr>
				<th>Drishti ID</th>
				<th>Name</th>
				<th>Phone</th>
				<th>College</th>
				<th>Status</th>	
			</tr>
			</thead>
			<tbody>	
								
<?php
			if($num)
			{
				while($res=mysql_fetch_array($result))
					{
						echo "<tr>";
						echo "<td class=\"center\"> DRS".$res['drishti_id']."</td>";
						echo "<td class=\"center\">".$res['name']."</td>";
						echo "<td class=\"center\"> ".$res['phone']."</td>";
						$q2="SELECT CollegeName FROM college WHERE CollegeId ='".$res['college']."'";
						$r2=mysql_query($q2) or die(mysql_error());
						if($q2)
						{
						$rr=mysql_fetch_array($r2);
						echo "<td class=\"center\">".$rr['CollegeName']."</td>";
						}
						if($res['pay_bit']==0) {							
										echo"<td class=\"center\"> Not Paid </td>";
						}
						else {								
							if($res['reg_bit']!=2)
							{
								if($res['report']==1)
										echo"<td class=\"center\"> Reported </td>";
								else { 
										if($_SESSION['adm_lvl']==4) {
													echo "<td class=\"center\"><a class=\"btn btn-info\" href=\"report.php?id=".$res['drishti_id']."\">
															<i class=\"icon-edit icon-white\"></i>  
															Report                                            
															</a></td>";		
										}
										else 								
													echo"<td class=\"center\"> Not Reported </td>";
								}	
							}
							else
							{
								echo"<td class=\"center\"> Cancelled Registration </td>";
							}
								
								echo "</tr>";			
						}
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
include'footer.php';
?>