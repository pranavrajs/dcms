<?php
	require "connect.inc.php";
	require "core.inc.php";
	$data =$_SESSION['username'];
	$query="SELECT * FROM user_alumni WHERE email='$data'";
	$result=mysql_query($query) or die(mysql_error());
	$num = mysql_num_rows($result);
	$row=mysql_fetch_array($result) or die(mysql_error());
	echo "<p> Email :".$row['email']."</p>";
	echo "<p> First Name :".$row['firstname']."</p>";
	echo "<p> Last Name : ".$row['lastame']."</p>";
	$target = "uploads/";
	echo '<a href="edit.php?action=edit&email='.$row['email'] .' " >EDIT </a>';
?>

<img src="<?php echo $target.$row['image'];?>" alt="" >
