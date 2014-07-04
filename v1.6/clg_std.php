<?php
	require'connect.inc.php';
	require'core.inc.php';
	if(!loggedin())
		header('Location:index.php');
	include 'header.php';
?>
				
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Collegewise Standings</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
									<th>Sl No</th>
									<th>College Name</th>
									<th>Points</th>
							</thead>
							<tbody>
								<?php
										$query = "SELECT x.CollegeName, sum(y.points) point FROM prize y LEFT OUTER JOIN college x ON x.CollegeId = y.cl_id GROUP BY y.cl_id ORDER BY sum(y.points) DESC";
										$result = mysql_query($query) or die(mysql_error());
										if($result) {
												$num = mysql_num_rows($result);
												if($num) 
												{
												
													$i=1;
													while($res = mysql_fetch_array($result)) {
																echo "<tr><td>".$i."</td><td>".$res['CollegeName']."</td><td>".$res['point']."</td></tr>";													
																$i++;													
													}
												}
										}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
<?php
	include'footer.php';
?>