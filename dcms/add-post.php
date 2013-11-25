<?php
	require 'connect.inc.php';
	if(isset($_POST['submit'])) {
			if(!empty($_POST['heading'])&&!empty($_POST['post_det'])) {
				$heading=$_POST['heading'];
				$post_det=$_POST['post_det'];
				$query="INSERT INTO post (heading,post_det) VALUES('$heading','$post_det')";
				mysql_query($query) or die(mysql_error());
				}		
		}
?>
<form action="add-post.php" method="POST">
	Heading :<input type="text" name="heading"/><br>
	Post : <textarea name="post_det"></textarea>
	<input type="submit" value="submit" name="submit">
</form>