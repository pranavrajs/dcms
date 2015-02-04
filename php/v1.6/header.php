<!-- 
D-Content Management System PHP Version v1.6
Project Creator : Pranav Raj S

The MIT License (MIT)

Copyright (c) 2014 Pranav Raj S

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta name="author" content="Pranav" >
	<title>Drishti Content Management System V1.6</title>
	<!-- The styles -->
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--
	<link href="css/font-awesome.min.css" rel="stylesheet">-->
	<link href="css/metisMenu.min.css" rel="stylesheet">
	<link href="css/sb-admin-2.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">

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
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="">
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
					<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i><span class="hidden-phone"> <?php echo $_SESSION['username']; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
					<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>


		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">


                    <li>
                    	<a href="login.php">Dashboard</span></a></a>
                    </li>

<?php
if($_SESSION['adm_lvl']==0) {
?>


                    <li>
                    	<a href="#">Event Managers<span class="fa arrow"></span></a></a>

                    	<ul class="nav nav-second-level">


							<li><a class="ajax-link" href="add-managers.php"><i class=""></i>Assign Event Managers</a></li>
							<li><a class="ajax-link" href="man_edit.php"><i class=""></i>Change Managers</a></li>			

					

	<?php
			}
		?>

							<li><a class="ajax-link" href="event_managerlist.php"><i class=""></i>Event Managers List</a></li>
			<?php 
				if($_SESSION['adm_lvl']==2) {			
			?>	
							<li><a class="ajax-link" href="stud_det_nss.php"><i class=""></i>Scan QR</a></li>
			<?php } ?>	
			<?php 
				if($_SESSION['adm_lvl']==4) {			
			?>	
							<li><a class="ajax-link" href="qrcode_eve_man.php"><i class=""></i>Scan QR</a></li>
			<?php } ?>	
				
			<?php
			if($_SESSION['adm_lvl']==4 || $_SESSION['adm_lvl']==0) {
				?>
							<li><a class="ajax-link" href="mailer_official.php"><i class=""></i>Send mail</a></li>
			
			<?php
			}?>
					

                    	</ul>
                    </li>

			<?php if($_SESSION['adm_lvl']!=4) {
				?>



                    <li>
                    	<a href="#">Individual Registration<span class="fa arrow"></span></a></a>

                    	<ul class="nav nav-second-level">
                    		<li>
                    			<a href="stud_det.php">Registration List</a>
                    		</li>
                    		<li>
                    			<a href="std_reg.php">New Registration</a>
                    		</li>
                    	</ul>
                    </li>

                    <li>
                    	<a href="#">Group Registration<span class="fa arrow"></span></a></a>

                    	<ul class="nav nav-second-level">
                    		<li>
                    			<a href="grp_nss.php">Group Registration</a>
                    		</li>
                    		<li>
                    			<a href="grp_reg_det.php">Group Details</a>
                    		</li>
                    	</ul>
                    </li>

<?php } 	
	if($_SESSION['adm_lvl']==4) {
	?>



                    <li>
                    	<a href="#">Group Registration Details<span class="fa arrow"></span></a></a>

                    	<ul class="nav nav-second-level">
                    		<li>
                    			<a href="grp_reg_det.php?var=<?php echo $_SESSION['event']; ?>">Group Details</a>
                    		</li>
                    		<li>
                    			<a href="grp_nss.php?var=<?php echo $_SESSION['event']; ?>">Add New Group</a>
                    		</li>
                    	</ul>
                    </li>



                    <li>
                    	<a href="#">Event Details<span class="fa arrow"></span></a></a>

                    	<ul class="nav nav-second-level">
                    		<li>
                    			<a href="eve_det.php?var=<?php echo $_SESSION['event']; ?>">View Event Details</a>
                    		</li>
                    		<li>
                    			<a href="eve_edit.php?var=<?php echo $_SESSION['event']; ?>">Edit Event Details</a>
                    		</li>
                    	</ul>
                    </li>



		<?php }	
		else if($_SESSION['adm_lvl']==0)  {	
		?>	



                    <li>
                    	<a href="#">Event Details<span class="fa arrow"></span></a></a>

                    	<ul class="nav nav-second-level">
                    		<li>
                    			<a href="eve_det.php">View Event Details</a>
                    		</li>
                    		<li>
                    			<a href="eve_edit.php">Edit Events</a>
                    		</li>
                    	</ul>
                    </li>


<?php } 
		else 
 ?>


                 <li>
                    	<a href="#">Prize Details<span class="fa arrow"></span></a></a>

                    	<ul class="nav nav-second-level">


<?php
			if($_SESSION['adm_lvl'] != 4)
			{ 				
						
?>


                    		<li>
                    			<a href="prizes.php">Add Prize Details</a>
                    		</li>
                    		<li>
                    			<a href="prize_view.php">View Prize Details</a>
                    		</li>

<?php
			}
			else {				
?>
                    		<li>
                    			<a href="prizes.php?var=<?php echo $_SESSION['event']; ?>">Prizes</a>
                    		</li>
<?php
		}
?>
                    	</ul>
                    </li>

                    <li>
                    	<a href="#">Participation Details<span class="fa arrow"></span></a></a>

                    	<ul class="nav nav-second-level">
                    		<li>
                    			<a href="eve_det.php">View Event Details</a>
                    		</li>
                    		<li>
                    			<a href="eve_edit.php">Edit Events</a>
                    		</li>

<?php	
	if($_SESSION['adm_lvl']==4) {
?>
                    		<li>
                    			<a href="eve_part.php?var=<?php echo $_SESSION['event'] ?>">Event participation list</a>
                    		</li>
<?php }	
		else {	
		?>
                    		<li>
                    			<a href="eve_part.php">Event Participation List</a>
                    		</li>
<?php } ?>
                    	</ul>
                    </li>
	<?php	
	if($_SESSION['adm_lvl']==0 || $_SESSION['adm_lvl']==2) {
?>						

                    <li>
                    	<a href="#">Accomodation Details<span class="fa arrow"></span></a></a>

                    	<ul class="nav nav-second-level">
                    		<li>
                    			<a href="accomodation.php">Accomodation List</a>
                    		</li>
                    	</ul>
                    </li>



<?php } ?>

                    <li>
                    	<a href="#">Collegewise Standings<span class="fa arrow"></span></a></a>

                    	<ul class="nav nav-second-level">
                    		<li>
                    			<a href="clg_std.php">View Event Details</a>
                    		</li>
	<?php	
	if($_SESSION['adm_lvl']==2|| $_SESSION['adm_lvl']==0) {
?>						

                    		<li>
                    			<a href="add-college.php">Add new College</a>
                    		</li>
		
		<?php }  ?>

                    	</ul>
                    </li>

				</ul>

			</nav><!--/span-->
			<!-- left menu ends -->
			

			<div id="page-wrapper">
			<!-- content starts -->
			<?php } ?>