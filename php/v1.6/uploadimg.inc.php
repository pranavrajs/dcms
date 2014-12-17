<?php
	require "connect.inc.php";
	mysql_select_db($db) or die(mysql_error());
	if(isset($_POST['submit'])) {
		$target = "uploads/";
		$target = $target . basename( $_FILES['file']['name']);
		$pic=($_FILES['file']['name']);
		$query="INSERT INTO user_img (image) VALUES('$pic')";
		mysql_query($query);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $target))
			{
				echo "The file ". basename($_FILES['file']['name']). "has been uploaded, and your information has been added to the directory";
			}
			else {
				echo 'Sorry, there was a problem uploading your file.';
		}
		}
?>

<form action="uploadimg.inc.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="size" value="350000">
	<input type="file" name="file">
	<input type="submit" name="submit" value="Submit">
</form>