<?php include("conn/conn.php") ?>
<?php session_start() ?>
<?php 
if(isset($_GET['ass_id'])){
	$is = $_GET['ass_id'];
	$ii = $_GET['is'];
	$sql = mysqli_query($con,"DELETE from assignment where ass_id = '$is'");
	if(!$sql){
		die(mysqli_error($con));
	}
	else{
		header("Location:assignment.php?is=$ii ");
	}
}
else{
	die("error");
}