<?php
require"connect.inc.php";
	if(isset($_POST['submit'])) {
		if(!empty($_POST['email'])&&!empty($_POST['pass'])) {
			$user=stripslashes($_POST['email']);
			$pass=stripslashes(md5($_POST['pass']));
			$query="SELECT * FROM stud_reg WHERE email='$user' and password='$pass' ";
			$result = mysql_query($query) or die(mysql_error());
			$num =mysql_num_rows($result);	
			if($num == 1) {
				$res=mysql_fetch_array($result);
				if($res['level']==4) 
				{
					if($res['valid']==1)
					{
						if($res['event']!=0)
						{
							$_SESSION['username']=$res['fname'];
							$_SESSION['adm_lvl']=$res['level'];
							$_SESSION['event']=$res['event'];					
							$_SESSION['email']=$res['email'];
							header('Location:login.php');
							exit;
						}
						else
						{
							echo "<div class=\"alert alert-info\">
								Pending admin aprroval
							      </div>";
						}
					}	
					else
					{
						echo "<div class=\"alert alert-info\">
						Confirm Your Mail id.
					</div>";
					}
				}
				else
				{
					$_SESSION['username']=$res['fname'];
					$_SESSION['email']=$res['email'];
					$_SESSION['adm_lvl']=$res['level'];
					header('Location:login.php');
					exit;
				}
				
			}
			else {
				echo "<div class=\"alert alert-info\">
						Error with your Username and Password.
					</div>";
			}
	}
	
}
?>
<form action="<?php $current_file; ?>" method="POST" class="form-horizontal" >
	
			<div class="input-prepend" title="Email" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="email" id="username" type="text"  />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="pass" id="password" type="password"  />
							</div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
							</p>
</form>