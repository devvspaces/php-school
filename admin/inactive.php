<?php
include("conn/conn.php");
 session_start();
if(!isset($_SESSION['users'])){
  header("location:..\index.php");
}
if(isset($_POST['admission'])){
$sn = $_POST['admission'];
$sql = mysqli_query($con,"SELECT * FROM students where admission_no = '$sn'");
$sql2 = mysqli_fetch_array($sql);
	$fname = $sql2['fname'];
	$mname = $sql2['mname'];
	$lname = $sql2['lname'];
	$admission = $sql2['admission_no'];
	$gender = $sql2['gender'];
	$class = $sql2['class'];
	$picture = $sql2['picture'];
	$batch = $sql2['batch'];
	$date = $sql2['date_admitted'];
	$date_inactive = date('d-m-Y');
	$sqlx1 = mysqli_query($con,"INSERT INTO inactive(fname, mname, lname, admission_no, gender, class, picture, batch, date_admitted,dates)VALUES('$fname','$mname','$lname','$admission','$gender','$class','$picture','$batch','$date','$date_inactive')");
	if(!$sqlx1){
		die(mysqli_error($con));
	}
	else{
		$sqlx2 = mysqli_query($con,"UPDATE students set active = '0' where admission_no = '$sn'");
		$sqlx3 = mysqli_query($con,"UPDATE users set active = '0' where userid = '$sn'");
	}
}
echo "<p style='text-align:center'><span class='glyphicon glyphicon-ban-circle'></span><br> student set to inactive </p>";
 ?>
