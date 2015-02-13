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
					}/*
					if($i<7) {
						while($i<7) {
								$sub[$i] = 0;
								$i++;
						}
					}*/
					$query = "INSERT INTO `group_reg` VALUES (NULL,".$_GET['eveid'].")";
					$result = mysql_query($query) or die(mysql_error());


					$query = "SELECT group_id FROM group_reg ORDER BY group_id DESC LIMIT 0,1";
					$result = mysql_query($query) or die(mysql_error());

					$group_id = mysql_fetch_array($result)['group_id'];

					$flag = 1;

					foreach($sub as $s){

						echo $query = "INSERT INTO `groups` VALUES (NULL,".$group_id.",".$s.")";
						$result = mysql_query($query) or die(mysql_error());
						if(!$result)
							$flag=0;
					}

					if($flag)
					{
						header('Location:stud_det.php');				
					}	
				}
		}
?>