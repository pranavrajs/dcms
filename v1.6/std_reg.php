<?php
	require 'connect.inc.php';
	require "core.inc.php";
	if($_SESSION['adm_lvl']!=1 || $_SESSION['adm_lvl']!=0 || $_SESSION['adm_lvl']!=2)
		$check=0;
	else 
		$check=1; 
	if(!loggedin() || $check)
		header('Location:index.php');
		 
 	include('header.php'); 
	if(isset($_POST['submit'])) {
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$phone2 = $_POST['phone2'];
		$college = $_POST['college'];
		$acc = $_POST['accomodation'];
		$pay_bit=$_POST['payment'];		
		if(!empty($name)&&!empty($email)&&!empty($phone)&&!empty($phone)&&!empty($college)) {
				$query="SELECT * FROM students WHERE email='$email'";
				$result=mysql_query($query);
				if(mysql_num_rows($result)){
					echo "<div class=\"alert alert-info\">
									".$email." already registered 
					</div>";
				}
	
					$query="INSERT INTO students (name,password,email,college,phone,phone2,accomodation,valid,reg_bit,pay_bit)VALUES('$name','0','$email','$college','$phone','$phone2','$acc','0','1','$pay_bit')";
					$result=mysql_query($query) or die(mysql_error());
					if($result) {
						$query="SELECT drishti_id FROM students WHERE email='$email'";
						$result=mysql_query($query) or die(mysql_error());
						$res=mysql_fetch_array($result) or die(mysql_error());			
						foreach ($_POST["eve_arr"] as $row )
						{
								$query2="INSERT INTO event_reg (eve_id,drs_id) VALUES ('".$row."','".$res['drishti_id']."')";	
								$result=mysql_query($query2) or die(mysql_error());
				
						}
						header('Location:stud_det.php?var='.$res['drishti_id'].'');
					}
					else {
						echo "<div class=\"alert alert-info\">
									Error in processing :(  
					</div>";
						}
					}			
				else {
						echo "<div class=\"alert alert-info\">
									All fields are required. 
					</div>";
				}
		}

?>
<style type="text/css">
.hideblock
{
	display :none;
	visibility : hidden;
}
</style>
<script type="text/javascript" >
window.onload = function(){
	
$('#pay').change(function (){

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
		
<legend>Enter student details</legend>
<fieldset>

	<form action="std_reg.php" method="POST"class="form-horizontal">
<table class="table table-striped table-bordered bootstrap-datatable ">
	<tr>
		<td> Name </td>
		<td>		<input name="name"  type="text" placeholder="Name"  /></td>	
	</tr>
	<tr>
		<td> College </td>
		<td><select name="college"  id="selectError" data-rel="chosen">
<?php 
	$query="SELECT * FROM college ORDER BY CollegeId ASC";
				$result=mysql_query($query) or die(mysql_error());
				if(mysql_num_rows($result)or die(mysql_error())){
					while($res=mysql_fetch_array($result)) {
							echo "<option value=".$res['CollegeId'].">".$res['CollegeName']."</option>";
						}
				}
?>
</select>
</td>	
	</tr>
	<tr>
		<td> Email </td>
		<td>		<input name="email"  type="email" placeholder="Email"    /></td>	
	</tr>
	<tr>
		<td> Phone </td>
		<td>		<input name="phone"  type="text" placeholder="Phone1"  /></td>	
	</tr>
	<tr style="display:none;">
		<td style="visibility:hidden;"> Secondary Phone </td>
		<td>		<input   name="phone2"  type="text" placeholder="Phone2"   /></td>	
	</tr>			
	<tr>
		<td> Accomodation </td>
		
		<td>
		<select name="accomodation">
						<option value="0"> No accomodation</option>
						<option value="1"> Male accomodation</option>
						<option value="2"> Female accomodation</option>
				</select>
		</td>	
	</tr>			
	<tr>
		<td> Payment </td>
		<td>
<select name="payment" id="pay" multiple="multiple">
	<option value="0"> No payment</option>
	<option value="1">Rs.150</option>
	<option value="2"> Rs.200</option>
	<option value="3"> Rs.150 + Workshop</option>
	<option value="4"> Rs.200 + Workshop</option>
	<option value="5"> Workshop Only</option>
</select>
		</td>	
	</tr>			
	<tr>
		<td>Events </td>
		<td>
			<div id="events">
			<table>
			<tr><td><b>EVENTS</b></td></td><td></td></tr>
			<?php 
				
					$query="SELECT * FROM events ORDER BY events.group ASC";
					$result=mysql_query($query) or die(mysql_error());
					$num=mysql_num_rows($result);
					if($num)
					{
							$gp=0;
							while($res=mysql_fetch_array($result)) {	
								if($res['group']!=0 && $res['group']!=21  && $res['group']!=10 && $res['group']!=20)
								{
									if($gp!=$res['group'])
									{
										$gp=$res['group'];
										echo "<tr><td></td><td></td></tr><tr><td></td><td></td></tr>";		
									}
									echo"<tr>";
									echo "<td>".$res['name']."</td>";
									echo "<td><input type=\"checkbox\"  name=\"eve_arr[]\" value='".$res['id']."'  /></td>";
									echo '</tr>';	
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
				
					$query2="SELECT * FROM events WHERE events.group = 20 ORDER BY events.group ASC ";
					$result2=mysql_query($query2) or die(mysql_error());
					$num2=mysql_num_rows($result2);
					if($num2)
					{
							while($res=mysql_fetch_array($result2)) {	
									echo"<tr>";
									echo "<td>".$res['name']."<td> Rs. ".$res['prize1']."</td></td>";
									echo "<td><input type=\"checkbox\"  name=\"eve_arr[]\" value='".$res['id']."'  /></td>";
									echo '</tr>';	
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

</fieldset>

</div>
</div>
</div>
<?php include('footer.php'); ?>