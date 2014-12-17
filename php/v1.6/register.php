<title>Event Manager Registration</title>
<?php
 	require 'connect.inc.php';
	if(isset($_POST['submit'])) {
		
		$fname = $_POST['fname'];		
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$phone = $_POST['phone'];
				
		if(!empty($fname)&&!empty($lname)&&!empty($email)&&!empty($phone)&&!empty($pass1)&&!empty($pass2)) {
			if($pass1 = $pass2) {		
				$pass=md5($pass1);			
				$query="SELECT * FROM stud_reg WHERE email='$email'";
				$result=mysql_query($query) or die(mysql_error());
				if(mysql_num_rows($result)){
					echo $email." already registered";
				}
	/*			
	picture upload (to ./uploads not used in this system Extend whenever needed)
					else {
					$target = "uploads/";
					$target = $target . time();
					$pic=time();
					if(move_uploaded_file($_FILES['file']['tmp_name'], $target))
					{
						echo "The file ". basename($_FILES['file']['name']). "has been uploaded, and your information has been added to the directory";
					}
					else {
						echo 'Sorry, there was a problem uploading your file.';
						}
					}*/
					$check=md5('$email').md5('$fname');
					$query="INSERT INTO stud_reg (fname,lname,email,password,level,valid,mob)VALUES('$fname','$lname','$email','$pass',4,'$check',$phone)";$result=mysql_query($query) or die(mysql_error());
					
					if($result) {
						$to=$email;
						$subject="Confirm your Mail";
$message=<<<EOD
Welcome <b> $fname $lname </b>, <br>
You have registered as an event manager in Drishti Site. <br>
Name  : $fname $lname <br>
Phone : $phone<br>
Pass  : $pass1<br>
Email : $email<br>
Please Confirm Your mail with this link :) 
<a href="http://cetdrishti.com/dcms/confirm.php?check=$check">Click Here</a>
EOD;
$header = "MIME-Version: 1.0 \r\n";
$header .= "Content-type: text/html; charset=iso-8859-1 \r\n";
$header .= "From:noreply@cetdrishti.com \r\n";
$send_mail = mail ($to,$subject,$message,$header);
   if( $send_mail == true )  
   {
      echo "Message sent successfully...";
   }
   else
   {
      echo "Message could not be sent...";
   }
   
						echo "Registered . Confirm your Mail :) ";	
					}
					else {
						echo "Password dont match ";
						}
					}			
			}	
			else {
				echo "All fields Required";
				}
			
		}
		
	
?>
<link href="http://www.twittstrap.com/twittstrap/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="http://www.twittstrap.com/twittstrap//assets/css/bootstrap-responsive.css" rel="stylesheet">
<div class="container">
<form action="register.php" method="POST" class="form-signin">
			<h3>Signup as Event Manager</h3>
			<p>Ensure that all data is correct. This data will be shown in Drishti Website* </p>
<div class="input-prepend" title="Password" data-rel="tooltip">
								<input class="input-block-level" name="fname"  type="text" placeholder="First name"  />
							</div>
							<div class="clearfix"></div>
<div class="input-prepend" title="Password">
								<input class="input-block-level" name="lname"  type="text" placeholder="Last name"  />
							</div>
							<div class="clearfix"></div>
<div class="input-prepend" title="Password" data-rel="tooltip">
								<input class="input-block-level" name="email"  type="text"   placeholder="Email"  />
							</div>
							<div class="clearfix"></div>
<div class="input-prepend" title="Phone" data-rel="tooltip">
								<input class="input-block-level" name="phone"  type="text"  placeholder="Phone"  />
							</div>
							<div class="clearfix"></div>
<div class="input-prepend" title="Password" data-rel="tooltip">
								<input class="input-block-level" name="pass1"  type="password" placeholder="Password"  />
							</div>
							<div class="clearfix"></div>
<div class="input-prepend" title="Password" data-rel="tooltip">
								<input class="input-block-level" name="pass2"  type="password" placeholder="Confirm Password"  />
							</div>
							<div class="clearfix"></div>
							
 <input type="submit" value="Submit" class="btn btn-primary" name="submit">
</form>

</div></div></div>