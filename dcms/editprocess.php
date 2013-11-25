<?php 
	require'connect.inc.php';
	require'core.inc.php';
	if(isset($_POST['submit'])) {

	$query="UPDATE students SET name='".$_POST['name']."',email='".$_POST['email']."',college='".$_POST['college']."',phone='".$_POST["phone"]."',phone2='".$_POST["phone2"]."',accomodation='".$_POST["accomodation"]."',pay_bit='".$_POST['payment']."' 
	WHERE email='".$_POST['email']."'";
	$result=mysql_query($query)or die(mysql_error());	
	
	if(!$result){	
		echo"Error in Processing";
	}
	else {
		
				foreach($_POST['eve_arr'] as $row)
				{
						$q2="INSERT INTO event_reg (eve_id,drs_id) VALUES (".$row.",".$_POST['drishti_id'].")";
						$r2=mysql_query($q2);				
				}
		header('Location:stud_det.php?var='.$_POST['drishti_id'].'');
	}
}
?>
