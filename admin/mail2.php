<?php include("conn/conn.php") ?>
<?php include("number_conveter.php"); ?>
<?php session_start();
if(!isset($_SESSION['users'])){
  header("location:..\index.php");
}
 ?>
<!DOCTYPE html>
<?php
				$s2  = mysql_query("SELECT * FROM  calender ");
				$sh2 = mysql_fetch_array($s2);
				$sn = $sh2['sn'] ;
				$session= $sh2['session'];
				$term= $sh2['current_term']."st";
				?>
					<?php
					$msquery = mysql_query("SELECT * FROM students where admission_no = '17/0005'");
					while($msresult = mysql_fetch_array($msquery)){
						$pemail= $msresult['p_email'];
						$parents = $msresult['parents'];
						$name = $msresult['fname']." ".$msresult['lname'];
						$class = $msresult['class'];
						$adno = $msresult['admission_no'];
						$body= "
<html>
<head>
<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet'>
<meta name='viewport' content='width=device-width, initial- scale=1.0'>
<title>Admin portal</title>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-12'>
					<div style='background-color: #FFF; text-align: left; font-size: 16px; box-shadow: 2px 2px 2px 3px #999; padding:20px;'>
						<h4 class='text-center' style='font-weight: bold;'>
							<img src='culogo.png' style='width: 70px; height: 70px;'><br>
							PIECE OF SHIT COLLEGE<p class='text-center' style='font-weight: bold;'> 34 chelsea road, off olokada housing estate<br>mess<br>shithole</p>
						</h4>
						
					<h3 class='text-center' style='color: #666;'>Finicial statement</h3>
					<p class=''>Dear  $parents, <br>here is your ward's finicial statement for the  $term term of $session</p>
					<h4 class='text-center'>ward's details</h4>
					<table class='table table-bordered table-striped'>
						<tr>
							<th>Name</th>
							<td> $name </td>
						</tr>
						<tr>
							<th>Admission number</th>
							<td> $adno </td>
						</tr>
						<tr>
							<th>Class</th>
							<td> $class </td>
						</tr>
					</table>
					<h4 class='text-center'>charges breakdown</h4>
					<table class='table table-bordered table-striped'>
						<tr><th>Fees title</th>
							<th>amount</th>
							<th>Amount in ward</th>
						</tr>
						";
		
					$msquery2 = mysql_query("SELECT * FROM fees where participant = 'All' || participant = '$class' || participant = '$adno'  ");
					while($msresult2 = mysql_fetch_array($msquery2)){
					$title = $msresult2['title'];
					$amount1 = $msresult2['amount'];
					$amount = $amount1;
					$obj    = new toWords($amount);
					//echo $obj->words;
					$body .="
							<tr>
							<td> $title </td>
							<td> &#8358 $amount </td>
							<td>$obj->words naria only</td>
						</tr>";
					}
					$body .= "</table>
					<p>please note the following <ol><li>that the fees should be paid latest 2weeks into resumption</i><li>payment can be made directly online or through the micro finance bank in the school premesis</li><li> parent/guardian should Disregard any other claimed fee requested by ward apart from the ones stated above as any other additional fee will be added to the next term fees  </li></ol></p>
					<p class='text-right'>statement of account issued by <br>
						Acc. Abosede Akinremi<small> <i>ican</i></small><br>
						<i>chief auditor piece of shit College</i>

					</p>
				</div>
				</div>
	</div>
</div>
		
</body>
</html>
				";
			}
			?>
			<?php 
			$to = $pemail;
			$subject = "finicial statement";
			$headers = "From:$pemail";
			$headers = "Content-type:text/html\r\n";
			$send_mail = mail($to, $subject, $body,$headers);
			if(!$send_mail){
				die( "error");
			}
			else{
				echo "sent successfully<br>".$pemail.$body;
			}
			?>
