<?php
require "connect.inc.php";
require "core.inc.php";
		 if(!loggedin() ) {
 		
				header('Location:index.php');
 		}
	    include('header.php'); 
	if(!isset($_GET['var']))
		{		 
		if($_SESSION['adm_lvl']!=4)
		{
		$query="SELECT * FROM  events";
		$result=mysql_query($query) or die(mysql_error());
		$num=mysql_num_fields($result);

?>

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Event List</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Members</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Id</th>
								  <th>Event Name</th>
								  <th>Intro</th>
	    						  <th>Prize1</th>
		 				 		 <th>Prize2</th>
		 				 	</tr>
						  </thead>   
						  <tbody>
<?php

if($num!=0)
		{
 			while	($res=mysql_fetch_array($result)) {
 					echo "<tr>";
					echo "<td class=\"center\">".$res['id']."</td>";
					echo "<td class=\"center\"><a  href=\"eve_det.php?var=".$res['id']."\">".$res['name']."</td>";
					echo "<td class=\"center\"> ".$res['descr']."</td>";
					echo "<td class=\"center\"> ".$res['prize1']."</td>";
					echo "<td class=\"center\"> ".$res['prize2']."</td>";
													
				}
		}

?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
<?php
	}
	else {
		header('Location:eve_det.php?var='.$_SESSION['event'].'');	
	}
}
else {
	if($_SESSION['adm_lvl']!=4 || ($_SESSION['adm_lvl']==4&&$_SESSION['event']==$_GET['var']))
	{	
	$query="SELECT * FROM  events  WHERE  events.id ='".$_GET['var']."'";
	$result=mysql_query($query) or die(mysql_error());
	$num=mysql_num_fields($result);
	?>
		<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="eve_det.php">Event List</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">View Event List</a>
					</li>
				</ul>
			</div>
		<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable ">
						  <thead>
						
	<?php
if($num!=0)	{
 			while	($res=mysql_fetch_array($result)) {
					echo"<tr><td class=\"center\"> Event ID </td> <td class=\"center\">".$res['id']."</td></tr>"; 					
					echo"<tr><td class=\"center\"> Name </td> <td class=\"center\"> ".$res['name']."</td></tr>"; 					
					echo"<tr><td class=\"center\"> Description </td> <td class=\"center\"> ".$res['descr']."</td></tr>"; 					
					echo"<tr><td class=\"center\"> Event Format </td> <td class=\"center\"> ".$res['eve_format']."</td></tr>"; 					
					if($res['group']==7)
					echo"<tr><td class=\"center\"> Problem Statement </td> <td class=\"center\"> ".$res['pbm_stat']."</td></tr>"; 					
					
					echo"<tr><td class=\"center\"> Prize </td> <td class=\"center\"> ".$res['prize1']."</td></tr>"; 					
					echo"<tr><td class=\"center\"> Second Prize </td> <td class=\"center\"> ".$res['prize2']."</td></tr>"; 					
 			}
 	}
?>
</thead>
</table>

<?php
	}
	
	else {
		header('Location:eve_det.php?var='.$_SESSION['event'].'');	
	} 
}

include'footer.php';
?>