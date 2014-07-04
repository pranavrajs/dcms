<?php
require "core.inc.php";
require "connect.inc.php";
   	 if(!loggedin() ) {
 		
				header('Location:index.php');
 		}
	 
 include('header.php'); 
?>
<div class="box span6">

	<div class="box-content">
		
<legend>DashBoard</legend>
<?php
			if($_SESSION['adm_lvl']==4) {
				
				?>
						<h4>Instructions</h4>
					<p></p>
					<b>Contact me </b>for assistance 
					<br>Email : <b>pranavrajs@gmail.com</b>
					<br>Phone : <b>9446284490</b>
				
					
					</p>
					 1 -Once you update the prize with a value. <br>You will not be able to edit any more and the prize you set will be shown in the website<br>
					If you dont want to add prize now , leave it as zero itself .<br> Any other changes might result in uneditable condition .
									
					</p>
					<p>2- Dont use font(size , face ) option. <br>
3- Use mail only for official purposes (A copy of the mail you sent is kept in the database  )<br>
4- Check your mail regularly (Mail sent to yourname@cetdrishti.com will be forwarded to your personal mail also.)</p>
  	</div>
</div>
<div class="box span6">

	<div class="box-content">
	<legend>No of Participants</legend>
	<p>Total no of participants reported at Drishti&#34;13 : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit != 0";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
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
</div>
</div>				
<div class="box span6">

	<div class="box-content">
	<legend>Important Contacts</legend>
				<p class="conv_h">Event :  Sachin Murali 9037519753</p>
				<p class="conv_h"> Program : Anoop Sasidharan 8547359193</p>
				<p class="conv_h">Publicity   : Arjun Balachandran 9746850206</p>
				<p class="conv_h">Sponsorship : Rohit Krishnakumar 9995629261</p>
				<p class="conv_h">Finance : Muhammed Ibrahim 9947423207</p>
				<p class="conv_h"> Technical : Sheen Jacob 9946820574</p>				
				<p class="conv_h">Event Co-Convenor : Anita Joseph 9037744982</p>
				<p class="conv_h">Expo Head : Amal B Nair 9446866422</p>
				<p class="conv_h"> Hospitality :  Jithin T 9747067719 </p>
				<p class="conv_h">Site Designer : Nithin David T </p>
				<p class="conv_h">Site Designer : Pranav Raj S </p>
				
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
							
					<b>Contact me </b>for assistance 
					<br>Email : <b>pranavrajs@gmail.com</b>
					<br>Phone : <b>9446284490</b>
				
					<p>Total Registration : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit != 0";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
			}
	?>
	</p>	
				</div></div>
				<div class="box span6">

	<div class="box-content">
	
	<legend>Important Contacts</legend>
				<p class="conv_h">Event :  Sachin Murali 9037519753</p>
				<p class="conv_h"> Program : Anoop Sasidharan 8547359193</p>
				<p class="conv_h">Publicity   : Arjun Balachandran 9746850206</p>
				<p class="conv_h">Sponsorship : Rohit Krishnakumar 9995629261</p>
				<p class="conv_h">Finance : Muhammed Ibrahim 9947423207</p>
				<p class="conv_h"> Technical : Sheen Jacob 9946820574</p>				
				<p class="conv_h">Event Co-Convenor : Anita Joseph 9037744982</p>
				<p class="conv_h">Expo Head : Amal B Nair 9446866422</p>
				<p class="conv_h"> Hospitality :  Jithin T 9747067719 </p>
				<p class="conv_h">Site Designer : Nithin David T </p>
				<p class="conv_h">Site Designer : Pranav Raj S </p>
				
</div>
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
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
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
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
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
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
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
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	<p>Wokshop Only Registration : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit = 5";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	<p>Workshop + 200 Registration : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit = 4";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	<p>Workshop +150  Registration : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit = 3";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	<p>200 Registration : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit = 2";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
			}
	?>
	</p><p>150 Registration : 
	<?php
			$query = "SELECT COUNT(*) FROM students WHERE pay_bit = 1";
			$result = mysql_query($query);
			if($result)
			{
				$res=mysql_fetch_array($result);
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
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
				echo "<span class=\"label label-sucess\">  ".$res[0]." </span>";			
			}
	?>
	</p>
	</div>
	</div>
<div class="box span6">

	<div class="box-content">
	<legend>Important Contacts</legend>
				<p class="conv_h">Event :  Sachin Murali 9037519753</p>
				<p class="conv_h"> Program : Anoop Sasidharan 8547359193</p>
				<p class="conv_h">Publicity   : Arjun Balachandran 9746850206</p>
				<p class="conv_h">Sponsorship : Rohit Krishnakumar 9995629261</p>
				<p class="conv_h">Finance : Muhammed Ibrahim 9947423207</p>
				<p class="conv_h"> Technical : Sheen Jacob 9946820574</p>				
				<p class="conv_h">Event Co-Convenor : Anita Joseph 9037744982</p>
				<p class="conv_h">Expo Head : Amal B Nair 9446866422</p>
				<p class="conv_h"> Hospitality :  Jithin T 9747067719 </p>
				<p class="conv_h">Site Designer : Nithin David T </p>
				<p class="conv_h">Site Designer : Pranav Raj S </p>
				
</div>
</div>	
				<?php
								
				}
	?>


<?php include('footer.php'); ?>