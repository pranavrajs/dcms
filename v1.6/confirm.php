<?php
	require'connect.inc.php';
	if(isset($_GET['check'])) {
			$query="SELECT * FROM stud_reg WHERE stud_reg.valid ='".$_GET['check']."'";
			$result=mysql_query($query) or die(mysql_error());
			if($result) {
				$num=mysql_num_rows($result);
				if($num) {
						$q2="UPDATE stud_reg SET valid = 1 WHERE valid='".$_GET['check']."'";
						$r2=mysql_query($q2) or die(mysql_error());	
						if($r2) {
								echo"Mail Confirmed . Wait for admin approval ";
							}				
					}			
			}
		}

?>