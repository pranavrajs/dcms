<?php
	require'connect.inc.php';
	require'core.inc.php';
	if(!loggedin())
		header('Location:index.php');
	if(!isset($_POST['submit']))
	{
?>

<?php
	}
?>