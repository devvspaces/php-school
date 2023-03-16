<?php

require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();
?>
<?php include("conn/conn.php") ?>
<?php
$sql1 = mysql_query("SELECT * FROM result_access");
$sql2 = mysql_fetch_array($sql1);
$status = $sql2['status'];
if($status==0){
 die("result computation in progess ...");
}
?>
<?php session_start();
if(!isset($_SESSION['users'])){
  header("location:..\index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/header.css">
</style>
<title>welcome adeuga</title>
<style type="text/css">
	#imgs{
		border-radius: 100%;
		height: 150px;
		width: 150px;
	}
</style>
</head>
<body>
	<?php include("header.php") ?>
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php 
				$users = $_SESSION['users'];
				$s1  = mysql_query("SELECT * FROM students where username = '$users'");
				$sh1 = mysql_fetch_array($s1);
				$name1 = $sh1['fname']." ".$sh1['lname'];
				$img = $sh1['picture'];
				$class = $sh1['class'];
				?>
					<img src="<?php echo $img ?>" id="imgs" class="img-responsive">
					<h4><?php echo $name1 ?></h4>
					<i><?php echo $class ?></i>
				</div>
				<div class="panel-body">
					<h4>Result</h4>
				</div>
				<div class="panel-body">
				<div class="table-responsive table-box">
					<table class="table table-bordered">
				<tr>
							<th>subject</th>
							<th>C.A.T 1</th>
							<th>C.A.T 2</th>
							<th>C.A.T 3</th>
							<th>C.A.T total</th>
							<th>Examination</th>
							<th>Total 1</th>
							<th>last term cumul</th>
							<th>total culum</th>
							<th>grade</th>
						</tr>
						<?php
						$uman = $_SESSION['users2'];
						$run2 = mysql_query("SELECT * FROM result where student = '$uman' ");
						while($result2 = mysql_fetch_array($run2)){
							$subject = $result2['subject'];
							$score = $result2['score'];
							$score2 = $result2['score2'];
							$score3 = $result2['score3'];
							$total1 = $score+$score2+$score3;
							$score4 = $result2['score4'];
							$last = $result2['last'];
							$total3 = $total1+$score4;
							if($last == ""){
							$total2 = $total3 ;
							}
							else{
								$total2 = intval($total3+$last)/2;
							}
							if($total2 >= 75){
								$grade = "A1";
							}
							elseif($total2 >=70){
								$grade = "B2";
							}
							elseif ($total2 >=65) {
								$grade = "B3";
							}
							elseif ($total2 >=60) {
								$grade = "C4";
							}
							elseif ($total2 >=55) {
								$grade = "C5";
							}
							elseif ($total2 >=50) {
								$grade = "C6";
							}
							elseif ($total2 >=45) {
								$grade = "D7";
							}
							elseif ($total2 >=40) {
								$grade = "E8";
							}
							else {
								$grade = "F9";
							}
							?>
						<tr>
							<th><?php echo $subject ?></th>
							<th><?php echo $score ?></th>
							<th><?php echo $score2 ?></th>
							<th><?php echo $score3 ?></th>
							<th><?php echo $total1 ?></th>
							<th><?php echo $score4 ?></th>
							<th><?php echo $total3 ?></th>
							<th><?php echo $last ?></th>
							<th><?php echo $total2 ?></th>
							<th><?php echo $grade ?></th>
						</tr>
						<?php
					}
					?>
					</table>
					<button class="btn btn-info" style="float: right;" >Save as Pdf</button>
<?php
					$page = file_get_contents("table.php");
$document->loadHtml($page);

//set page size and orientation

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Webslesson", array("Attachment"=>0));
//1  = Download
//0 = Preview

?>
				</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>
<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>