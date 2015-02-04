<?php
require "core.inc.php";
require "connect.inc.php";
$no_visible_elements=true;
include('header.php'); 
	
	?>

			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>DCMSv1.6 Administrator </h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row" style="max-width:1000px">
				<div class="well col-md-4 col-md-offset-6 col-lg-offset-6" style="max-width:300px">
					
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
