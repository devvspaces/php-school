<?php include("conn/conn.php") ?>
<?php
$emailFrom = "info@hapacollege.org.ng";
$emailFromName =  "Hapa College";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if (isset($_POST['send'])) {
	$title = strip_tags($_POST['title']);
	$body = strip_tags($_POST['body']);
	$html = "<!DOCTYPE html>
<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
    <meta charset='utf-8'> <!-- utf-8 works for most cases -->
    <meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*='margin: 16px 0'] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}

/* If the above doesn't work, add a .g-img class to any image in question. */
img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size you'd like to fix */

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}

    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

	    .primary{
	background: #30e3ca;
}
.bg_white{
	background: #ffffff;
}
.bg_light{
	background: #fafafa;
}
.bg_black{
	background: #000000;
}
.bg_dark{
	background: rgba(0,0,0,.8);
}
.email-section{
	padding:2.5em;
}

/*BUTTON*/
.btn{
	padding: 10px 15px;
	display: inline-block;
}
.btn.btn-primary{
	border-radius: 5px;
	background: #30e3ca;
	color: #ffffff;
}
.btn.btn-white{
	border-radius: 5px;
	background: #ffffff;
	color: #000000;
}
.btn.btn-white-outline{
	border-radius: 5px;
	background: transparent;
	border: 1px solid #fff;
	color: #fff;
}
.btn.btn-black-outline{
	border-radius: 0px;
	background: transparent;
	border: 2px solid #000;
	color: #000;
	font-weight: 700;
}

h1,h2,h3,h4,h5,h6{
	font-family: 'Lato', sans-serif;
	color: #000000;
	margin-top: 0;
	font-weight: 400;
}

body{
	font-family: 'Lato', sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0,0,0,.4);
}

a{
	color: #30e3ca;
}

table{
}
/*LOGO*/

.logo h1{
	margin: 0;
}
.logo h1 a{
	color: #30e3ca;
	font-size: 24px;
	font-weight: 700;
	font-family: 'Lato', sans-serif;
}

/*HERO*/
.hero{
	position: relative;
	z-index: 0;
}

.hero .text{
	color: rgba(0,0,0,.3);
}
.hero .text h2{
	color: #000;
	font-size: 40px;
	margin-bottom: 0;
	font-weight: 400;
	line-height: 1.4;
}
.hero .text h3{
	font-size: 24px;
	font-weight: 300;
}
.hero .text h2 span{
	font-weight: 600;
	color: #30e3ca;
}


/*HEADING SECTION*/
.heading-section{
}
.heading-section h2{
	color: #000000;
	font-size: 28px;
	margin-top: 0;
	line-height: 1.4;
	font-weight: 400;
}
.heading-section .subheading{
	margin-bottom: 20px !important;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(0,0,0,.4);
	position: relative;
}
.heading-section .subheading::after{
	position: absolute;
	left: 0;
	right: 0;
	bottom: -10px;
	content: '';
	width: 100%;
	height: 2px;
	background: #30e3ca;
	margin: 0 auto;
}

.heading-section-white{
	color: rgba(255,255,255,.8);
}
.heading-section-white h2{
	font-family: 
	line-height: 1;
	padding-bottom: 0;
}
.heading-section-white h2{
	color: #ffffff;
}
.heading-section-white .subheading{
	margin-bottom: 0;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(255,255,255,.4);
}


ul.social{
	padding: 0;
}
ul.social li{
	display: inline-block;
	margin-right: 10px;
}

/*FOOTER*/

