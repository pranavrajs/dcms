<?php
require "connect.inc.php";
require "core.inc.php";
		 if(!loggedin() ) {
 		
				header('Location:index.php');
 		}
if(!isset($_POST['submit'])) {
	 include('header.php'); 	
	if($_SESSION['adm_lvl']==0) {
			$query="SELECT id,fname,lname FROM stud_reg WHERE event=0 and level=4 and valid=1";
			$result=mysql_query($query);
			if($result)
			{
				
					
?>
				<div class="row">
	<div class="col-lg-12">
		
<legend>Enter student details</legend>
<fieldset>

	<form action="add-managers.php" method="POST"class="form-horizontal">
<table class="table table-striped table-bordered bootstrap-datatable ">
	<tr>
		<td style="width:30%"> Name </td>
		<td>		
		<select name="cl_name" class="form-control">
			<?php 
while($res=mysql_fetch_array($result)) {
			echo "<option value=".$res['id'].">".$res['fname']." ".$res['lname']."</option>";
						
	}
?></select>		
		</td>	
	</tr>
	<tr>
		<td>Email Alias</td>
		<td>

<div class="input-group">
  <input type="text" class="form-control" placeholder="Email Id" name="email_drs">
  <span class="input-group-addon" id="basic-addon2">@cetdhwani.com</span>
</div>





		</td>
	</tr>
	<tr>
		<td> Event </td>
		<td>
		<select name="event" class="form-control">
<?php 
	$q2="SELECT name,id FROM events ";
	$r2=mysql_query($q2);	
	while($res=mysql_fetch_array($r2)) {
			echo "<option value=".$res['id'].">".$res['name']."</option>";			
	}
?>
	</select>

</table>

<div class="form-actions">
	<input type="submit" class="btn btn-primary"name="submit" value="Register">
</div>
</form>
</fieldset>
	<?php
				
			}
	}
	else 
		header('Location:index.php');
}
else 
{
	if(isset($_POST['cl_name'])&&isset($_POST['event'])&&isset($_POST['email_drs'])) {
			$email_drs=$_POST['email_drs']."@cetdhwani.com";
			$query="UPDATE stud_reg SET event =".$_POST['event'].",email_drs='".$email_drs."' WHERE id=".$_POST['cl_name']."";
			$result=mysql_query($query);
			if($result) {
					$q2="SELECT * From stud_reg WHERE id=".$_POST['cl_name']."";
					$r2=mysql_query($q2) or die(mysql_error());
					if($r2)
					{
						$row=mysql_fetch_array($r2);
						$to=$row['email'];
						$name=$row['fname']." ".$row['lname'];
						$subject="Login Enabled at CETDHWANI.COM";
$message=<<<EOD
Hi $name,<br>
Your login has been enabled .<br>
Please login here and complete the details about your event :)
<br><br>
<br>Email alias : $email_drs
<br> You can use this for official use .
<br>All mail will be forwarded to $to .
<br>You can send email with this alias on logging into   
<a href="http://cetdhwani.com/dcms/">Dhwani Event Manager Login</a>
<br>
Your login id is your email and password is the one you have given at signup.<br>
Feel free to contact me regarding any doubt in website.<br>
Phone : +91-9567125807<br>
Email : kmjayadeep@gmail.com<br> 
Thank You<br>
<br>
Jayadeep K M<br>
EOD;
$header = "MIME-Version: 1.0 \r\n";
$header .= "Content-type: text/html; charset=iso-8859-1 \r\n";
$header .= "From:admin@cetdhwani.com \r\n";
$send_mail = mail ($to,$subject,$message,$header);
   if( $send_mail == true )  
   {
   	$send = mail("kmjayadeep@gmail.com",$subject,$message,$header);

//$send = mail("anoopsasidharan92@gmail.com",$subject,$message,$header);

      echo "Message sent successfully...";
   }
   else
   {
      echo "Message could not be sent...";
   }
					}
					header('Location:index.php');			
			}
			else {
					echo"error";				
				}
	}
}

?>
</div>
</div>
<?php include('footer.php'); ?>