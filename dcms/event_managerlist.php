<?php
require "connect.inc.php";
require "core.inc.php";
		 if(!loggedin() ) {
 		
				header('Location:index.php');
 		}
require 'idi.php';		
include'header.php';
ORM::configure('mysql:host=localhost;dbname=cetdriss_drishti');
	ORM::configure('username', 'cetdriss_pranav');
	ORM::configure('password', 'kindappan123');
	
	// connected
?>
<div class="box span12">
	<div class="box-content">	
	<legend>Manager details</legend>
	<table class="table table-striped table-bordered bootstrap-datatable ">

<?php	
	$event= ORM::for_table('events')->find_many();
	foreach($event as $ev)
	{
?>
	<tr>
		<th><?php echo $ev->name; ?></th>
		<td>
		
<?php
		$manager= ORM::for_table('stud_reg')->where('event',$ev->id)->find_many();
		foreach($manager as $man)
		{	
?>
			
			<tr>
				<td><?php echo $man->fname." ".$man->lname; ?></td>
				<td><?php echo $man->mob; ?></td>
			</tr>
			
		</td>

	</tr>
		
<?php	
		}?>	
<?php	}
?>
	</table>
</div></div>
<?php

	include'footer.php';
?>