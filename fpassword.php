<?php include("conn.php") ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>
<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css.css">
	<meta name="viewport" content="width=device-width, initial- scale=1.0">
	<title>portal</title>
	<style type="text/css">
		body{
			background-image: url("img/background1.jpg");
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}

		.panel-body a{
			color: #666;
			font-style: 12px;
			text-align: center;
		}
		#text_1{
			text-align: center;
			color: #666;
		}
	</style>
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" id="panel_1">
				<div class="panel panel-default" id="panel_1">
					<div class="panel-heading" id="p_heading">
						<p class="text-center"><img src="img/logo.png"  class= "img-responsive logo"></p>
						<h4>Password recovery </h4>
					</div>
					<div class="panel-body">
						<?php
						if(isset($_POST['reset'])){
							$userid = mysqli_real_escape_string($con,md5($_POST['userid']));
							$query = mysqli_query($con,"SELECT * FROM  users where userid2  = '$userid'");
							$query2 = mysqli_num_rows($query);
							if($query2 >0){
								$rand_password = uniqid();
								$enc_rand_password = md5($rand_password);
								$upate_password = mysqli_query($con,"UPDATE users set password2 = '$enc_rand_password' where userid2 = '$userid'");
								$fetch_query = mysqli_fetch_array($query);
								$type = $fetch_query['type'];
								if($type == 'student'){
									$search = 'students';
								}
								else{
									$search = $type;
								}
        		//echo $search;
								$fetch_mail = mysqli_query($con,"SELECT * FROM $search where username = '$userid'");
								if(!$fetch_mail){
									die(mysqli_error($con));
								}
								$mail_query = mysqli_fetch_array($fetch_mail);
								$email = $mail_query['email'];
								$emailFrom = "info@focusmodelcollege.org.ng";
								$emailFromName =  "Focus Model College";
								
								$mail = new PHPMailer;
								$mail->setFrom('admin@info.com', 'admin');
								$mail->addAddress($email);

								$mail->Subject = 'YOUR PASSWORD HAS BEEN CHANGED';
								$mail->msgHTML("Your new password is $rand_password"); 
								$mail->AltBody = "Your new password is $rand_password";
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

								if(!$mail->send()){
									echo "Mailer Error: " . $mail->ErrorInfo;
								}else{
									echo "Message sent!";
								}
							}
							else{
								echo "<p class='alert alert-danger'>User id does not exist</p>";
							}
						}
						?>

						<form method="POST">
							<br>
							<div class="input-group">
								<span class="input-group-addon" id="addon2"><span class="glyphicon glyphicon-user"></span></span>
								<input type="" name="userid" placeholder="username" class="form-control" aria-describedby="addon2">
							</div>
							<br>
						</div>
						<div class="panel-footer" id="p_footer"><p class="text-center"><button type="submit" name="reset" class="btn btn-primary" id="btn">reset</button></p></div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<p id="footer">copyright &copy nic all right reserved</p>
	<script type="text/javascript" src='jquery.js'></script>
	<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>