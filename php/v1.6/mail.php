<?php
	require'core.inc.php';
	require'connect.inc.php';
	if($_SESSION['adm_lvl']!=4 || $_SESSION['adm_lvl']!=0)
		$check=0;
	else 
		$check=1; 
	if(!loggedin() || $check)
		header('Location:index.php');
	if(isset($_POST['submit'])){
	if(isset($_POST['to'])&&isset($_POST['fromemail'])&&isset($_POST['body'])&&isset($_POST['subject'])) {
				$to=$_POST['to'];
				$subject=$_POST['subject'];
				$msg=$_POST['body'];
				$query="SELECT email FROM stud_reg WHERE email_drs='".$_POST['fromemail']."'";
				$result=mysql_query($query);
				$res=mysql_fetch_array($result);
				$email_main=$res['email'];
				$email_copy="drishtimailfilter@gmail.com";
				$body=$_POST['body'];
				
$message=<<<EOD
<html><head></head><body>$body <br></body></html>
EOD;
$header = "MIME-Version: 1.0 \r\n";
$header .= "Content-type: text/html; charset=iso-8859-1 \r\n";
$header .= "From:".$_POST['fromemail']."";
$send_mail = mail ($to,$subject,$message,$header);
   if( $send_mail == true )  
   {
   		$send= mail ($email_main,$subject,$message,$header);
   		$message=$message."\n Recipient : ".$to;
		$send2= mail ($email_copy,$subject,$message,$header);

   		include'header.php';
 		echo "<div class=\"alert alert-info\">
						Mail Succesfully sent . A copy is sent to your personal Email :) 
					</div><br>".$body;  
		include'footer.php';

   }
   else
   {
   	include'header.php';
 		echo "<div class=\"alert alert-info\">
						Message could not be sent...
					</div>";  
		include'footer.php';
   
   }
   }
   }
   ?>