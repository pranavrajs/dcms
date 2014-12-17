<?php
	require'connect.inc.php';
	require'core.inc.php';
	if(isset($_POST['submit'])) {
		$id = $_POST['rep'];		
		$query="SELECT * FROM students WHERE drishti_id = ".$id."";
		$result=mysql_query($query);
		if($result) {
					$res = mysql_fetch_array($result);					
					$name = $res['name'];
					$pass = $res['password'];
					$college = $res['college'];
					$email = $res['email'];
					$phone = $res['phone'];
					$phone2 = $res['phone2'];
					$acc = $res['accomodation'];
					$valid= $res['valid'];
					$reg_bit = $res['reg_bit'];
					$pay_bit = $res['pay_bit'];
					$eve = $res['eves'];
					$query = "DELETE FROM students WHERE drishti_id = ".$id."";
					$result = mysql_query($query) or die(mysql_error());
					if($result) {
						$query = "INSERT INTO students (name,password,college,email,phone,phone2,accomodation,valid,reg_bit,pay_bit,eves)VALUES ('$name','$pass',$college,'$email',$phone,'$phone2',$acc,'$valid',$reg_bit,$pay_bit,'$eve')";
						$result = mysql_query($query) or die(mysql_error());
						if($result)
						{
						$query = "SELECT drishti_id FROM students WHERE email = '".$email."'";
						$result= mysql_query($query) or die(mysql_error());
						if($result) {
								$res= mysql_fetch_array($result) or die(mysql_error());
								$n_id = $res['drishti_id'];
								$query ="UPDATE `group` SET mem1 = ".$n_id." WHERE mem1 = ".$id."";
								$result = mysql_query($query) or die(mysql_error());
								if($result) {
								$query ="UPDATE `group` SET mem2 = ".$n_id." WHERE mem2 = ".$id."";
								$result = mysql_query($query) or die(mysql_error());
								if($result) {
									$query ="UPDATE `group` SET mem3 = ".$n_id." WHERE mem3 = ".$id."";
									$result = mysql_query($query) or die(mysql_error());
									if($result) {
											$query ="UPDATE `group` SET mem4 = ".$n_id." WHERE mem4 = ".$id."";
											$result = mysql_query($query) or die(mysql_error());
											if($result) {
												$query ="UPDATE `group` SET mem5 = ".$n_id." WHERE mem5 = ".$id."";
												$result = mysql_query($query) or die(mysql_error());
												if($result) {
													$query = "UPDATE prize SET drs_id = ".$n_id." WHERE drs_id =".$id."";
													$result = mysql_query($query) or die(mysql_error());
													if($result) {
														$query = "UPDATE event_reg SET drs_id = ".$n_id." WHERE drs_id =".$id."";
														$result = mysql_query($query) or die(mysql_error());
														if($result) {
															header('Location:stud_det.php?var='.$n_id);												
														}													
													}
												}
											}
									}
								}		
								}												
						}					
					}
				}
		}	
	}
?>