<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	if(!isset($_GET['id'])||!loggedin())	
	{
			header('Location :index.php');	
	}
	else {
				$query="SELECT * FROM  students WHERE drishti_id='".$_GET['id']."'";
				$result=mysql_query($query) or die(mysql_error());
				$num=mysql_num_fields($result);
				if($num)
				{
					$row=mysql_fetch_array($result);
					$id=$row["drishti_id"];
					$name=$row["name"];
					$college=$row["college"];
					$email=$row["email"];
					$phone1=$row["phone"];
					$phone2=$row["phone2"];
					$acc=$row["accomodation"];
					$pay=$row["pay_bit"];
					include"header.php";
		?>
	<script type="text/javascript" >
window.onload = function(){
	
	
$('#pay').click(function (){

	var selected = parseInt(jQuery(this).val());

	switch(selected) {
		case 0:
		$("#events").hide("slow");		
		$("#workshops").hide("slow");
		break;
		case 1:
		$("#events").show(1000);		
		$("#workshops").hide("slow");
		break;
		case 2:		
		$("#events").show(1000);		
		$("#workshops").hide("slow");
		break;
		case 3:		
		$("#events").show(1000);		
		$("#workshops").show(1000);
		break;
		case 4:
		$("#events").show(1000);		
		$("#workshops").show(1000);
		break;	
		case 5:
		$("#workshops").show(1000);
		$('#events').hide("slow");
		break;	
		default:		
		break;
	}
});
}
</script>
<div class="box span12">
	<div class="box-content">
		<legend>Edit Details # <?php echo $name; ?></legend>			
		<form action="editprocess.php" method="POST"class="form-horizontal">
				<table class="table table-striped table-bordered bootstrap-datatable ">
					<tr>
						<td> Dristhi ID </td>
							<td>	<?php echo "	<input readonly  name=\"drishti_id\"   type=\"text\" value = \"$id\"placeholder=\"Drishti ID\"  /></td>	"?>
					</tr>
					<tr>
						<td> Name </td>
							<td>	<?php echo "	<input readonly  name=\"name\"   type=\"text\" value = \"$name\"placeholder=\"Name\"  /></td>	"?>
					</tr>
					<tr>
						<td> Email </td>
							<td>	<?php echo "	<input readonly  name=\"email\"   type=\"text\" value = \"$email\"placeholder=\"Email\"  /></td>	"?>
					</tr>
					<tr>
						<td> College </td>
							<td>	
								<select name="college" id="selectError" data-rel="chosen">
									<?php 
											$query="SELECT * FROM college ORDER BY CollegeId ASC";
											$result=mysql_query($query) or die(mysql_error());
											if(mysql_num_rows($result)or die(mysql_error())){
												while($res=mysql_fetch_array($result)) {
														if($res["CollegeId"]==$college)
																$selected_variable="selected";
														else
																$selected_variable="";
														echo "<option $selected_variable value=".$res['CollegeId'].">".$res['CollegeName']."</option>";
												}
											}
										?>
								</select>
							</td>				
					</tr>
					<tr>
						<td> Phone </td>
							<td>	<?php echo "	<input name=\"phone\"   type=\"text\" value = \"$phone1\"placeholder=\"Phone\"  /></td>	"?>
					</tr>
					<tr style="visibility:hidden;display:none;">
						<td style="visibility:hidden;"> Phone 2</td>
							<td>	<?php echo "	<input name=\"phone2\" style=\"visibility:hidden;\"  type=\"text\" value = \"$phone2\"placeholder=\"Phone2\"  /></td>	"?>
					</tr>
					<tr>
						<td> Accomodation </td>
							<td><select name="accomodation">
<?php 
if($acc==1) 
	echo "<option value=\"0\"> No accomodation</option><option selected value=\"1\"> Male accomodation</option><option value=\"2\"> Female accomodation</option>";
elseif($acc==2) 
	echo "<option value=\"0\"> No accomodation</option><option value=\"1\"> Male accomodation</option><option selected value=\"2\"> Female accomodation</option>";
else 
	echo "<option selected value=\"0\"> No accomodation</option><option value=\"1\"> Male accomodation</option><option value=\"2\"> Female accomodation</option>";

?>
	
</select>
	</td>
					
					</tr>
					<tr>
						<td> Payment Details </td>		
								<td>
										<select name="payment" id="pay" multiple="multiple">
	
<?php 
if($pay==1) 
	echo "<option value=\"0\">No Payment</option><option selected value=\"1\"> Paid Rs.150</option><option value=\"2\">Paid Rs.200</option><option value=\"3\"> Rs.150 + Workshop</option><option value=\"4\"> Rs.200 + Workshop</option><option value=\"5\"> Workshop Only</option>";
elseif($pay==2) 
	echo "<option value=\"0\">No Payment</option><option value=\"1\"> Paid Rs.150</option><option selected value=\"2\">Paid Rs.200</option><option value=\"3\"> Rs.150 + Workshop</option><option value=\"4\"> Rs.200 + Workshop</option><option value=\"5\"> Workshop Only</option>";
elseif($pay==3)
	echo "<option value=\"0\">No Payment</option><option value=\"1\"> Paid Rs.150</option><option value=\"2\">Paid Rs.200</option><option selected value=\"3\"> Rs.150 + Workshop</option><option value=\"4\"> Rs.200 + Workshop</option><option value=\"5\"> Workshop Only</option>";
elseif($pay==4) 
	echo "<option value=\"0\">No Payment</option><option value=\"1\"> Paid Rs.150</option><option value=\"2\">Paid Rs.200</option><option value=\"3\"> Rs.150 + Workshop</option><option selected value=\"4\"> Rs.200 + Workshop</option><option value=\"5\"> Workshop Only</option>";
elseif($pay==5) 
	echo "<option value=\"0\">No Payment</option><option value=\"1\"> Paid Rs.150</option><option value=\"2\">Paid Rs.200</option><option value=\"3\"> Rs.150 + Workshop</option><option value=\"4\"> Rs.200 + Workshop</option><option selected value=\"5\"> Workshop Only</option>";
else 
	echo "<option  selected value=\"0\">No Payment</option><option value=\"1\"> Paid Rs.150</option><option value=\"2\">Paid Rs.200</option><option value=\"3\"> Rs.150 + Workshop</option><option value=\"4\"> Rs.200 + Workshop</option><option value=\"5\"> Workshop Only</option>";

?>
										</select>			
						</td>					
					</tr>
					<tr>
					<td>Events</td>
					<td>	
					
<?php
					$stack=array();			
					$query="SELECT eve_id FROM event_reg WHERE drs_id=".$id."";
					$result=mysql_query($query);
					$num=mysql_num_rows($result);
					if($num)
					{
								while($res=mysql_fetch_array($result)) {
											array_push($stack,$res['eve_id']);								
								}
					}
?>
					<div id="events">
				
							<table>
							<tr><td><b>EVENTS</b></td><td></td></tr>
								<?php 
					
				
					$query="SELECT * FROM events ORDER BY events.group ASC";
					$result=mysql_query($query) or die(mysql_error());
					$num=mysql_num_rows($result);
					if($num)
					{	
							$gp=0;
							while($res=mysql_fetch_array($result)) 
							{	
								
								if($res['group']!=0 && $res['group']!=21 && $res['group']!=10  && $res['group']!=20)
								{
									if($gp!=$res['group'])
										{$gp=$res['group'];
											echo "<tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr>";
										}
									if(in_array($res['id'],$stack))
									{	
									
										echo"<tr>";
										echo "<td>".$res['name']."</td>";
										echo "<td>Registered</td>";
										$q3="SELECT report FROM event_reg WHERE eve_id = ".$res['id']." AND drs_id= ".$id."";
										$r3=mysql_query($q3);
										if($r3)
										{
											$rr=mysql_fetch_array($r3);
											if($rr['report']!=1) 									
											echo"<td><a href=\"deleve.php?id=".$id."&eve=".$res['id']."\">Remove</a></td>";
											else 
												echo "<td>Reported</td>";									
										}
										echo '</tr>';	
									}
							//		$checked="checked";
									else 
									{
										
										echo"<tr>";
										echo "<td>".$res['name']."</td>";
										echo "<td><input type=\"checkbox\"  name=\"eve_arr[]\" value='".$res['id']."'  /></td>";	
										echo '</tr>';	
								//	$checked="";
									}
								}							
										
							}		
					}
				
					?>		
			</table>	
			</div>		
			<div id="workshops">
				<table>
				<tr><td></td><td></td></tr><tr><td><b>WORKSHOPS</b></td><td></td></tr><tr><td></td><td></td></tr>
					<?php
					
				$query="SELECT * FROM events WHERE events.group = 20 ORDER BY events.group ASC";
					$result=mysql_query($query) or die(mysql_error());
					$num=mysql_num_rows($result);
					if($num)
					{	
							$gp=0;
							while($res=mysql_fetch_array($result)) 
							{	
									if(in_array($res['id'],$stack))
									{	
									
										echo"<tr>";
										echo "<td>".$res['name']." <td> Rs.".$res['prize1']."</td><td>";
										echo "<td>Registered</td>";
										$q3="SELECT report FROM event_reg WHERE eve_id = ".$res['id']." AND drs_id= ".$id."";
										$r3=mysql_query($q3);
										if($r3)
										{
											$rr=mysql_fetch_array($r3);
											if($rr['report']!=1) 									
											echo"<td><a href=\"deleve.php?id=".$id."&eve=".$res['id']."\">Remove</a></td>";
											else 
												echo "<td>Reported</td>";									
										}
										echo '</tr>';	
									}
							//		$checked="checked";
									else 
									{
										
										echo"<tr>";
										echo "<td>".$res['name']."<td> Rs. ".$res['prize1']."</td></td>";
										echo "<td><input type=\"checkbox\"  name=\"eve_arr[]\" value='".$res['id']."'  /></td>";	
										echo '</tr>';	
								//	$checked="";
									}
															
										
							}		
					}
					?>				
				</table>			
			</div>	
					</td>					
					</tr>
					</table>
					
					
<div class="form-actions">
	<input type="submit" class="btn btn-primary"name="submit" value="Register">
</div>
</form>

	</div>
</div>

<?php  } }?>

<?php include('footer.php'); ?>