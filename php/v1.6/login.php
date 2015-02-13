<?php
require "core.inc.php";
require "connect.inc.php";
   	 if(!loggedin() ) {
				header('Location:index.php');
 		}
	 
 include('header.php'); 
?>
<div class="row">

	<div class="panel col-md-6">


				<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Dashboard</h3>
  </div>
  <div class="panel-body">
<?php
			if($_SESSION['adm_lvl']==4) {
				
				?>
						<h4>Instructions</h4>
					<p></p>
					<b>Contact </b>for assistance 
					<br>Email : <b>kmjayadeep@gmail.com</b>
					<br>Phone : <b>9567125807</b>
				
					
					</p>
					 1 -Once you update the prize with a value. You will not be able to edit any more and the prize you set will be shown in the website<br>
					If you dont want to add prize now , leave it as zero itself . Any other changes might result in uneditable condition .
									
					</p>
					<p>2- Dont use font(size , face ) option. <br>
3- Use mail only for official purposes (A copy of the mail you sent is kept in the database  )<br>
4- Check your mail regularly (Mail sent to yourname@cetdhwani.com will be forwarded to your personal mail also.)</p>
  	</div>
</div></div>
<div class="col-md-6">

				<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">No of Participants</h3>
  </div>
  <div class="panel-body">
	<p>Total no of participants reported at Dhwani&#34;15 : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit != 0";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-success\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	<p>No of Participant registered : 
	<?php
			$query = "SELECT COUNT(*) FROM event_reg WHERE eve_id = ".$_SESSION['event']."";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-success\"> ".$res[0]." </span>";			
			}
	?>
	</p>
<p>No of Participant reported : 
	<?php
			$query = "SELECT COUNT(*) FROM event_reg WHERE eve_id = ".$_SESSION['event']." AND report = 1";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-warning\"> ".$res[0]." </span>";			
			}
	?>
	</p>
<p>

</p>
</div></div>
</div>				
<div class="col-md-6">
				<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Imporant Contacts</h3>
  </div>
  <div class="panel-body">
				<p class="conv_h">Event: Nithin K 9645910351</p>
				<p class="conv_h">Prgram: Sanid MTP 8289903935</p>
				<p class="conv_h">Sponsorship: Praveen varghese 9496841150</p>
				<p class="conv_h">Publicity: Athul S 9497287287</p>
				<p class="conv_h">Discipline: Shibu KP 9048095705</p>
				<p class="conv_h">Finance: Prathyush PV 8547196825</p>
				<p class="conv_h">Website: Jayadeep KM 9567125807</p>
				<p class="conv_h">Website: Dhananjai Pai 9497796700</p>
				<p class="conv_h">Website: Pranav Raj S 9446284490</p>
  </div>
</div>
		
</div>	

</div>			
				<?php				
				}
	?>
<?php
			if($_SESSION['adm_lvl']==2) {
				
				?>
						
						<h4>Instructions</h4>
						<p>Use Scan QR link to scan from Participant ID</p>
							
					<b>Contact </b>for assistance 
					<br>Email : <b>kmjayadeep@gmail.com</b>
					<br>Phone : <b>9567125807</b>
				
					<p>Total Registration : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit != 0";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-success\">  ".$res[0]." </span>";			
			}
	?>
	</p>	


</div></div></div>
	<div class="col-md-6">
		<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Important Contacts</h3>
  </div>
  <div class="panel-body">


				<p class="conv_h">Event: Nithin K 9645910351</p>
				<p class="conv_h">Prgram: Sanid MTP 8289903935</p>
				<p class="conv_h">Sponsorship: Praveen varghese 9496841150</p>
				<p class="conv_h">Publicity: Athul S 9497287287</p>
				<p class="conv_h">Discipline: Shibu KP 9048095705</p>
				<p class="conv_h">Finance: Prathyush PV 8547196825</p>
				<p class="conv_h">Website: Jayadeep KM 9567125807</p>
				<p class="conv_h">Website: Dhananjai Pai 9497796700</p>
				<p class="conv_h">Website: Pranav Raj S 9446284490</p>


		</div></div>
</div>		
				<?php				
				}
	?>
<?php
			if($_SESSION['adm_lvl']==0) {
				
				?>
				
	<p> Total No of Participants registered : 
<?php
			$query = "SELECT COUNT(*) FROM students";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-success\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	<p> Online Registration : 
<?php
			$query = "SELECT COUNT(*) FROM students WHERE reg_bit = 0";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-success\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	<p> Onsite Registration : 
<?php
			$query = "SELECT COUNT(*) FROM students WHERE reg_bit = 1";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-success\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	<p>Cancelled Registration : 
<?php
			$query = "SELECT COUNT(*) FROM students WHERE reg_bit = 2";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-success\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	<p>Multi Event Registration : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit = 2";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-success\">  ".$res[0]." </span>";			
			}
	?>
	</p><p>Single Event Registration : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit = 1";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-success\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	<p>Total Registration : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit != 0";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-success\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	</div></div></div>
<div class="col-md-6">	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Important Contacts</h3>
  </div>
  <div class="panel-body">
				<p class="conv_h">Event: Nithin K 9645910351</p>
				<p class="conv_h">Prgram: Sanid MTP 8289903935</p>
				<p class="conv_h">Sponsorship: Praveen varghese 9496841150</p>
				<p class="conv_h">Publicity: Athul S 9497287287</p>
				<p class="conv_h">Discipline: Shibu KP 9048095705</p>
				<p class="conv_h">Finance: Prathyush PV 8547196825</p>
				<p class="conv_h">Website: Jayadeep KM 9567125807</p>
				<p class="conv_h">Website: Dhananjai Pai 9497796700</p>
				<p class="conv_h">Website: Pranav Raj S 9446284490</p>
				
</div></div></div>
</div>	
				<?php
								
				}
	?>


<?php include('footer.php'); ?>