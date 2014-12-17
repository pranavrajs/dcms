<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta name="author" content="Pranav" >
	<title>Drishti Content Management System V1.6</title>
	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
	<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<img src="img/logo.png" style="position:absolute;top:0;left:40px;width:120px;height:40px;z-index:100000;" alt="" >
		<div class="navbar-inner">
		
						
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
					
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> <?php echo $_SESSION['username']; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
					<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
		<!--		<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="#">Visit Site</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
				
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="login.php"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
<?php
if($_SESSION['adm_lvl']==0) {

?>			<li class="nav-header hidden-tablet">Event Managers</li>
					
			<li><a class="ajax-link" href="add-managers.php"><i class="icon-glass"></i><span class="hidden-tablet"> Assign Event Managers</span></a></li>
			<li><a class="ajax-link" href="man_edit.php"><i class="icon-headphones"></i><span class="hidden-tablet"> Change Managers</span></a></li>			
		<?php
			}
			?>
			<li><a class="ajax-link" href="event_managerlist.php"><i class="icon-check"></i><span class="hidden-tablet"> Event Managers List </span></a></li>
			<?php 
				if($_SESSION['adm_lvl']==2) {			
			?>	
					<li><a class="ajax-link" href="stud_det_nss.php"><i class="icon-check"></i><span class="hidden-tablet">Scan QR</span></a></li>
			<?php } ?>	
			<?php 
				if($_SESSION['adm_lvl']==4) {			
			?>	
					<li><a class="ajax-link" href="qrcode_eve_man.php"><i class="icon-check"></i><span class="hidden-tablet">Scan QR</span></a></li>
			<?php } ?>	
				
			<?php
			if($_SESSION['adm_lvl']==4 || $_SESSION['adm_lvl']==0) {
				?>
			<li><a class="ajax-link" href="mailer_official.php"><i class="icon-eye-open"></i><span class="hidden-tablet">Send mail</span></a></li>
			
			<?php
			}
			if($_SESSION['adm_lvl']!=4) {
				?>
						
					
		<!--					<li><a class="ajax-link" href="form.php"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
		-->				<li class="nav-header hidden-tablet">  Individual Registration </li>
						<li><a class="ajax-link" href="stud_det.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Registration List</span></a></li>
						<li><a class="ajax-link" href="std_reg.php"><i class="icon-calendar"></i><span class="hidden-tablet"> New Registration</span></a></li>
						<li class="nav-header hidden-tablet">  Group Registration </li>
						<li><a class="ajax-link" href="grp_nss.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Group Registration</span></a></li>
						<li><a class="ajax-link" href="grp_reg_det.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Group Details</span></a></li>
						
<?php } ?>			
		<?php		
	if($_SESSION['adm_lvl']==4) {
	?>
					<li class="nav-header hidden-tablet">  Group Registration Details</li>
					<li><a class="ajax-link" href="grp_reg_det.php?var=<?php echo $_SESSION['event']; ?>"><i class="icon-calendar"></i><span class="hidden-tablet"> Group Details</span></a></li>
					<li><a class="ajax-link" href="grp_nss.php?var=<?php echo $_SESSION['event']; ?>"><i class="icon-calendar"></i><span class="hidden-tablet"> Add new group</span></a></li>
					<li class="nav-header hidden-tablet">Event Details </li><li><?php echo"<a class=\"ajax-link\" href=\"eve_det.php?var=".$_SESSION['event']."\">"; ?><i class="icon-download-alt"></i><span class="hidden-tablet"> View Event Details</span></a></li>
						<li><?php echo"<a class=\"ajax-link\" href=\"eve_edit.php?var=".$_SESSION['event']."\">"; ?><i class="icon-leaf"></i><span class="hidden-tablet"> Edit Event Details</span></a></li>
	<?php }	
		else if($_SESSION['adm_lvl']==0)  {	
		?>			<li class="nav-header hidden-tablet">Event Details </li><li><a class="ajax-link" href="add-events.php"><i class="icon-fire"></i><span class="hidden-tablet"> Add New Events</span></a></li>
						<li><a class="ajax-link" href="eve_det.php"><i class="icon-download-alt"></i><span class="hidden-tablet"> View Event Details</span></a></li>
						<li><a class="ajax-link" href="eve_edit.php"><i class="icon-leaf"></i><span class="hidden-tablet"> Edit Events</span></a></li>
<?php } 
		else 
 ?>
			<!--			<li><a class="ajax-link" href="file-manager.php"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
					-->	<li class="nav-header hidden-tablet">Prize Details</li>
<?php
			if($_SESSION['adm_lvl'] != 4)
			{ 				
						
?>
<li><a class="ajax-link" href="prizes.php"><i class="icon-star"></i><span class="hidden-tablet"> 	Add Prize details </span></a></li>
<li><a class="ajax-link" href="prize_view.php"><i class="icon-star"></i><span class="hidden-tablet"> 	View Prize Details</span></a></li>
<?php
			}
			else {				
?>
		<li><a class="ajax-link" href="prizes.php?var=<?php echo $_SESSION['event']; ?>"><i class="icon-star"></i><span class="hidden-tablet"> 	Prizes </span></a></li>	
<?php
		}
?>
						<li class="nav-header hidden-tablet">Participation Details</li>
<?php	
	if($_SESSION['adm_lvl']==4) {
?>					<li><?php echo"<a class=\"ajax-link\" href=\"eve_part.php?var=".$_SESSION['event']."\">"; ?><i class="icon-signal"></i><span class="hidden-tablet"> Event Participation List</span></a></li>
	<?php }	
		else {	
		?>			<li><a class="ajax-link" href="eve_part.php"><i class="icon-signal"></i><span class="hidden-tablet"> Event Participation List</span></a></li>
<?php } ?>
				
	<?php	
	if($_SESSION['adm_lvl']==0 || $_SESSION['adm_lvl']==2) {
?>						
						<li class="nav-header hidden-tablet">Accomodation Details</li>	
						<li><a href="accomodation.php"><i class="icon-ban-circle"></i><span class="hidden-tablet"> Get accomodation List </span></a></li>
<?php } ?>
						<li class="nav-header hidden-tablet">Collegewise Standings</li>
						<li><a href="clg_std.php"><i class="icon-lock"></i><span class="hidden-tablet">Collegewise Standings</span></a>
	<?php	
	if($_SESSION['adm_lvl']==2|| $_SESSION['adm_lvl']==0) {
?>						
						
						<li><a href="add-college.php"><i class="icon-lock"></i><span class="hidden-tablet"> Add new College</span></a></li>
<?php }  ?>
					</ul>
					<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<div id="content" class="span10">
			<!-- content starts -->
			<?php } ?>