.footer{
	border-top: 1px solid rgba(0,0,0,.05);
	color: rgba(0,0,0,.5);
}
.footer .heading{
	color: #000;
	font-size: 20px;
}
.footer ul{
	margin: 0;
	padding: 0;
}
.footer ul li{
	list-style: none;
	margin-bottom: 10px;
}
.footer ul li a{
	color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;'>
	<center style='width: 100%; background-color: #f1f1f1;'>
    <div style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
    	<!-- BEGIN BODY -->
      <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
      	<tr>
          <td valign='top' class='bg_white' style='padding: 1em 2.5em 0 2.5em;'>
          	<table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
          		<tr>
          			<td class='logo' style='text-align: center;'>
			            <h1><a href='#'>Hapa College</a></h1>
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr><!-- end tr -->
				<tr>
          <td valign='middle' class='hero bg_white' style='padding: 2em 0 4em 0;'>
            <table>
            	<tr>
            		<td>
            			<div class='text' style='padding: 0 2.5em; text-align: center;'>
            				<h2>$title</h2>
            				<h3>$body</h3>
            			</div>
            		</td>
            	</tr>
            </table>
          </td>
	      </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
      	<tr>
          <td valign='middle' class='bg_light footer email-section'>
            <table>
            	<tr>
                <td valign='top' width='33.333%' style='padding-top: 20px;'>
                  <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
                    <tr>
                      <td style='text-align: left; padding-right: 10px;'>
                      	<p align='center'>&copy Hapa College</p>
                      </td>
                    </tr>
                  </table>
                </td>
        
        </tr>
      </table>

    </div>
  </center>
</body>
</html>";




	$receipient = "";
	$phone = "";
	$parents = $_POST['parents'];
	$staff = $_POST['staff'];
	$manual = $_POST['manual_input'];
	$receiver = $_POST['receiver'];

	$student_category = $_POST['student_category'];
	$faculty = $_POST['faculty'];
	$department = $_POST['department'];
	$level = $_POST['level'];

	$title = strip_tags($_POST['title']);
	$body = strip_tags($_POST['body']);
	if ($receiver == "parents" && $parents != "") {
		$receipient = $parents;
		if ($receipient == "ALL") {
			$sql = mysqli_query($con, "SELECT * from students ");
		} else {
			$level_name = $auth->select14('level', 'level', 'sn', $receipient);
			$sql = mysqli_query($con, "SELECT * From students where level = '$level_name'");
		}
		$email_col = 'p_email';
	} elseif ($receiver == "staff" && $staff != "") {
		$receipient = $staff;
		if ($receipient == "ALL") {
			$sql = mysqli_query($con, "SELECT * from staff ");
		} else {
			$dept_name = $auth->select14('department', 'department', 'dept_code', $receipient);
			$sql = mysqli_query($con, "SELECT * From staff where department = '$receipient' OR department = '$dept_name'");
		}
		$email_col = 'email';
	} elseif ($receiver == "students" && $student_category != "") {
		if ($student_category == "ALL") {
			$receipient = $student_category;
		} elseif ($student_category == "faculty") {
			$receipient = $faculty;
			$col = 'college';
			$val = $auth->select14('college_code', 'college', 'sn', $faculty);
		} elseif ($student_category == "department") {
			$receipient = $department;
			$col = 'department';
			$val = $auth->select14('dept_code', 'department', 'sn', $department);
		} elseif ($student_category == "level") {
			$receipient = $level;
			$col = 'level';
			$val = $auth->select14('level', 'level', 'sn', $level);
		}
		if ($receipient == "ALL") {
			$sql = mysqli_query($con, "SELECT * from students");
		} else {
			$sql = mysqli_query($con, "SELECT * From students where $col = '$val'");
		}
		$email_col = 'email';
	} else {
		$receipient = $manual;
		$opc = $receipient;
	}




	if ($receiver != 'manual') {
		while ($res = mysqli_fetch_array($sql)) {
			$email = $res[$email_col];
			$mail2 = new PHPMailer;
			$mail2->setFrom($emailFrom, $emailFromName);
			$mail2->addAddress($email);
			$mail2->Subject = "$title";
			$mail2->msgHTML($html);
			$mail2->AltBody = '$body';
			if (!$mail2->send()) {
				echo "for $email, Mailer Error: " . $mail2->ErrorInfo . "<br>";
			} else {
				echo "Message sent! for $email" . "<br>";
			}
		}
	} else {
		if (strpos($manual, ',') !== false) {
			$email_arr = explode(",", $manual);
			foreach ($email_arr as $email) {
				$mail2 = new PHPMailer;
				$mail2->setFrom($emailFrom, $emailFromName);
				$mail2->addAddress($email);
				$mail2->Subject = "$title";
				$mail2->msgHTML($html);
				$mail2->AltBody = '$body';
				if (!$mail2->send()) {
					echo "for $email, Mailer Error: " . $mail2->ErrorInfo . "<br>";
				} else {
					echo "Message sent! for $email" . "<br>";
				}
			}
		} else {
			$email = $manual;
			$mail2 = new PHPMailer;
			$mail2->setFrom($emailFrom, $emailFromName);
			$mail2->addAddress($email);
			$mail2->Subject = "$title";
			$mail2->msgHTML($html);
			$mail2->AltBody = '$body';
			if (!$mail2->send()) {
				echo "for $email, Mailer Error: " . $mail2->ErrorInfo . "<br>";
			} else {
				echo "Message sent! for $email" . "<br>";
			}
		}
	}
} else {
	die("<p style='color:f00;'>restricted access</p>");
}

?>