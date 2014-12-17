<?php
require "core.inc.php";
require "connect.inc.php";
$no_visible_elements=true;
include('header.php'); 
	
	?>

			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>DCMSv1.6 Administrator </h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					
						<?php
						 if( loggedin() ) {
		header('Location:login.php');
							 
						 }
	 else {
	 	
 		include"login.inc.php";
		}
						?>
				
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php'); ?>
