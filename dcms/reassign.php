<?php 
	require'connect.inc.php';
	require'core.inc.php';
	if(!loggedin() || $_SESSION['adm_lvl']==4) 
		header('Location:index.php');
	include'header.php';	
?>
	<div class="row-fluid sortable">		
	<div class="box span12">
			<div class="box-header well" data-original-title>
										
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
	<div class="box-content">
	<form action="re_process.php" method="POST">	
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<tr>
							<td>Select a person </td>	
							<td>
								<select name="rep" id="selectError" data-rel="chosen">
									<?php
										$query = "SELECT * FROM students";
										$result = mysql_query($query);
										if($result) {
												while($res=mysql_fetch_array($result))
												{
													echo"<option value=\"".$res['drishti_id']."\">".$res['drishti_id']."   ".$res['name']."</option>";												
												}
										}
									?>								
								</select>							
							</td>				
					</tr>
			</table>	
		<div class="form-actions">
			<input type="submit" class="btn btn-primary" value="submit" name="submit" >
		</div>
</form>
	</div>
	</div>
	</div>
<?php
	include 'footer.php';
?>