<?php
		require 'connect.inc.php';
		require 'core.inc.php'; 
		if(isset($_POST['submit'])) {
				if(isset($_GET['eveid']))
				{
					$sub = array();
					$i=0;
					foreach($_POST['event'] as $row) {
						$sub[$i] = $row;					
						$i++;				
					}
					if($i<7) {
						while($i<7) {
								$sub[$i] = 0;
								$i++;
						}
					}
					$query = "INSERT INTO `group` (event,mem1,mem2,mem3,mem4,mem5,mem6) VALUES (".$_GET['eveid'].",".$sub[0].",".$sub[1].",".$sub[2].",".$sub[3].",".$sub[4].",".$sub[5].")";
					$result = mysql_query($query) or die(mysql_error());
					if($result)
					{
						header('Location:stud_det.php');				
					}	
				}
		}
?>